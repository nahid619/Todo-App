<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return view('todos.index');
    }

    public function add(Request $request)
    {
        $todos = session()->get('todos', []);
        $todos[] = $request->input('todo');
        session()->put('todos', $todos);
        return redirect()->route('todos.index');
    }

    public function edit(Request $request, $index)
    {
        $todos = session()->get('todos', []);
        $todo = $todos[$index] ?? '';
        return view('todos.edit', compact('todo', 'index'));
    }

    public function update(Request $request)
    {
        $todos = session()->get('todos', []);
        $todos[$request->input('index')] = $request->input('todo');
        session()->put('todos', $todos);
        return redirect()->route('todos.index');
    }

    public function delete(Request $request, $index)
    {
        $todos = session()->get('todos', []);
        unset($todos[$index]);
        session()->put('todos', array_values($todos));
        return redirect()->route('todos.index');
    }
}
