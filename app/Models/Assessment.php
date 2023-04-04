<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Assessment extends Model
{
    use HasFactory;
    protected $table = 'assessments';

    public function weekly(): HasMany
    {
        return $this->hasMany(Week::class, 'uid', 'uid');
    }
}
