<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Nova Tarefa') }}
                    </h2>
                </div>
            </div>
        </div>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <form action="{{route('tasks.store')}}" method="post">
                    @csrf
                    <span class="row mb-4">
                        <label class="font-weight-bold col-2" for="title">Titulo</label>
                        <input class="col-10 border border-dark rounded" type="text" id="title" name="title" required>
                    </span>
                    <span class="row mb-4">
                        <label class="font-weight-bold col-2" for="desc">Descrição</label>
                        <textarea class="col-10 border border-dark rounded" type="text" id="desc" name="desc" required></textarea>
                    </span>
                    <span class="row mb-4">
                        <label class="font-weight-bold col-2" for="deadline">Prazo</label>
                        <input class="col-10 border border-dark rounded" type="date" id="deadline" name="deadline" data-date-format="DD MMMM YYYY" required>
                    </span>
                    <span>
                        <button class="btn btn-dark w-25">Salvar</button>
                        <input class="btn btn-warning w-25"type="reset" value="Limpar">
                    </span>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
