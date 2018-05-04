<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;
use DB;

class Question extends Model
{
    protected $fillable = ['body'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function latestQuestionsSidebar(View $view)
    {
        return  $view-> with ('latestQuestions',DB::table('questions')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get());
    }
}
