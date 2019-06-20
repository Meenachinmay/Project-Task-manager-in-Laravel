@extends('layouts.app')

@section('content')

    <h1 class="text-3xl">Create Project</h1>

    <form method="POST" action="/projects">
        @csrf
        <div class="form-group">

            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp" placeholder="Title">

        </div>
        <div class="form-group">

            <label for="exampleInputPassword1">Description</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="description" placeholder="Description">

        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create
        </button>
        <a href="/projects">Cancel</a>
    </form>

@endsection
