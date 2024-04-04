@extends('layout.app')

@section('title', isset($task) ? 'Sửa Task '.$task->id : 'Tạo Task')

@section('content')
    <div class="mb-2">
        <a class="text-green-500" href="{{route('tasks')}}"><< Quay lại danh sách!</a>
    </div>
    <form action="{{ isset($task) ?  route('tasks.update', ['task' => $task->id]) : route('tasks.store')}}" method="post">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-2">
            <label for="title">Tiêu đề</label>
            <input type="text" name="title" id="title" value="{{isset($task->title) ? old('title', $task->title) : ''}}"
                @class(['border-red-500' => $errors->has('title')])
            >
            @error('title')
                <p class="error">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-2">
            <label for="description">Mô tả</label>
            <textarea name="description" id="description"
            @class(['border-red-500' => $errors->has('description')])>{{isset($task->description) ? old('description', $task->description) : ''}}</textarea>
            @error('description')
                <p class="error">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-2">
            <label for="long_description">Mô tả dài</label>
            <textarea name="long_description" id="long_description"
                @class(['border-red-500' => $errors->has('long_description')])
                >{{isset($task->long_description) ? old('long_description', $task->long_description) : ''}}</textarea>
            @error('long_description')
                <p class="error">{{$message}}</p>
            @enderror
        </div>

        <div>
            <button class="btn" type="submit">
                @isset($task)
                    Sửa task
                    @else
                    Tạo task
                @endisset
            </button>
        </div>
    </form>
@endsection