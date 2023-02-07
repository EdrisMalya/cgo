<?php

namespace App\Http\Controllers\Configurations;

use App\Helpers\DatatableBuilder;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Models\AuditorMember;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuditorMemberController extends Controller
{
    public function index($lang, Request $request)
    {
        $this->allowed('auditor-members-access');
        $members = AuditorMember::query();
        $datatable = new DatatableBuilder($members, $request, ['first_name', 'last_name', 'email', 'phone_number']);
        return Inertia::render('Configuration/AuditorMembers/AuditorMembersIndex', [
            'active' => 'auditor-members',
            'members' => $datatable->build()
        ]);
    }

    public function store($lang, Request $request)
    {
        $this->allowed('auditor-members-create-member');
        $data = $request->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone_number' => ['required', 'string'],
            'image' => ['nullable', 'file', 'image'],
            'team_id' => ['nullable'],
        ]);
        if($request->file('image') != null){
            $data['image'] = $request->file('image')->store('auditor_member_images', 'public');
        }
        $data['status'] = true;
        AuditorMember::create($data);
        return back()->with(['message' => translate('Created successfully'), 'type' => 'success']);
    }

    public function update($lang, Request $request, AuditorMember $auditorMember)
    {
        $this->allowed('auditor-members-edit-member');
        $data = $request->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone_number' => ['required', 'string'],
            'image' => ['nullable'],
            'team_id' => ['nullable'],
            'status' => 'required|boolean'
        ]);
        if($request->file('image') != null){
            if($auditorMember->image){
                HelperController::removeFile($auditorMember->image);
            }
            $data['image'] = $request->file('image')->store('auditor_member_images', 'public');
        }
        $auditorMember->update($data);
        return back()->with(['message' => translate('Updated successfully'), 'type' => 'success']);
    }

    public function destroy($lang, Request $request, AuditorMember $auditorMember)
    {
        $this->allowed('auditor-members-delete-member');
        if($auditorMember->image){
            HelperController::removeFile($auditorMember->image);
        }
        $auditorMember->delete();
        return back()->with(['message' => translate('Deleted successfully'), 'type' => 'success']);
    }
}
