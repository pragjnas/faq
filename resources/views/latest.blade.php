    <div class="container-fluid">
        <div class="row justify-content-lg-end">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                   Recently added Questions
            </div>
                </div>
            @foreach($latestQuestions as $question)

                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> <a href="{{ route('question.show', ['id' => $question->id]) }}">{{$question->body}}</a>
                    </li>


                </ul>

            @endforeach
                <a class="btn btn-primary float-right small" href="#">More Questions</a>
            </div>
        </div>
    </div>
    </div>
