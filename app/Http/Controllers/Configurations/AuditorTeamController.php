<?php

namespace App\Http\Controllers\Configurations;

use App\Helpers\DatatableBuilder;
use App\Http\Controllers\Controller;
use App\Models\AuditorMember;
use App\Models\AuditorTeam;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuditorTeamController extends Controller
{
    public function index($lang, Request $request){
        $this->allowed('auditor-team-access');
        return Inertia::render('Configuration/AuditorTeam/AuditorTeamIndex',[
            'active' => 'auditor-team',
            'teams' => AuditorTeam::query()->get(),
        ]);
    }
    public function store($lang, Request $request){
        $this->allowed('auditor-team-create-team');
        if($request->has('save_type')){
            switch ($request->get('save_type')){
                case 'save-auditor-members':
                    TeamMember::query()->where('auditor_team_id',$request->get('team')['id'])->delete();
                    foreach ($request->get('members') as $member){
                        TeamMember::query()->create([
                            'auditor_team_id' => $request->get('team')['id'],
                            'auditor_member_id' => $member['value'],
                        ]);
                    }
                    return back()->with(['message' => translate('Saved successfully'), 'type' => 'success']);
            }
        }
        $data = $request->validate([
            'name' => ['required', 'string', 'unique:auditor_teams']
        ]);
        AuditorTeam::query()->create($data);
        return back()->with(['message' => translate('Created successfully'), 'type' => 'success']);
    }

    public function show($lang, Request $request, AuditorTeam $auditor_team)
    {
        $this->allowed('auditor-team-view-team-members');
        return Inertia::render('Configuration/AuditorTeam/TeamMember/TeamMembersIndex', [
            'team' => $auditor_team->load(['members']),
            'active' => 'auditor-team',
            'auditor_members' => AuditorMember::query()->where('status',true)->get()
        ]);
    }

    public function update($lang, Request $request, AuditorTeam $auditor_team)
    {
        $this->allowed('auditor-team-edit-team');
        $data = $request->validate([
            'name' => ['required', 'string', 'unique:auditor_teams,id,'.$auditor_team->id],
            'status' => ['required', 'boolean']
        ]);
        $auditor_team->update($data);
        return back()->with(['message' => translate('Updated successfully'), 'type' => 'success']);
    }

    public function destroy($lang, Request $request, AuditorTeam $auditorTeam)
    {
        $this->allowed('auditor-team-delete-team');
        if($request->has('type')){
            switch ($request->get('type')){
                case 'delete-member':
                    TeamMember::query()
                        ->findOrFail($request->get('member_id'))
                        ->delete();
                    return back()->with(['message' => translate('Removed successfully')]);
            }
        }
        if($auditorTeam->members->count() > 0){
            return back()->with(['message' => translate('Cannot be deleted'), 'type' => 'error']);
        }else{
            $auditorTeam->delete();
            return back()->with(['message' => translate('Deleted successfully')]);
        }
    }

}
