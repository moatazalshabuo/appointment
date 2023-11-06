<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'id',
        "note",
        "title",
        "start",
        "end",
        "user_id",
        "created_by",
        "status",
        "num_repet",
        "type_repet",
        "code"
    ];
    protected $table = "todo_list";

    // public get_days(){

    // }
}
