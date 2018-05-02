<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use DB;
class QuestionsComposer{

    public function __construct()
    {
        //
    }

    public function compose(View $view)

    {
        $view-> with ('latestQuestions',DB::table('questions')
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get());
    }
}
