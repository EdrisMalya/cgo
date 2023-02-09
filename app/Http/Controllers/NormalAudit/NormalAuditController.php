<?php

namespace App\Http\Controllers\NormalAudit;

use App\Http\Resources\FileExtensionsResource;
use App\Http\Resources\ReportedByResource;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Inertia\Inertia;
use App\Models\UserRole;
use App\Models\AuditFile;
use App\Models\AuditorTeam;
use App\Models\NormalAudit;
use Illuminate\Http\Request;
use App\Models\AuditorMember;
use App\Models\AuditFormMember;
use App\Models\AllowedExtension;
use App\Helpers\DatatableBuilder;
use App\Http\Controllers\Controller;
use App\Models\AuditFormSeenHistory;
use App\Models\ConfidentialityLevel;
use App\Models\AuditFormAuthorizeUser;
use App\Http\Controllers\HelperController;
use App\Http\Resources\NormalAuditResource;
use App\Http\Resources\NormalAuditDetailsResource;
use App\Http\Resources\AuditFormWatchHistoryResource;
use App\Models\AuditFormFilesAuthorizeDownloaderUser;
use PHPUnit\Exception;
use const Grpc\STATUS_NOT_FOUND;

class   NormalAuditController extends Controller
{
    public function checkAccess($id){
        $check_if_authorize = AuditFormAuthorizeUser::query()->where(function($where) use ($id){
            $where->where('user_id', auth()->id());
            $where->where('audit_form_id', $id);
        })->exists();
        if($check_if_authorize){
            return true;
        }else{
            abort(403);
        }
    }

    public function formData(){
        return [
            'active' => 'home_page',
            'teams' => AuditorTeam::query()
                ->where('status', true)
                ->with('members')->get(),
            'confidentiality_level' => ConfidentialityLevel::query()->get(),
            'roles' => Role::all()->map(function($role){
                $user_ids = UserRole::query()->where('role_id', $role->id)->pluck('user_id')->toArray();
                return [
                    'name' => $role->name,
                    'id' => $role->id,
                    'users' => User::query()
                        ->where('status', true)
                        ->whereIn('id', $user_ids)->get()
                ];
            }),
            'users' => User::query()->where('status', true)->get(),
            'file_extensions' => FileExtensionsResource::collection(AllowedExtension::query()->get())
        ];
    }

    public function index($lang, Request $request)
    {
        $this->allowed('normal-audit-access');
        $allowed_users = AuditFormAuthorizeUser::query()->where('user_id', auth()->id())->pluck('audit_form_id')->toArray();
        $is_trashed = false;
        if($request->has('show_trashed')){
            $is_trashed = (boolean)$request->get('show_trashed');
        }
        $normal_audits = NormalAudit::query()->with('files')->whereIn('id', $allowed_users)->where('is_trashed', $is_trashed);
        if($request->has('date_field')){
            $data = $request->validate([
                'start_date' => ['required'],
                'end_date' => ['required'],
            ]);
            $normal_audits = $normal_audits->whereBetween($request->get('date_field'), $data);
        }
        if($request->has('status')){
            $statues = collect($request->get('status'))->map(function($status){
                return $status['label'];
            })->toArray();
            $normal_audits = $normal_audits->whereIn('status',$statues);
        }
        if($request->has('reported_by')){
            $user_ids = collect($request->get('reported_by'))->map(fn($user)=>$user['value'])->toArray();
            $normal_audits = $normal_audits->whereIn('reported_by', $user_ids);
        }
        if($request->has('is_trashed')){
            dd('test');
        }
        $datatable = new DatatableBuilder($normal_audits, $request);
        $normalAuditsCollection = $datatable->build();
        return Inertia::render('NormalAudit/NormalAuditIndex', [
            'active' => 'home_page',
            'normal_audits' => NormalAuditResource::collection($normalAuditsCollection),
            'reported_by' => User::query()
                ->whereIn('id', NormalAudit::query()->pluck('reported_by')->unique()->toArray())
                ->get(),
            'filters' => [
                'date_field' => $request->get('date_field'),
                'start_date' => $request->get('start_date'),
                'end_date' => $request->get('end_date'),
                'status' => $request->has('status')?$request->get('status'):[],
                'reported_by' => $request->has('reported_by')?$request->get('reported_by'):[],
                'show_trashed' => $request->has('show_trashed')?$request->get('show_trashed'):false,
            ]
        ]);

    }
    public function create($lang, Request $request)
    {
        $this->allowed('normal-audit-add-new-record');
        return Inertia::render('NormalAudit/Form/NormalAuditForm', $this->formData());
    }

    public function store($lang, Request $request)
    {
        $this->allowed('normal-audit-add-new-record');
        $data = $request->validate([
            'files' => ['required'],
            'auditor_team_id' => ['required'],
            'members' => ['required'],
            'fiscal_year' => ['required', 'integer', 'min:1900', 'max:2040'],
            'audit_start_date' => ['required', 'date', 'date_format:Y-m-d'],
            'audit_end_date' => ['required', 'date', 'date_format:Y-m-d'],
            'sent_to_governor_date' => ['required', 'date', 'date_format:Y-m-d'],
            'total_pages' => ['required', 'integer', 'min:1'],
            'confidentiality_level' => ['required'],
            'governor_office_remarks' => ['required', 'string'],
            'sent_to_governor' => ['required', 'boolean'],
            'file_location' => ['required', 'string'],
            'file_version' => ['required', 'string'],
            'file_manual_sequence_number' => ['required', 'string'],
            'role_id' => ['required'],
            'authorize_users' => ['required'],
            'who_can_download' => ['required'],
        ]);
        $data['reported_by'] = auth()->id();
        $data['last_updated_by'] = 0;
        $data['last_seen_by'] = 0;
        $data['approved_by'] = 0;
        $data['status'] = 'new';
        unset($data['files']);
        $members = $data['members'];
        unset($data['members']);
        $data['confidentiality_level_id'] = $data['confidentiality_level']['value'];
        unset($data['confidentiality_level']);
        $authorize_users = $data['authorize_users'];
        unset($data['authorize_users']);
        $who_can_download = $data['who_can_download'];
        unset($data['who_can_download']);
        $audit_form = NormalAudit::query()->create($data);

        foreach ($request->file('files') as $file){
            if(in_array(strtoupper($file->getClientOriginalExtension()), AllowedExtension::query()->pluck('name')->toArray())){
                AuditFile::query()->create([
                    'audit_form_id' => $audit_form->id,
                    'file_type' => 'na',
                    'file' => $file->store('audit_form_files', 'private'),
                    'file_name' => $file->getClientOriginalName(),
                    'file_size' => $file->getSize(),
                    'file_ext' => $file->getClientOriginalExtension(),
                    'uploaded_by' => auth()->id()
                ]);
            }
        }

        foreach ($members as $member){
            AuditFormMember::query()->create([
                'type' => 'na',
                'audit_form_id' => $audit_form->id,
                'auditor_team_id' => $data['auditor_team_id'],
                'auditor_member_id' => $member['id']
            ]);
        }

        foreach ($authorize_users as $authorize_user){
            AuditFormAuthorizeUser::query()->create([
                'audit_form_id' => $audit_form->id,
                'user_id' => $authorize_user['id'],
                'role_id' => $data['role_id'],
                'type' => 'na'
            ]);
        }

        foreach ($who_can_download as $who_can_download_user){
            AuditFormFilesAuthorizeDownloaderUser::query()->create([
                'audit_form_id' => $audit_form->id,
                'user_id' => $who_can_download_user['value'],
                'type' => 'na',
                'created_by' => auth()->id()
            ]);
        }
        return redirect()->to(route('normal-audit.index', ['lang' => $lang]))
            ->with(['message' => translate('Created successfully'), 'type' => 'success']);
    }

    public function show($lang,  $normalAudit , Request $request)
    {
        $this->allowed('normal-audit-view-access');
        try {
            $normalAudit = NormalAudit::query()->findOrFail(decrypt($normalAudit));
        }catch (\Exception $e){
            \Log::error($e);
            abort(404);
        }
        $data = [
            'active' => 'home_page',
            'active_tab' => $request->get('active')
        ];
        switch($request->get('active')){
            case 'all_information':case 'document_timeline':
                $data['normal_audit'] = new NormalAuditDetailsResource($normalAudit);
                break;
            case 'watch_history':
                $history = AuditFormSeenHistory::query()->where('type','na')->where('audit_form_id', $normalAudit->id);
                if($request->has('search') && $request->get('search')!='' && $request->get('search') != null){
                    $history->whereHas('user', function($query) use ($request){
                        $query->where(function($condition) use($request) {
                            $condition->where('name', 'LIKE', "%{$request->get('search')}%");
                            $condition->orWhere('last_name', 'LIKE', "%{$request->get('search')}%");
                        });
                    });
                }
                $datatable = new DatatableBuilder(
                    $history,
                    $request
                );
                $data['watch_history'] = AuditFormWatchHistoryResource::collection(
                    $datatable->build()
                );
                break;
        }
        $this->checkAccess($normalAudit->id);
        if($request->get('active') === 'all_information'){
            AuditFormSeenHistory::create([
                'type' => 'na',
                'audit_form_id' => $normalAudit->id,
                'user_id' => auth()->id()
            ]);
        }
        return Inertia::render('NormalAudit/NormalAuditDetails', $data);
    }

    public function edit($lang, Request $request, $normal_audit)
    {
        $this->allowed('edit-report-access');
        try {
            $normal_audit = NormalAudit::query()->with('auditorTeam')->find(decrypt($normal_audit));
            $this->checkAccess($normal_audit->id);
            $data = $this->formData();
            $data['normal_audit'] = new NormalAuditDetailsResource($normal_audit);
            return Inertia::render('NormalAudit/Form/NormalAuditForm', $data);
        }
        catch (\Exception $exception){
            \Log::error($exception);
            abort(404);
        }
    }

    public function update($lang, Request $request, $normal_audit)
    {
        $this->allowed('edit-report-access');
        $data = $request->validate([
            'files' => ['nullable'],
            'auditor_team_id' => ['required'],
            'members' => ['required'],
            'fiscal_year' => ['required', 'integer', 'min:1900', 'max:2040'],
            'audit_start_date' => ['required', 'date', 'date_format:Y-m-d'],
            'audit_end_date' => ['required', 'date', 'date_format:Y-m-d'],
            'sent_to_governor_date' => ['required', 'date', 'date_format:Y-m-d'],
            'total_pages' => ['required', 'integer', 'min:1'],
            'confidentiality_level' => ['required'],
            'governor_office_remarks' => ['required', 'string'],
            'sent_to_governor' => ['required', 'boolean'],
            'file_location' => ['required', 'string'],
            'file_version' => ['required', 'string'],
            'file_manual_sequence_number' => ['required', 'string'],
            'role_id' => ['required'],
            'authorize_users' => ['required'],
            'who_can_download' => ['required'],
        ]);
        $data['reported_by'] = auth()->id();
        $data['last_updated_by'] = 0;
        $data['last_seen_by'] = 0;
        $data['approved_by'] = 0;
        $data['status'] = 'new';
        unset($data['files']);
        $members = $data['members'];
        unset($data['members']);
        $data['confidentiality_level_id'] = $data['confidentiality_level']['value'];
        unset($data['confidentiality_level']);
        $authorize_users = $data['authorize_users'];
        unset($data['authorize_users']);
        $who_can_download = $data['who_can_download'];
        unset($data['who_can_download']);
        $data['auditor_team_id'] = checkIfEncrypted($data['auditor_team_id']);
        $data['role_id'] = $data['role_id']['value'];
        #dd($members);
        try {
            $normal_audit = NormalAudit::query()->find(decrypt($normal_audit));
            $this->checkAccess($normal_audit->id);
            $normal_audit->update($data);
            if($this->allowed('edit-report-edit-files', false) && $request->file('files')){
                foreach ($request->file('files') as $file){
                    if(in_array(strtoupper($file->getClientOriginalExtension()), AllowedExtension::query()->pluck('name')->toArray())){
                        AuditFile::query()->create([
                            'audit_form_id' => $normal_audit->id,
                            'file_type' => 'na',
                            'file' => $file->store('audit_form_files', 'private'),
                            'file_name' => $file->getClientOriginalName(),
                            'file_size' => $file->getSize(),
                            'file_ext' => $file->getClientOriginalExtension(),
                            'uploaded_by' => auth()->id()
                        ]);
                    }
                }
            }

            if($this->allowed('edit-report-edit-auditor-team', false)){
                AuditFormMember::query()->where([
                    ['type','=','na'],
                    ['audit_form_id','=',$normal_audit->id],
                    ['auditor_team_id','=',$data['auditor_team_id']],
                ])->delete();
                foreach ($members as $member){
                    AuditFormMember::query()->create([
                        'type' => 'na',
                        'audit_form_id' => $normal_audit->id,
                        'auditor_team_id' => $data['auditor_team_id'],
                        'auditor_member_id' => checkIfEncrypted($member['id'])
                    ]);
                }
            }

            if($this->allowed('edit-report-edit-access', false)){
                AuditFormAuthorizeUser::query()->where([
                    ['type','=','na'],
                    ['audit_form_id','=',$normal_audit->id],
                    ['role_id','=',$data['role_id']],
                ])->delete();
                foreach ($authorize_users as $authorize_user){
                    AuditFormAuthorizeUser::query()->create([
                        'audit_form_id' => $normal_audit->id,
                        'user_id' => checkIfEncrypted($authorize_user['id']),
                        'role_id' => $data['role_id'],
                        'type' => 'na'
                    ]);
                }

            }

            if($this->allowed('edit-report-edit-download-access', false)){
                AuditFormFilesAuthorizeDownloaderUser::query()->where([
                    ['type','=','na'],
                    ['audit_form_id','=',$normal_audit->id],
                ])->delete();
                foreach ($who_can_download as $who_can_download_user){
                    AuditFormFilesAuthorizeDownloaderUser::query()->create([
                        'audit_form_id' => $normal_audit->id,
                        'user_id' => checkIfEncrypted($who_can_download_user['value']),
                        'type' => 'na',
                        'created_by' => auth()->id()
                    ]);
                }
            }
            return redirect()->to(route('normal-audit.show', ['normal_audit'=>encrypt($normal_audit->id), 'lang'=>$lang, 'active' => 'all_information']))
                ->with(['message' => translate('Created successfully'), 'type' => 'success']);

        }catch (\Exception $exception){
            \Log::error($exception);
            abort(404);
        }
    }

    public function processNormalAudit($lang, Request $request, $normal_audit_id, $type)
    {
        try {
            $normal_audit = NormalAudit::query()->find(decrypt($normal_audit_id));
            $this->checkAccess($normal_audit->id);
        }catch (\Exception $exception){
            abort(404);
        }
        switch ($type){
            case 'review':
                $this->allowed('normal-audit-review-document-access');
                $normal_audit->update([
                    'reviewed_by' => auth()->id(),
                    'reviewed_by_date' => now(),
                    'status' => 'Reviewed'
                ]);
                return back()->with(['message' => translate('Succeed'), 'type' => 'success']);
            case 'approve':
                $this->allowed('normal-audit-approve-document-access');
                $normal_audit->update([
                    'approved_by' => auth()->id(),
                    'approved_by_date' => now(),
                    'status' => 'Approved'
                ]);
                return back()->with(['message' => translate('Succeed'), 'type' => 'success']);
        }
    }

    public function destroy($lang, Request $request, $normalAudit)
    {
        try {
            $normalAudit = NormalAudit::query()->find(decrypt($normalAudit));
            $this->checkAccess($normalAudit->id);
            switch ($request->get('type')){
                case 'delete_file':
                    $this->allowed('edit-report-edit-files');
                    try {
                        $file = AuditFile::query()->find(decrypt($request->get('file_id')));
                        try {
                            if(\File::delete(storage_path("/app/private/".$file->file))){
                                $file->delete();
                                return back()->with(['message' => translate('Deleted successfully'), 'type' => 'success']);
                            }else{
                                \Log::warning('File not deleted');
                            }
                        }catch (\Exception $exception){
                            \Log::error($exception);
                            return back()->with(['message' => translate('Something went wrong'), 'type' => 'error']);
                        }
                    }catch (\Exception $e){
                        \Log::error($e);
                        abort(404);
                    }
                case 'delete-normal-audit':
                    $this->allowed('normal-audit-delete-report');
                    $message = '';
                    if(!$normalAudit->is_trashed){
                        if($request->get('action') == 'move-to-trash'){
                            $normalAudit->update([
                                'is_trashed' => true
                            ]);
                            $message = 'Report moved to trash';
                        }
                    }else{
                        if($request->get('action') == 'remove-from-trash'){
                            $normalAudit->update([
                                'is_trashed' => false
                            ]);
                            $message = 'Report moved to trash';
                        }else{
                            return back()
                                ->with(['message' => 'Delete is not possible', 'type' => 'success']);
                        }
                    }
                return redirect()
                    ->to(route('normal-audit.index', ['normal_audit' => encrypt($normalAudit->id), 'lang' => $lang]))
                    ->with(['message' => translate($message), 'type' => 'success']);
            }
        }catch (Exception $exception){
            abort(404);
        }
    }

}
