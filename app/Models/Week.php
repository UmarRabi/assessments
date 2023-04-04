<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Week extends Model
{
    use HasFactory;
    protected $table = 'weeks';

    public function assessment(): BelongsTo
    {
        return $this->belongsTo(Assessment::class, 'uid', 'uid');
    }
}
