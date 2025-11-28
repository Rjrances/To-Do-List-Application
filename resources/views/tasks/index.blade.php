@extends('layouts.app')

@section('content')
    @include('tasks.add-form')

    @forelse($tasks as $task)
        <div>
            @if(isset($editingTask) && $editingTask->id === $task->id)
                @include('tasks.edit-form', ['task' => $task])
            @else
                <p><strong>{{ $task->title }}</strong></p>
                @if ($task->description)
                    <p>{{ $task->description }}</p>
                @endif
                <p>Status: {{ ucfirst($task->status) }}</p>
                <a href="/tasks/{{ $task->id }}/edit">Edit</a>
                @include('tasks.delete-form', ['task' => $task])
            @endif
        </div>
    @empty
        <p>No tasks yet.</p>
    @endforelse
@endsection
