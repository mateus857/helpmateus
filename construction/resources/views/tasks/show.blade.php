@extends('layout.master')

@section('content')

    <div class="card">
        <div class="card-header">{{ $task->title }}</div>

        <div class="card-body">
            <p>{{ $task->description }}</p>

            <!-- Verifica se a data é não nula antes de formatar -->
            @if ($task->created_at)
                <p>Criado em: {{ $task->created_at->format('d/m/Y H:i:s') }}</p>
            @else
                <p>Data de criação não disponível</p>
            @endif
        </div>
    </div>
    <a href="{{ route('tasks.index') }}" class="btn btn-info mt-2">Voltar</a>
@endsection
{{--</x-app-layout>--}}
