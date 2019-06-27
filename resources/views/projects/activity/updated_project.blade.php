@if (count($activity->changes['after']) == 1)

    <span class="font-bold">{{ $activity->user->name }}</span> updated the {{ key($activity->changes['after']) }} of the project.

@else

    <span class="font-bold">{{ $activity->user->name }}</span> updated the project.

@endif
