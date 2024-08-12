<x-app-layout>

<div class="card">
    <div class="card-header">NOVA RECEITA</div>
    <!-- Formulário para adicionar tarefa -->
    <div class="card-body">
        <form action="{{ route('receitas.store') }}" method="POST">
            @csrf
            <div>
                <label for="descricao" >Descrição:</label><br>
                <input type="text" id="descricao" name="descricao" ><br>
                @error('descricao')
                <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="valor">Valor:</label><br>
                <input type="text" id="valor" name="valor"><br>
                @error('valor')
                <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-primary mt-4">Cadastrar Receita</button>
            </div>
        </form>
    </div>
</div>
</x-app-layout>
