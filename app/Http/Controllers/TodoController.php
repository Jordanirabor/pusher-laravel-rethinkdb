<?php

namespace App\Http\Controllers;

use App\Events\TodoEvent;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function getTodo()
    {
        $todos = Todo::all();
        return view('welcome', compact('todos'));
    }

    public function createTodo(Request $request)
    {
        $validatedData = $request->validate([
            'body' => 'required',
        ]);

        $todo = new Todo();
        $todo->body = $validatedData['body'];
        $todo->save();
        $todos = Todo::all();
        event(new TodoEvent($todos));
        return redirect()->route('home')->with(compact('todos'));

    }

    public function updateTodo(Request $request, $id)
    {
        $validatedData = $request->validate([
            'body' => 'required',
        ]);

        $todo = Todo::find($id);
        $todo->body = $validatedData['body'];
        $todo->save();

        $todos = Todo::all();
        event(new TodoEvent($todos));

       return redirect()->route('home')->with(compact('todos'));

    }

    public function deleteTodo($id)
    {
        $todo = Todo::destroy($id);
        $todos = Todo::all();
        event(new TodoEvent($todos));

       return redirect()->route('home')->with(compact('todos'));
    }
}
