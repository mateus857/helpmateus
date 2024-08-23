<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agenda') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 p-4">
                    <!-- Seção de Tarefas -->
                    <div>
                        <div class="bg-white shadow-md dark:bg-gray-800 p-2 rounded-lg">
                            <div class="flex justify-between items-center">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Minhas Tarefas</h3>
                                <a href="{{ route('tasks.create') }}">
                                    <x-primary-button>
                                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                        </svg>
                                        Nova Tarefa
                                    </x-primary-button>
                                </a>
                            </div>
                            <div class="flex items-center mt-4 space-x-2">
                                <input type="checkbox" id="filtroTarefasCompletas" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <label for="filtroTarefasCompletas" class="ml-2 block text-sm leading-5 text-gray-900 dark:text-gray-100">Esconder tarefas completas</label>
                            </div>
                        </div>
                        <div class="overflow-auto max-h-[500px]">
                            <div class="grid grid-cols-1 gap-2 md:grid-cols-2 lg:grid-cols-2 p-1 mt-4">
                                @foreach($tasks as $task)
                                    <div class="block p-4 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                        <h5 class="mb-1 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $task->title }}</h5>
                                        <p class="text-sm font-normal text-gray-700 dark:text-gray-400">{{ $task->description }}</p>
                                        <p class="text-sm font-normal text-gray-700 dark:text-gray-400">
                                            Data: {{ $task->date ? date('d/m/Y', strtotime($task->date)) : 'Não definida' }}</p>
                                        <p class="text-sm font-normal text-gray-700 dark:text-gray-400">Concluída: {{ $task->completed ? 'Sim' : 'Não' }}</p>
                                        <p class="text-sm font-normal text-gray-700 dark:text-gray-400">Criada em: {{ $task->created_at->format('d/m/Y') }}</p>
                                        <p class="text-sm font-normal text-gray-700 dark:text-gray-400">Atualizada em: {{ $task->updated_at->format('d/m/Y') }}</p>
                                        <div class="flex justify-end mt-2">
                                            <!-- Botões ou outras opções aqui -->
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Seção de Calendário -->
                    <div>
                        <div id="calendar" class="bg-white shadow-md dark:bg-gray-800 p-4 rounded-lg">
                            <!-- O calendário será renderizado aqui -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FullCalendar Script -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filtro = document.getElementById('filtroTarefasCompletas');
            const cards = document.querySelectorAll('.card');

            const switchState = localStorage.getItem('filtroTarefasCompletas');
            if (switchState !== null) {
                filtro.checked = switchState === 'true';
                toggleTarefas(filtro.checked);
            }

            filtro.addEventListener('change', function () {
                toggleTarefas(this.checked);
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

            // Configuração do calendário
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'pt-br',
                events: [
                        @foreach($tasks as $task)
                    {
                        title: '{{ $task->title }}',
                        start: '{{ $task->date }}',
                        allDay: true,
                        url: '{{ route('tasks.show', $task) }}'
                    },
                    @endforeach
                ]
            });
            calendar.render();
        });
    </script>
</x-app-layout>
