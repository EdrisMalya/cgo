<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;

class AuditorTeam extends Model
{
    use HasFactory, LogsActivity, CausesActivity;

    protected $casts = [
        'status' => 'boolean'
    ];

    protected $guarded = [];

    public function getActivitylogOptions(): LogOptions
        {
            return LogOptions::defaults()
                            ->logOnlyDirty()
                            ->logOnly(['*'])
                            ->useLogName('Auditor Team')
                            ->dontSubmitEmptyLogs()
                            ->dontLogIfAttributesChangedOnly(['updated_at'])
                            ;
        }

    public function members(){
        return $this->hasMany(TeamMember::class)->with('member');
    }
}
