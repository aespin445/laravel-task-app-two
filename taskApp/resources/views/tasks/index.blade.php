@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-bold mb-4">All Tasks</h1>
{{-- search and sort form --}}
<form action="{{ route('tasks.index') }}" method="GET" class="mb-4">
<!-- Search Field -->
<input
type="text"
name="search"
value="{{ request('search') }}"
placeholder="Search tasks..."
class="border border-gray-300 px-2 py-1 rounded"
>
<!-- Sort Options -->
<select name="sort" class="border border-gray-300 px-2 py-1 rounded">
<option value="task_name" {{ request('sort') === 'task_name' ? 'selected' : '' }}>
Alphabetical
</option>
<option value="deadline" {{ request('sort') === 'deadline' ? 'selected' : '' }}>
Deadline
</option>
<option value="category" {{ request('sort') === 'category' ? 'selected' : '' }}>
Category
</option>
</select>
<button type="submit" class="bg-purple-500 text-white px-4 py-2 ml-2 rounded hover:bg-blue-600">
Search & Sort
</button>
</form>
<ul>
@forelse($tasks as $task)
<div class="bg-purple-500 shadow-md">
    <li class="mb-2 p-4 text-white">
        {{ $task->task_name }}
        <!-- Link to the show page -->
        <a href="{{ route('tasks.show', $task->id) }}" class="ml-2 float-right px-3 rounded-lg {{ $task->priority === 3 ? 'bg-red-500' : ($task->priority === 2 ? 'bg-yellow-400' : 'bg-green-500') }}">
            View
        </a>
    </li>
</div>
@empty
<li>No tasks yet.</li>
@endforelse
</ul>
<div class="mt-4">
<a href="{{ route('tasks.create') }}"
class="bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600">
Create a New Task
</a>
</div>
@endsection
