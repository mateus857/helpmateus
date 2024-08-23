<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('date')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'completed' => 'required|boolean',
        ]);

        Task::create($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Tarefa adicionada com sucesso!');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'date' => 'required|date',
            'description' => 'required',
            'completed' => 'required|boolean',
        ]);

        $task->update($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tarefa excluída com sucesso!');
    }

    public function markAsCompleted(Task $task)
    {
        $task->update(['completed' => true]);
        return redirect()->route('tasks.index')->with('success', 'Tarefa marcada como concluída!');
    }

    public function completed()
    {
        // Obtém todas as tarefas concluídas
        $completedTasks = Task::where('completed', true)->get();

        // Retorna a visualização com as tarefas concluídas
        return view('tasks.completed', compact('completedTasks'));
    }
}
