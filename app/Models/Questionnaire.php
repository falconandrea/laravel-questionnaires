<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $guarded = [];

    protected function user() {
        return $this->belongsTo(User::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function questionsWithAnswers() {
        return $this->hasMany(Question::class)->with(['answers']);
    }
}
