@extends('pages.layout')

@section('app')
    <div class="to-do">
        <form id="task-form" action="{{ route('tasks.create') }}" method="POST">
            @csrf
            <div class="insert">
                <input class="textInsert" type="text" id="name" name="name" required />
                <button type="submit"><i class="bi bi-plus-circle" style="font-size: 30px;"></i></button>
            </div>
            <ul class="task-list">
                @forelse ($tasks as $task)
                    <li class="task-item">
                        {{ $task->name }}
                        <div class="icons">
                            <i class="bi bi-trash3-fill"></i>
                            <i class="bi bi-pencil-square"></i>
                        </div>
                    </li>
                @empty
                    <li class="no-tasks">Nenhuma tarefa encontrada.</li>
                @endforelse
            </ul>
        </form>
    </div>
@endsection
