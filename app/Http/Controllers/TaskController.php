<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Models\Comment;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //
    public function comment(int $id, Request $request)
    {
        //АЛГОРИТМ
        // 1. Считать данные польхзователя с формы
        $data = $request->all();
        // dd($data);
        // 2. Сохранить коментарии в БД
        $comment = new Comment();
        $comment-> text = $data['text'];
        $comment->task_id = $id;
        $comment->save();
        // 3. Перенаправить пользователя на страницу с
        // детальным отображением задачи
        // (то есть обратно, откуда пришли
        return redirect()->back();
    }

    public function index()
    {
        // Здесь нужно вывести HTML-страницу со списком задач
        // Собираем задачи авторизованного пользователя      1. Соберем все задачи из базы
        $tasks = Task::where('user_id', '=', Auth::id())->get(); // all();
        // 2. Выведем hTML-страницу со списком задач
        return view('tasks.list', ['tasks' =>  $tasks]);
    }

    public function show(int $id)
    {
        // Здесь запрограммировать логику получения из базы
        // задачи с номером $id
        $task = Task::find($id);

        if (Auth::user()->can('view', $task)) {


        // а также вывести красивую HTML-страницу, в которую
        // вставим информацию по выбранной из базы задачи
        }
        else {
            abort(404);
        }
        return view('tasks.detail', ['task' => $task]);
    }

    public function create()
    {
        // Здесь надо предоставить HTML-страницу с формой
        return view('tasks.create');
    }

    public function store(CreateTaskRequest $request)
    {
        // 1. Собрать проверенные данные с формы
        // dd($request->all());
        $data = $request->validated();

        // 2. Записать их в базу
        $task = new Task();
        $task->name = $data['name'];
        $task->preview = $data['preview'];
        $task->detail = $data['text'];
        $task->file = $data['file'];
        $task->priority = isset($data['priority']);
        $task->status_id = 1;
        $task->user_id = Auth::id();
        $task->save();

        // 3. Перенаправить на страницу со списком задач
        return redirect('/tasks');
    }

    public function edit(int $id)
    {
        // Алгоритм
        // 1. Получить из базы данных по задаче $id

        $task = Task::find($id);

        // 2. Показать HTML-страницу с формой редактирования задачи с номером $id
        return view('tasks.edit', ['task' => $task]);
    }

    public function deleteComment(int $id)
    {
        //Алгоритм
        // 1. Выбрать коментарий по $id
        $comment = Comment::find($id);
        // 2. Удалить выбранный коментарий
        $comment->delete();
        // 3. Перенаправить пользователя на страницу
        //     с детальным отображением задачи
        //     (то есть ОБРАТНО, откуда пришел)
        return redirect()->back();
    }

}
