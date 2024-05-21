@extends('pages.layout')

@section('app')
    <div class="to-do">
        <h1 class="text">Editar Tarefa</h1>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="insert">
                <input class="textInsert" type="text" id="name" name="name" value="{{ $task->name }}" required />
                <button type="submit"><i class="bi bi-save" style="font-size: 20px;"></i></button>
            </div>
        </form>
    </div>
@endsection