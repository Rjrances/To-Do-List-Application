<form action="/tasks/{{ $task->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>

