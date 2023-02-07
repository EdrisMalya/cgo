<?php

namespace App\Models;

use App\Http\Resources\AuditFormFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;

class NormalAudit extends Model
{
    use HasFactory, LogsActivity, CausesActivity;

    protected $guarded = [];

    public function getActivitylogOptions(): LogOptions
        {
            return LogOptions::defaults()
                            ->logOnlyDirty()
                            ->logOnly(['*'])
                            ->useLogName('Normal Audit')
                            ->dontSubmitEmptyLogs()
                            ->dontLogIfAttributesChangedOnly(['updated_at'])
                            ;
        }

    public function reportedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reported_by', 'id');
    }

    public function reviewedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by', 'id');
    }

    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by', 'id');
    }

    public function confidentialityLevel(): BelongsTo
    {
        return $this->belongsTo(ConfidentialityLevel::class);
    }

    public function files(): HasMany
    {
        return $this->hasMany(AuditFile::class, 'audit_form_id')->where('file_type', 'na');
    }

    public function auditorTeam()
    {
        return $this->belongsTo(AuditorTeam::class,'auditor_team_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class,'role_id');
    }

}
