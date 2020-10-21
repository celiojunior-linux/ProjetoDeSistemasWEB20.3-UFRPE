<x-app-layout>
    <x-slot name="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Todas as tarefas') }}</h2>
                </div>
                <div class="col-md-5">
                    <form method="get" action="{{route('search')}}">
                        <input class="form-control w-75 d-inline" type="search" name="search" placeholder="Faça sua busca aqui">
                        <button class="w-20 btn btn-dark">Buscar</button>
                    </form>
                </div>
                <div class="col-md-2 col-sm-12">
                    <a href="{{route('tasks.create')}}" class="btn btn-dark">Adicionar nova</a>
                </div>
                <div class="col-md-2 col-sm-12">
                    <form method="post" action="{{route("deleteall", Auth::user()->id)}}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button onclick="return confirm('Você tem certeza?')" class="btn btn-danger">Remover todas</button>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
        <div class="container-fluid mt-2">
            @if(!count($all_tasks) == 0)
                <table class="table table-bordered" style="max-width: 100vw;">
                    <thead class="bg-dark text-light">
                    <tr>
                        <td class="col-4">Título</td>
                        <td class="col-5">Descrição</td>
                        <td class="col-1">Estado</td>
                        <td class="col-1">Prazo</td>
                        <td class="col-1">Ações</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($all_tasks as $task)
                        <tr>
                            <td class="col-2"><p style="max-height:64px; overflow-y: auto; overflow-x: hidden; padding: 0;">{{$task->title}}</p></td>
                            <td class="col-4 p-1"><p style="max-height:64px; overflow-y: auto; overflow-x: hidden; padding: 0;">{{$task->desc}}</p></td>
                            @if($task->state)
                                <td class="col-1 bg-success">Finalizada</td>
                            @else
                                <td class="col-1 bg-warning">Incompleta</td>
                            @endif
                            <td class="col-1">{{$task->deadline}}</td>
                            <td class="col-1">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Selecione uma ação
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <form method="post" action="{{ route('complete', $task->id ) }}">
                                            @csrf
                                            @if($task->state)
                                                <button class="dropdown-item">Desfazer</button>
                                            @else
                                                <button class="dropdown-item">Completar</button>
                                            @endif
                                        </form>
                                        <a href="{{route('tasks.edit',$task->id)}}" class="dropdown-item">Editar</a>
                                        <form method="post" action="{{ route('tasks.destroy', $task->id)}}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button onclick="return confirm('Você tem certeza?')" class="dropdown-item">Remover</button>
                                        </form>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @elseif(request()->is('tasks'))
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <h1 class="text-secondary font-weight-bold  p-4">Nenhuma tarefa encontrada, <a href="{{route('tasks.create')}}">Clique aqui para adicionar uma tarefa.</a></h1>
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <h1 class="text-secondary font-weight-bold  p-4">Nenhum resultado referente a sua busca foi encontrado.</h1>
                </div>
            @endif
        </div>

</x-app-layout>
<script>
    import Button from "../../js/Jetstream/Button";
    export default {
        components: {Button}
    }
</script>
