@extends('pages.layout')

@section('app')
    <div class="to-do">
        <h1 class="text">Lista de Tarefas</h1>

        {{-- Formulário de Criação de Tarefa --}}
        <form id="task-form" action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="insert">
                <input class="textInsert" type="text" id="name" name="name" required />
                <button type="submit"><i class="bi bi-plus-circle" style="font-size: 30px;"></i></button>
            </div>
        </form>

        {{-- Lista de Tarefas --}}
        <ul class="task-list">
            @forelse ($tasks as $task)
                <li class="task-item">
                    {{ $task->name }}
                    <div class="icons">
                        {{-- Formulário de Exclusão --}}
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <i class="bi bi-trash3" style="font-size: 20px; color:black"></i>
                            </button>
                        </form>
                        <a href="{{ route('tasks.edit', $task->id) }}">
                            <i class="bi bi-pencil-square" style="font-size: 20px; color:black"></i>
                        </a>
                    </div>
                </li>
            @empty
                <li class="no-tasks">Nenhuma tarefa encontrada.</li>
            @endforelse
        </ul>
    </div>
@endsection
