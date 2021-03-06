@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Answer</div>
        <div class="card-body">
            {{$answer->body}}
        </div>
        <div class="card-footer">
            @if (Auth::user()->id == $answer->user_id)

                {{ Form::open(['method'  => 'DELETE', 'route' => ['answers.destroy', $question, $answer->id]])}}
                <button class="btn btn-danger float-right mr-2" value="submit" type="submit" id="submit">Delete
                </button>
                {!! Form::close() !!}
                <a class="btn btn-primary float-right"
                   href="{{ route('answers.edit',['question_id'=> $question, 'answer_id'=> $answer->id ])}}">
                    Edit Answer
                </a>
            @endif
        </div>
    </div>
@endsection
