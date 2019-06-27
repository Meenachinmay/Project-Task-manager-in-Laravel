 <div class="bg-white p-5 rounded-lg hover:shadow-lg" style="height: 200px">

    <h3 class="text-xl font-semibold py-4 -ml-5 mb-3 border-l-4 border-teal-300 pl-4">
        <a href="{{ $project->path() }}"> {{ $project->title }} </a>
    </h3>

    <div class="text-gray-500 mb-4">{{ str_limit($project->description, 50) }}</div>

     <footer>

         <form action="{{ $project->path() }}" method="POST" class="text-right">

             @csrf
             @method('DELETE')

             <button type="submit" class="text-xs font-bold hover:shadow-md rounded">Delete it</button>

         </form>

     </footer>
</div>
