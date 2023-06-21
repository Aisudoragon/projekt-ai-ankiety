<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;

    protected $table = 'choices';

    protected $fillable = [
        'form_id',
        'question_id',
        'answer_id',
        'user_id',
        'text'
    ];
}
