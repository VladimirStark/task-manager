<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    /**
     * Эта настройка позволяет явно указать
     *на какую таблицу должна смотреть данная модель
     */
    protected $table = 'statuses';

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
