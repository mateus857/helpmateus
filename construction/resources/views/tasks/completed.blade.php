@extends('layout.master')

@section('nome-app')
    Tasks Concluídas
@endsection

@section('content')

    <div class="row">
        <div class="col">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-2">Nova Tarefa</a>
{{--        </div>--}}
{{--        <div class="col">--}}
            <a href="{{ route('tasks.index') }}" class="btn btn-primary mb-2">Voltar para Tarefas</a>
        </div>
    </div>

    <div class="row">
        @foreach($completedTasks as $task)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $task->title }}</h5>
                        <p class="card-text">{{ $task->description }}</p>
                        <p class="card-text">Data: {{ $task->date ? date('d/m/Y', strtotime($task->date)) : 'Não definida' }}</p>
                        <p class="card-text">Concluída: {{ $task->completed ? 'Sim' : 'Não' }}</p>
                        <p class="card-text">Criada em: {{ $task->created_at->format('d/m/Y')  }}</p>
                        <p class="card-text">Atualizada em: {{  $task->updated_at->format('d/m/Y') }}</p>
                        <a href="{{ route('tasks.show', $task) }}" class="btn btn-primary">Ver detalhes</a>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-info">Editar</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
