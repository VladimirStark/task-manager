<?php

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

Route::get('/about', function () {
    return 'О компании';
});
Route::get('/contacts',function () {
    return 'Контакты';
});
Route::get('/products/{id}', function ($id) {
    return "Вы просматриваете товар под номером $id";
})->whereNumber('id');



// Формирование Личного кабинета
// 1. Предоставить страницу с формой регистрацией
Route::get('/register', function () {
    //Чуть позже надо вывести HTML-страницу с формой
});

// 2. Отправка регистрационных данных (нажатие кнопки Зарегистрироваться)
Route::post('/register', function () {
    //Здесь нужно будет запрограммировать
    //создание пользователя в БД
    // и еще всякие штуки (например, отправку письма)
});

// 3. Предоставить страницу с формой входа
Route::get('/login', function () {
    //Здесь мы выведем TML-страницу с формой входа
});

// 4. Отправка данных входа (нажатие на кнопку войти в Личном кабинете)
Route::post('/enter', function() {
    // Здесь мы будем запоминать авторизацию пользователя
});
// 5. Предоставить главную страницу
Route::get('/', function () {
    // Выводим главную страницу
    return view('index');
});



// 1. Предоставить страницу со списком задач
Route::get('/tasks', function () {
    // Здесь нужно вывести HTML-страницу со списком задач
    return view('tasks.list');
});
// 2. Представить страницу с детальным отображением определенной задачи
Route::get('/tasks/{id}', function ($id) {
    // Здесь запрограммировать логику получения из базы
    // задачи с номером $id
    //  а также вывести красивую HTML-страницу, в которую
    // вставим информацию по выбранной из базы задачи
    return view('tasks.detail');
})->whereNumber('id');

// 3. Предоставить форму с созданием задачи
Route::get('/tasks/create', function () {
// десь надо предоставить TML-страницу с формой
    return view('tasks.create');
});
