<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Receitas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- Card para exibir o total de receitas -->
{{--        <div class="max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">--}}
{{--            <div class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">--}}
{{--                <div class="mb-4">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <!-- Exibe o total de receitas -->--}}
{{--                            <h1 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Total de Receitas: <span id="totalReceitas">{{ $totalReceitas }}</span></h1>--}}

{{--                            <!-- Botão para criar uma nova receita -->--}}
{{--                            <a href="{{ route('receitas.create') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-4">--}}
{{--                                Nova Receita--}}
{{--                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">--}}
{{--                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>--}}
{{--                                </svg>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Lista as receitas -->--}}
{{--            <div class="relative overflow-x-auto">--}}
{{--                @foreach($receitas as $receita)--}}
{{--                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">--}}
{{--                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">--}}

{{--                        <h5 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $receita->descricao }}</h5>--}}
{{--                        <p class="text-gray-700 dark:text-gray-400">Valor: R$ {{ $receita->valor }}</p>--}}
{{--                        <!-- Adicionar caixa de seleção -->--}}
{{--                        <div class="flex items-center mt-2">--}}
{{--                            <input type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-blue-500 receita-checkbox" value="{{ $receita->valor }}">--}}
{{--                            <label class="ml-2 text-gray-700 dark:text-gray-400">Selecionar</label>--}}
{{--                        </div>--}}
{{--                        </thead>--}}
{{--                    </table>>--}}
{{--                @endforeach--}}
{{--            </div>--}}

            <section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
                <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
                    <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                        <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                            <div class="flex items-center flex-1 space-x-4">
                                <h5>
                                    <span class="text-gray-500">All Products:</span>
                                    <span class="dark:text-white">123456</span>
                                </h5>
                                <h5>
                                    <span class="text-gray-500">Total sales:</span>
                                    <span class="dark:text-white">$88.4k</span>
                                </h5>
                            </div>
                            <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                                <x-primary-button type="button">
                                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                    </svg>
                                    Nova receita
                                </x-primary-button>
                            </div>
                        </div>
{{--                        TABELA EM SI --}}
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all" type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-all" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-4 py-3">Descrição</th>
                                    <th scope="col" class="px-4 py-3">Valor</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($receitas as $receita)
                                    <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">

                                    <td class="w-4 px-4 py-3">
                                        <div class="flex items-center">
                                            <input id="checkbox-table-search-1" type="checkbox" onclick="event.stopPropagation()" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <th scope="row" class="flex items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
{{--                                        <img src="https://flowbite.s3.amazonaws.com/blocks/application-ui/products/imac-front-image.png" alt="iMac Front Image" class="w-auto h-8 mr-3">--}}
                                        {{ $receita->descricao }}
                                    </th>
                                    <td class="px-4 py-2">
                                        <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">R$ {{ $receita->valor }}</span>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0" aria-label="Table navigation">
              <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                  Showing
                  <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                  of
                  <span class="font-semibold text-gray-900 dark:text-white">1000</span>
              </span>
                            <ul class="inline-flex items-stretch -space-x-px">
                                <li>
                                    <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                        <span class="sr-only">Previous</span>
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                                </li>
                                <li>
                                    <a href="#" aria-current="page" class="z-10 flex items-center justify-center px-3 py-2 text-sm leading-tight border text-primary-600 bg-primary-50 border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                        <span class="sr-only">Next</span>
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Script para atualizar o total de receitas baseado nas caixas de seleção -->
    <script>
        // Adiciona um ouvinte de evento para as caixas de seleção
        let checkboxes = document.querySelectorAll('.receita-checkbox');
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                let total = 0;
                checkboxes.forEach(function(cb) {
                    if (cb.checked) {
                        total += parseFloat(cb.value);
                    }
                });
                // Atualiza o valor do total de receitas
                document.getElementById('totalReceitas').innerText = total.toFixed(2);
            });
        });
    </script>
</x-app-layout>
