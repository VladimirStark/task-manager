<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    return 'О компании';
});
Route::get('/contacts', function () {
    return 'Контакты';
});

Route::get('/products/{id}', function ($id) {
    return "Вы просматриваете товар под номером $id";
})->whereNumber('id');

// Формирование Личного кабинета
// 1. Предоставить страницу с формой регистрации
Route::get('/register', function () {
   // Чуть позже надо вывести HTML-страницу с формой
});

// 2. Отправка регистрационных данных (нажатие на кнопку Зарегистрироваться)
Route::post('/register', function () {
   // Здесь нужно будет запрограммировать
    // создание пользователя в БД
    // и еще всякие интересные штуки (например, отправку письма)
});

// 3. Предоставить страницу с формой входа
Route::get('/login', function () {
    // Здесь мы выведем HTML-страницу с формой входа
});

// 4. Отправка данных входа (нажатие на кнопку Войти в Личный кабинет)


// 5. Предоставить главную страницу




// 1. Предоставить страницу со списком задач
Route::get('/tasks', function () {
    // Здесь нужно вывести HTML-страницу со списком задач
    // 1. Соберем все задачи из базы
    $tasks = Task::all();
    // 2. Выведем hTML-страницу со списком задач
    return view('tasks.list', ['tasks' =>  $tasks]);
});

// 2. Предоставить страницу с детальным отображением определенной задачи
Route::get('/tasks/{id}', function ($id) {
    // Здесь запрограммировать логику получения из базы
    // задачи с номером $id
    $task = Task::find($id);

    // а также вывести красивую HTML-страницу, в которую
    // вставим информацию по выбранной из базы задачи
    return view('tasks.detail', ['task' => $task]);
})->whereNumber('id');

// 3. Предоставить форму с созданием задачи
Route::get('/tasks/create', function () {
    // Здесь надо предоставить HTML-страницу с формой
    return view('tasks.create');
});

// 4. Обработчик формы создания задачи
Route::post('/tasks/create', function (\Illuminate\Http\Request $request) {
    // 1. Собрать данные с формы
    // dd($request->all());
    $data = $request->all();

    // 2. Записать их в базу
    $task = new Task();
    $task->name = $data['name'];
    $task->preview = $data['preview'];
    $task->detail = $data['text'];
    $task->file = $data['file'];
    $task->priority = $data['priority'];
    $task->status_id = 1;
    $task->save();

    // 3. Перенаправить на страницу со списком задач
    return redirect('/tasks');
});

// 5. Предоставить форму с редактированием задачи
Route::get('/tasks/{id}/edit', function ($id) {
   // Алгоритм
    // 1. Получить из базы данных по задаче $id

    $task = Task::find($id);

    // 2. Показать HTML-страницу с формой редактирования задачи с номером $id
    return view('tasks.edit', ['task' => $task]);
});
