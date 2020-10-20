<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Tela Inicial') }}
                    </h2>
                </div>
            </div>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1 class="text-secondary font-weight-bold  p-4">Bem vindo à plataforma de gerenciamento de tarefas e obrigações, {{ ucwords(Auth::user()->name) }}</h1>
            </div>
        </div>
    </div>
</x-app-layout>
