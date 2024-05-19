<div class="container">
    <form action="{{ route('tasks.create') }}" method="POST">
        @csrf
        <label for="name">Tarefa:</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">Adicionar Tarefa</button>
    </form>
</div>

@if ($tasks->isEmpty())
<p>Nenhuma tarefa encontrada.</p>
@else
<ul>
    @foreach ($tasks as $task)
        <li>{{ $task->name }}</li>
    @endforeach
</ul>
@endif
