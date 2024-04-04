@extends('layout.app')

@section('title', 'Task List')
@section('content')
    <div class="mb-4">
        <a class="link" href="{{route('tasks.create')}}">Thêm task</a>
    </div>

    @if (@isset($tasks) && count($tasks) > 0)
    @foreach ($tasks as $task) 
        <p>
            <a href="{{route('tasks.single', ['task' => $task->id])}}"
                @class(['line-through' => $task->completed])
                >
                {{$task->title}}
            </a>
        </p>
    @endforeach
    @else
    <p>không có task</p>
    @endisset
    @if ($tasks->count())
    {{ $tasks->links() }}
    @endif
@endsection
