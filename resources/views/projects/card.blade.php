 <div class="bg-white p-5 rounded-lg shadow-md" style="height: 200px">

    <h3 class="text-xl font-semibold py-4 -ml-5 mb-3 border-l-4 border-teal-300 pl-4">
        <a href="{{ $project->path() }}"> {{ $project->title }} </a>
    </h3>

    <div class="text-gray-500">{{ str_limit($project->description, 50) }}</div>

</div>
