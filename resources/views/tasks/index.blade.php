<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
</head>
<body>
<h1>My To-Do List</h1>

@if ($errors->any())
    <div>
        <p>Please fix the following issues:</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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

@forelse($tasks as $task)
    <div>
        <p><strong>{{ $task->title }}</strong></p>
        @if ($task->description)
            <p>{{ $task->description }}</p>
        @endif
        <p>Status: {{ ucfirst($task->status) }}</p>
        <form action="/tasks/{{ $task->id }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@empty
    <p>No tasks yet.</p>
@endforelse
</body>
</html>

