{{--@extends('layout.master')--}}

{{--@section('nome-app')--}}
{{--    Tasks--}}
{{--@endsection--}}

{{--@section('content')--}}

{{--    <div class="row">--}}
{{--        <div class="col">--}}
{{--            <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-2">Nova Tarefa</a>--}}
{{--            --}}{{--        </div>--}}
{{--            --}}{{--        <div class="col">--}}
{{--            <a href="{{ route('tasks.completed') }}" class="btn btn-primary mb-2">Ver Tarefas Concluídas</a>--}}
{{--            <div class="mx-1 mb-2 form-check form-switch">--}}
{{--                <input class="form-check-input" type="checkbox" id="filtroTarefasCompletas">--}}
{{--                <label class="form-check-label" for="filtroTarefasCompletas">Esconder tarefas completas</label>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--    </div>--}}
{{--    <div class="row">--}}
{{--        @if($tasks->where('completed', 0)->isEmpty())--}}
{{--            <p>Nenhuma tarefa pendente!</p>--}}
{{--        @else--}}
{{--            <div id="cards" class="row">--}}
{{--                @foreach($tasks as $task)--}}
{{--                    @if(!$task->completed)--}}
{{--                        <div class="col-md-4 mb-4">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-body">--}}
{{--                                    <h5 class="card-title">{{ $task->title }}</h5>--}}
{{--                                    <p class="card-text">{{ $task->description }}</p>--}}
{{--                                    <p class="card-text">--}}
{{--                                        Data: {{ $task->date ? date('d/m/Y', strtotime($task->date)) : 'Não definida' }}</p>--}}
{{--                                    <p class="card-text">Concluída: {{ $task->completed ? 'Sim' : 'Não' }}</p>--}}
{{--                                    <p class="card-text">Criada em: {{ $task->created_at->format('d/m/Y')  }}</p>--}}
{{--                                    <p class="card-text">Atualizada em: {{  $task->updated_at->format('d/m/Y') }}</p>--}}
{{--                                    <div class="btn-group" role="group" aria-label="Basic example" id="buttonform">--}}
{{--                                        <div class="btn-group" role="group">--}}
{{--                                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                                <i class="fa-solid fa-gear fa-spin"></i>--}}
{{--                                            </button>--}}
{{--                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">--}}
{{--                                                <li><a class="dropdown-item" href="{{ route('tasks.show', $task) }}">Visualizar</a></li>--}}
{{--                                                <li><a class="dropdown-item" href="{{ route('tasks.edit', $task) }}">Editar</a></li>--}}
{{--                                                <li>--}}
{{--                                                    <form action="{{ route('tasks.markAsCompleted', $task) }}" method="POST" class="dropdown-item">--}}
{{--                                                        @csrf--}}
{{--                                                        @method('PUT')--}}
{{--                                                        <button type="submit" class="btn btn-success" title="Concluir">--}}
{{--                                                            Concluir--}}
{{--                                                        </button>--}}
{{--                                                     </form>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        @endif--}}

{{--    </div>--}}
{{--    <script>--}}
{{--        document.addEventListener('DOMContentLoaded', function () {--}}
{{--            const filtro = document.getElementById('filtroTarefasCompletas');--}}
{{--            const cards = document.getElementById('cards'); // Selecionando todos os cards--}}

{{--            // Verifica e aplica o estado salvo do switch--}}
{{--            const switchState = localStorage.getItem('filtroTarefasCompletas');--}}
{{--            if (switchState !== null) {--}}
{{--                filtro.checked = switchState === 'true';--}}
{{--                toggleTarefas(filtro.checked);--}}
{{--            }--}}

{{--            filtro.addEventListener('change', function () {--}}
{{--                toggleTarefas(this.checked);--}}
{{--                // Salva o estado do switch no LocalStorage--}}
{{--                localStorage.setItem('filtroTarefasCompletas', this.checked);--}}
{{--            });--}}

{{--            function toggleTarefas(checked) {--}}
{{--                cards.forEach(card => {--}}
{{--                    const isCompleta = card.classList.contains('tarefa-completa');--}}
{{--                    if (isCompleta && checked) {--}}
{{--                        card.style.display = 'none';--}}
{{--                    } else {--}}
{{--                        card.style.display = '';--}}
{{--                    }--}}
{{--                });--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}

@extends('layout.master')

@section('nome-app')
    Tasks
@endsection

@section('content')

    <div class="row">
        <div class="col">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-2">Nova Tarefa</a>
                    </div>
            {{--        <div class="col">--}}
{{--            <a href="{{ route('tasks.completed') }}" class="btn btn-primary mb-2">Ver Tarefas Concluídas</a>--}}
            <div class="mx-1 mb-2 form-check form-switch">
                <input class="form-check-input" type="checkbox" id="filtroTarefasCompletas">
                <label class="form-check-label" for="filtroTarefasCompletas">Esconder tarefas completas</label>
            </div>
        </div>


    </div>
    <div class="row">
        @if($tasks->where('completed', 0)->isEmpty())
            <p>Nenhuma tarefa pendente!</p>
        @else
            <div id="cards" class="row">
                @foreach($tasks as $task)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $task->title }}</h5>
                                <p class="card-text">{{ $task->description }}</p>
                                <p class="card-text">
                                    Data: {{ $task->date ? date('d/m/Y', strtotime($task->date)) : 'Não definida' }}</p>
                                <p class="card-text">Concluída: {{ $task->completed ? 'Sim' : 'Não' }}</p>
                                <p class="card-text">Criada em: {{ $task->created_at->format('d/m/Y')  }}</p>
                                <p class="card-text">Atualizada em: {{  $task->updated_at->format('d/m/Y') }}</p>
                                <div class="btn-group" role="group" aria-label="Basic example" id="buttonform">
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-gear fa-spin"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <li><a class="dropdown-item" href="{{ route('tasks.show', $task) }}">Visualizar</a></li>
                                            <li><a class="dropdown-item" href="{{ route('tasks.edit', $task) }}">Editar</a></li>
                                            <li>
                                                <form action="{{ route('tasks.markAsCompleted', $task) }}" method="POST" class="dropdown-item">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-success" title="Concluir">
                                                        Concluir
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filtro = document.getElementById('filtroTarefasCompletas');
            const cards = document.querySelectorAll('.card'); // Selecionando todos os cards

            // Verifica e aplica o estado salvo do switch
            const switchState = localStorage.getItem('filtroTarefasCompletas');
            if (switchState !== null) {
                filtro.checked = switchState === 'true';
                toggleTarefas(filtro.checked);
            }

            filtro.addEventListener('change', function () {
                toggleTarefas(this.checked);
                // Salva o estado do switch no LocalStorage
                localStorage.setItem('filtroTarefasCompletas', this.checked);
            });

            function toggleTarefas(checked) {
                cards.forEach(card => {
                    const isCompleta = card.querySelector('.card-text:nth-child(4)').textContent.trim() === 'Concluída: Sim';
                    if (isCompleta && checked) {
                        card.parentNode.style.display = 'none';
                    } else {
                        card.parentNode.style.display = '';
                    }
                });
            }
        });
    </script>
@endsection

