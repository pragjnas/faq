<?php

namespace App\Providers;

use App\Http\Controllers\GatesController;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use App\Question;
use Illuminate\Support\Facades\Auth;
use App\Answer;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('editDeleteQuestions-auth', function ($user, $question)
        {
            return (Auth::user()->id == $question->user_id);
        });

        Gate::define('editDeleteAnswers-auth', function ($user, $answer)
        {
            //$answer = Answer::find($answer);
            return (Auth::user()->id == $answer->user_id);
        });
    }

}
