@extends('layouts.main')

@section('page')
    <h1 class="text-center mb-4">Создание новой задачи</h1>
    <form method="post" action="/tasks/create">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Название задачи</label>
            <input type="text" class="form-control" id="name" name="name" />
        </div>

        <div class="mb-3">
            <label for="preview" class="form-label">Краткое описание задачи</label>
            <input type="text" class="form-control" id="preview" name="preview">
        </div>

        <div class="mb-3">
            <label for="text" class="form-label">Полный текст задачи</label>
            <textarea class="form-control" id="text" rows="3" name="text"></textarea>
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Вложение</label>
            <input class="form-control" type="file" id="File" name="file">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="priority">
            <label class="form-check-label" for="exampleCheck1">Высокий приоритет</label>
        </div>

        <button type="submit" class="btn btn-primary w-50">Создать задачу</button>
{{--
Форма должна иметь следующие поля:
1. Название задачи - input type="text"
2. Краткое описание задачи - input type="text"
3. Полный текст задачи    -  textarea
4. Вложения (может быть много) - input type="file"
5. Приоритет (высокий, низкий)
    - input type="checkbox" (где активная галочка означает высокий приоритет)
6. Кнопка Создать задачу - button
--}}
    </form>
@endsection
