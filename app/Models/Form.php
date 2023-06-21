<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table = 'forms';

    public function getQuestions()
        {
            return $this->hasMany(Question::class);
        }

    public function getChoices()
        {
            return $this->hasMany(Choice::class);
        }

    public function users()
        {
            return $this->belongsTo(User::class, 'user_id', 'id');
        }
}
