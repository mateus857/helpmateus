<!-- resources/views/tasks/create.blade.php -->

@extends('layout.master')

@section('nome-app')
    Tasks - Nova Task
@endsection

@section('content')

    <div class="card">
        <div class="card-header">Nova Task</div>
        <!-- Formulário para adicionar tarefa -->
        <div class="card-body">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf

                <!-- Campo do Título -->
                <div class="mb-4">
                    <label for="title" class="block text-gray-600 text-sm font-medium">Título:</label>
                    <input type="text" name="title" id="title" class="form-control mt-1 block w-full" required>
                </div>

                <!-- Campo da Data -->
                <div class="mb-4">
                    <label for="date" class="block text-gray-600 text-sm font-medium">Data:</label>
                    <input type="date" name="date" id="date" class="form-control mt-1 block w-full" required>
                </div>

                <!-- Campo da Descrição -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-600 text-sm font-medium">Descrição:</label>
                    <textarea name="description" id="description" class="form-control mt-1 block w-full" rows="4"
                              required></textarea>
                </div>

                <!-- Campo de Conclusão (Completed) -->
                <div class="mb-4">
                    <label for="completed" class="block text-gray-600 text-sm font-medium">Concluída:</label>
                    <select name="completed" id="completed" class="form-select mt-1 block w-full" required>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>

                <!-- Botão de Submissão -->
                <div class="mt-4">
                    <button type='submit' class="btn btn-primary mt-4">{{ __('Criar Tarefa') }}</button>
                </div>
            </form>
        </div>

    </div>

@endsection


{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Adicionar Tarefa') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 text-gray-900">--}}
{{--                    <!-- Formulário para adicionar tarefa -->--}}
{{--                    <form action="{{ route('tasks.store') }}" method="POST">--}}
{{--                        @csrf--}}

{{--                        <!-- Campo do Título -->--}}
{{--                        <div class="mb-4">--}}
{{--                            <label for="title" class="block text-gray-600 text-sm font-medium">Título:</label>--}}
{{--                            <input type="text" name="title" id="title" class="form-input mt-1 block w-full" required>--}}
{{--                        </div>--}}

{{--                        <!-- Campo da Descrição -->--}}
{{--                        <div class="mb-4">--}}
{{--                            <label for="description" class="block text-gray-600 text-sm font-medium">Descrição:</label>--}}
{{--                            <textarea name="description" id="description" class="form-input mt-1 block w-full" rows="4" required></textarea>--}}
{{--                        </div>--}}

{{--                        <!-- Campo de Conclusão (Completed) -->--}}
{{--                        <div class="mb-4">--}}
{{--                            <label for="completed" class="block text-gray-600 text-sm font-medium">Concluída:</label>--}}
{{--                            <select name="completed" id="completed" class="form-select mt-1 block w-full" required>--}}
{{--                                <option value="0">Não</option>--}}
{{--                                <option value="1">Sim</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <!-- Botão de Submissão -->--}}
{{--                        <div class="mt-4">--}}
{{--                            <x-primary-button class="mt-4">{{ __('Criar Tarefa') }}</x-primary-button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}

