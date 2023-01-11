<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;

    protected $table = 'apply';

    protected $fillable = [
        'job_id',
        'user_id',
        'nama',
        'email',
        'link',
        'cv',
        'coverletter',
        'status'
    ];
}
