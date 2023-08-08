@extends('layouts.main')

@section('page')
    <h4>Задача создана {{$task->created_at}}</h4>
    <h1>{{$task->name}}</h1>
    <p>{{$task->preview}}</p>
    <p>{{$task->detail}}</p>
    @if($task->priority==1)
        <p class="text-denger">Важно</p>
    @endif
    <a href="/tasks/{{$task->id}}/edit" class="btn btn-warning">Редактировать</a>
    <ul class="mt-5">
    @foreach($task->comments as $comment)
        <li>
            {{$comment->text}}
            <form method="post" action="/comment/{{$comment->id}}/delete">
                @csrf
                <button class="btn btn-danger btn-sm">Удалить</button>
            </form>
        </li>
    @endforeach
    </ul>
    <form class="mt-5" method="post" action="/tasks/{{$task->id}}/comment">
        @csrf
        <textarea name="text" class="form-control"></textarea>
        <button class="btn btn-primary">Создать коментарий</button>
    </form>
@endsection
