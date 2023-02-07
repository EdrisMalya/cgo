<?php

namespace App\Http\Resources;

use App\Http\Resources\ReportedByResource;
use App\Models\AuditFormAuthorizeUser;
use App\Models\AuditFormFilesAuthorizeDownloaderUser;
use App\Models\User;
use App\Models\AuditFormMember;
use App\Http\Resources\AuditFormFilesResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ConfidentialityLevelResource;

class NormalAuditDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => encrypt($this->id),
            'reported_by' => new ReportedByResource($this->reportedBy),
            'audit_start_date' => $this->audit_start_date,
            'audit_end_date' => $this->audit_end_date,
            'status' => $this->status,
            'reported_on' => $this->created_at,
            'confidentiality_level' => new ConfidentialityLevelResource($this->confidentialityLevel),
            'file_version' => $this->file_version,
            'file_location' => $this->file_location,
            'total_pages' => $this->total_pages,
            'total_files' => $this->files->count(),
            'files' => AuditFormFilesResource::collection($this->whenLoaded('files')),
            'members' => AuditMembersResource::collection(
                User::whereIn('id', AuditFormMember::where('audit_form_id', $this->id)->pluck('auditor_member_id'))->get()
            ),
            'is_sent_to_governor' => (boolean)$this->sent_to_governor,
            'governor_office_remarks' => $this->governor_office_remarks,
            'sent_to_governor_date' => $this->sent_to_governor_date,
            'file_manual_sequence_number' => $this->file_manual_sequence_number,
            'reviewed_by' => new ReportedByResource($this->reviewedBy),
            'approved_by' => new ReportedByResource($this->approvedBy),
            'approved_by_date' => $this->approved_by_date,
            'reviewed_by_date' => $this->reviewed_by_date,
            'auditorTeam' => new AuditTeamResource($this->whenLoaded('auditorTeam')),
            'fiscal_year' => $this->fiscal_year,
            'role' => new RoleResource($this->role),
            'authorize_users' => AuditMembersResource::collection(
                User::whereIn('id', AuditFormAuthorizeUser::query()
                    ->where('type', 'na')
                    ->where('audit_form_id', $this->id)
                    ->pluck('user_id'))
                    ->get()
            ),
            'who_can_download' => AuditMembersResource::collection(
                User::whereIn('id', AuditFormFilesAuthorizeDownloaderUser::query()
                    ->where('type', 'na')
                    ->where('audit_form_id', $this->id)
                    ->pluck('user_id'))
                    ->get()
            )
        ];
    }
}
