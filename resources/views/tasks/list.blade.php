@extends('layouts.main')

@section('page')
    <h1 class="text-center mb-4">Мои задачи</h1>
    <div class="row">
        @foreach($tasks as $task)
        <div class="col-3">
            <div class="card mb-4">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $task->name }}</h5>
                    <p class="card-text">{{ $task->preview }}</p>
                    <a href="/tasks/{{ $task->id }}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
