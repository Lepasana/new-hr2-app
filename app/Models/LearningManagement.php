<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningManagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_request_id',
        'content',
        'status',
    ];
}
