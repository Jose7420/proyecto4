<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'first_name',
        'last_name',
        'job_title',
        'city',
        'country'
    ];

}
