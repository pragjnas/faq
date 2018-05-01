<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Question;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     * /added controller
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $questions = $user->questions()->paginate(6);
        $latestQuestions = DB::table('questions')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        //dd($latestQuestions);        //dd($questions);
        //return view ('home')->with('questions',$questions);
        return view('home', ['questions' => $questions, 'latestQuestions' => $latestQuestions ]);    }
    public function latestQuestion()
{
    //$latestQuestion = DB::table('questions')
    //->orderBy('created_at', 'desc')
    //->first(); --- To fetch first record
    $latestQuestions = DB::table('questions')
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();
    return view ('latest')->with('latestQuestions',$latestQuestions);
    /*To display the new question respective to the logged in user
    $user = Auth::user();
    $latestQuestion = $user->questions()->orderBy('created_at', 'desc')->first(); --1st version*/
}
}
