<div>
    <h2 class="text-2xl font-bold mb-4">Tasks for {{ $selectedGroup }}</h2>

    @if ($tasks->isEmpty())
        <p>No tasks available for this group.</p>
    @else
        <!-- Display tasks for the selected group -->
        <ul>
            @foreach($tasks as $task)
                <li>{{ $task->title }}</li>
            @endforeach
        </ul>
    @endif
</div>
