<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectStatus extends Model
{
    public function project(): HasMany
    {

        return $this->hasMany(Project::class);
    }
}
