@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="container float-left">
            <div class="row justify-content-lg-start">
                <div class="col-md-8">
                    <div class="card">
                    <div class="card-header">All Questions
                        <div class="card-body">
                            <div class="card-deck">
                                @foreach($allQuestions as $questions)
                                    <div class="col-sm-6 d-flex align-items-stretch">
                                        <div class="card mb-3 ">
                                            <div class="card-header">
                                                <small class="text-muted">
                                                    Created: {{ $questions->created_at}}

                                                </small>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">{{$questions->body}}</p>
                                            </div>
                                            <div class="card-footer">
                                                <p class="card-text">

                                                    <a class="btn btn-primary float-right" href="{{ route('questions.show', ['id' => $questions->id]) }}">Answer Question </a>

                                                    </a>
                                                </p>
                                            </div>
                                        </div>



                                    </div>
                                @endforeach
                            </div>

                        </div>


                    </div>

                    <div class="card-footer">
                        <div class="float-left">
                            {{ $allQuestions->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection