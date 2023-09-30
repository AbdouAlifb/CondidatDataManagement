<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{
    use HasFactory;
    protected $table = 'form_data';
    

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'about_you',
        'resume_path',
    ];
}
