<?php

namespace App\Http\Controllers;
use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    //
    public function index() {
        $todos = Todo::all();
        return $todos;
    }
    
    public function add(Request $request) {
        if (!$request->method('post')){return;}
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->save();
        return Todo::findOrfail($todo->id);
    }

    public function rm(Request $request) {
        if (!$request->method('post')) {return;}
        $todo = Todo::findOrfail($request->id);
        $todo->delete();
        return $todo;
    }

    public function limit($val){
        if ($val == 'All') {
            $todos = Todo::all();
            return $todos;
        }
        $todos = Todo::take($val)->get();
        return $todos;
    }

    public function complete(Request $request) {
        if (!$request->method('post')){return;}
        $todo = Todo::findOrfail($request->todo['id']);
        if (!$todo->completed) {
            $todo->completed = true;
        }else {
            $todo->completed = false;
        }
        $todo->save();
        return Todo::all();
    }
}
