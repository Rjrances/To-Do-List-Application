<form action="/tasks" method="POST">
    @csrf
    <div>
        <label for="title">Task Title</label>
        <input id="title" type="text" name="title" value="{{ old('title') }}" required />
    </div>

    <div>
        <label for="description">Description (optional)</label>
        <textarea id="description" name="description">{{ old('description') }}</textarea>
    </div>

    <button type="submit">Add Task</button>
</form>

