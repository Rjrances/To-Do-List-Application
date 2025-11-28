<form action="/tasks/{{ $task->id }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="edit_title_{{ $task->id }}">Task Title</label>
        <input id="edit_title_{{ $task->id }}" type="text" name="title" value="{{ old('title', $task->title) }}" required />
    </div>
    <div>
        <label for="edit_description_{{ $task->id }}">Description (optional)</label>
        <textarea id="edit_description_{{ $task->id }}" name="description">{{ old('description', $task->description) }}</textarea>
    </div>
    <button type="submit">Update Task</button>
    <a href="/">Cancel</a>
</form>

