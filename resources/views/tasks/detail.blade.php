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
@endsection
