<?php

namespace App\Http\Resources;

use App\Http\Resources\ReportedByResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AuditFormFilesResource extends JsonResource
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
            'file_name' => $this->file_name,
            'file_size' => $this->file_size,
            'uploaded_by' => new ReportedByResource($this->uploadedBy),
        ];
    }
}
