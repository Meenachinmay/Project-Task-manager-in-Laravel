@extends('layouts.app')

@section('content')

    <header class="flex items-center mb-3 py-4">

        <div class="flex justify-between items-end w-full">

            <p class="text-gray-500">
                <a href="/projects" class="font-semibold">My Projects</a> / {{ $project->title }}
            </p>

            <a href="{{ $project->path() . '/edit'}}" class="bg-teal-500 hover:bg-teal-700 text-white py-2 px-4 rounded-full">Edit Project</a>
        </div>
    </header>

    <main>

        <div class="lg:flex -mx-3">

            <div class="lg:w-3/4 px-3 mb-6">

                <div class="mb-8">

                    <h2 class="text-xl font-semibold text-gray-500 mb-3">Tasks</h2>

    {{--                tasks--}}
                    @forelse ($project->tasks as $task)

                        <div class="bg-white p-5 rounded-lg shadow-md mb-3">

                            <form method="POST" action="{{ $task->path() }}">

                                @method('PATCH')
                                @csrf

                                <div class="flex">

                                    <input name="body" value="{{ $task->body }}" class="w-full {{ $task->completed ? 'text-gray-500' : 'font-bold' }}">
                                    <input name="completed" type="checkbox" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>

                                </div>
                            </form>
                        </div>
                    @endforeach

                    <div class="bg-white p-5 rounded-lg shadow-md mb-3">

{{--                        Add a new task to the project--}}
                        <form action="{{ $project->path() . '/tasks' }}" method="POST">
                            @csrf

                            <input type="text" placeholder="Add new tasks..." class="w-full" name="body">
                        </form>
                    </div>
                </div>

                <div>

                    <h2 class="text-xl font-semibold text-gray-500 mb-3">General Notes</h2>

    {{--                General Task--}}
                    <form action="{{ $project->path() }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <textarea class="bg-white p-5 rounded-lg shadow-md w-full mb-4"
                                  style="min-height: 200px;"
                                  name="notes"
                                  placeholder="Anything you want make a note of?">{{ $project->notes }}

                        </textarea>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                    </form>

                    @if($errors->any())
                        <div class="field mt-6">
                            @foreach($errors->all() as $error)
                                <li class="text-sm text-red-500">{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="lg:w-1/4 px-3 pt-10">

                @include('projects.card')
            </div>
        </div>
    </main>

@endsection
