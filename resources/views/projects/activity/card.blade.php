<div class="bg-white py-6 px-10 rounded-lg shadow-md mt-6">
    <ul class="lg:text-xs font-normal">
        @forelse($project->activity as $activity)
            <li class="{{ $loop->last ? '' : 'mb-1' }}">

                @include('projects.activity.'.$activity->description)
                <span class="text-gray-600">{{ $activity->created_at->diffForHumans() }}</span>

            </li>
        @empty
            <li>No activity done yet.</li>
        @endforelse
    </ul>
</div>
