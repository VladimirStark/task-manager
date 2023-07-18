@extends('layouts.main')

@section('page')
    <h1 class="text-center mb-4">Мои задачи</h1>
    <div class="row">
        @for($i = 1; $i < 8; $i++)
        <div class="col-3">
            <div class="card mb-4">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="/tasks/{{$i}}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        @endfor
    </div>
@endsection
