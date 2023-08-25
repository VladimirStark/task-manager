@extends('layouts.main')

@section('page')
    <h1 class="text-center mb-4">Создание новой задачи</h1>
    <form method="post" action="/tasks/create" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Название задачи</label>
            <input type="text" class="form-control" id="name" name="name">
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="preview" class="form-label">Краткое описание задачи</label>
            <input type="text" class="form-control" id="preview" name="preview">
            @error('preview')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="text" class="form-label">Полный текст задачи</label>
            <textarea class="form-control" id="text" rows="3" name="text"></textarea>
            @error('text')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Вложения</label>
            <input class="form-control" type="file" id="file" name="file" />
            @error('file')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="1" id="priority" name="priority">
            <label class="form-check-label" for="priority">Высокий приоритет</label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Создать задачу</button>
    </form>
    {{--
    Форма должна иметь следующие поля:
    1. Название задачи - input type="text"
    2. Краткое описание задачи - input type="text"
    3. Полный текст задачи - textarea
    4. Вложения (может быть много, например, картинки) - input type="file"
    5. Приоритет (высокий, низкий)
        - input type="checkbox" (где активная галочка означет высокий приоритет)
    6. Кнопка Создать задачу - button
    --}}
@endsection
