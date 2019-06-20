@extends('layouts.app')

@section('content')

    <header class="flex items-center mb-3 py-4">

        <div class="flex justify-between items-end w-full">

            <h2 class="text-gray-500">My Projects</h2>

            <a href="/projects/create" class="bg-teal-500 hover:bg-teal-700 text-white py-2 px-4 rounded-full">New Project</a>

        </div>

    </header>

    <main class="lg:flex lg:flex-wrap -mx-3">

        @forelse ($projects as $project)

            <div class="lg:w-1/3 px-3 pb-6">

                @include('projects.card')

            </div>

        @empty

            <div>

                <div>No Projects yet.</div>

            </div>

        @endforelse

    </main>

@endsection
