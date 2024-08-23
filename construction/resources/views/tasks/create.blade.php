<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar Tarefa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-600" >
                <div class="p-6 text-gray-900">
                    <!-- Formulário para adicionar tarefa -->
                    <form action="{{ route('tasks.store') }}"  method="POST">
                        @csrf

                        <!-- Campo do Título -->
                        <div class="mb-4">
                            <label for="title" class="block text-gray-600 text-sm font-medium">Título:</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        </div>

                        <!-- Campo da Data -->
                        <div class="mb-4">
                            <label for="date" class="block text-gray-600 text-sm font-medium">Data:</label>
                            <input type="date" name="date" id="date" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        </div>

                        <!-- Campo da Descrição -->
                        <div class="mb-4">
                            <label for="description" class="block text-gray-600 text-sm font-medium">Descrição:</label>
                            <textarea name="description" id="description" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="4" required></textarea>
                        </div>

                        <!-- Campo de Conclusão (Completed) -->
                        <div class="mb-4">
                            <label for="completed" class="block text-gray-600 text-sm font-medium">Concluída:</label>
                            <select name="completed" id="completed" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>

                        <!-- Botão de Submissão -->
                        <div class="mt-4">
                            <x-primary-button class="mt-4">{{ __('Criar Tarefa') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
