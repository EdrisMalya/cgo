<?php

namespace App\Http\Resources;

use App\Models\User;
use App\Models\AuditFormMember;
use App\Http\Resources\AuditMembersResource;
use App\Http\Resources\AuditFormFilesResource;
use Illuminate\Http\Resources\Json\JsonResource;

class NormalAuditResource extends JsonResource
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
        ];
    }
}
