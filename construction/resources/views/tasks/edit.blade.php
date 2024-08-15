@extends('layout.master')

@section('nome-app')
    Tasks - Editar Task
@endsection

@section('content')

    <div class="card">
        <div class="card-header">Editar Task</div>
        <!-- Formulário para editar tarefa -->
        <div class="card-body">
            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Campo do Título -->
                <div class="mb-4">
                    <label for="title" class="block text-gray-600 text-sm font-medium">Título:</label>
                    <input type="text" name="title" id="title" class="form-control mt-1 block w-full" value="{{ $task->title }}" required>
                </div>

                {{-- Campo da Data--}}
                <div class="mb-4">
                    <label for="date" class="block text-gray-600 text-sm font-medium">Data:</label>
                    <input type="date" name="date" id="date" class="form-control mt-1 block w-full" value="{{ $task->title }}" required>
                </div>

                <!-- Campo da Descrição -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-600 text-sm font-medium">Descrição:</label>
                    <textarea name="description" id="description" class="form-control mt-1 block w-full" rows="4" required>{{ $task->description }}</textarea>
                </div>

                <!-- Campo de Conclusão (Completed) -->
                <div class="mb-4">
                    <label for="completed" class="block text-gray-600 text-sm font-medium">Concluída:</label>
                    <select name="completed" id="completed" class="form-select mt-1 block w-full" required>
                        <option value="0" {{ $task->completed == 0 ? 'selected' : '' }}>Não</option>
                        <option value="1" {{ $task->completed == 1 ? 'selected' : '' }}>Sim</option>
                    </select>
                </div>

                <!-- Botão de Submissão -->
                <div class="mt-4">
                    <button type='submit' class="btn btn-success mt-4">{{ __('Atualizar Tarefa') }}</button>
                    <a href="{{route('tasks.index')}}" class="btn btn-secondary  mt-4">Voltar</a>
                </div>
            </form>
        </div>

    </div>

@endsection
