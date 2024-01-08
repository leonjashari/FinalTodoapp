<div>
    <h2 class="text-2xl font-bold mb-4">Task List</h2>

    @if ($tasks->isEmpty())
        <p>No tasks available.</p>
    @else
        {{-- Uncomment the line below for debugging --}}
        {{-- <pre>{{ dd($tasks) }}</pre> --}}
        <ul class="divide-y divide-gray-300">
            @foreach($tasks as $task)
                <li class="py-4 relative
        @if($editingTaskId == $task->id) border border-blue-300 @endif
        @if($selectedTaskId == $task->id) border border-blue-500 @endif"
                    wire:click="selectTask({{ $task->id }})"
                >

                    <!-- Task content -->
                    <div class="flex items-center justify-between space-x-4">
                        <div class="flex space-x-2 items-center">
                            <div>
                                <!-- Circle for Marking as Done -->
                                <input type="checkbox" wire:click="markAsDone({{ $task->id }})" class="form-checkbox h-4 w-4 text-blue-500 rounded-full">
                            </div>
                            <!-- Task title -->
                            <h3 class="text-lg font-semibold @if($editingTaskId == $task->id) font-bold text-blue-500 @endif">{{ $task->title }}</h3>

                            <!-- Task group -->
                            <div class="bg-gray-200 p-2 rounded-md">
                                <p class="text-sm text-gray-500">{{ is_string($task->group) ? $task->group : ($task->group ? $task->group->name : 'No Group') }}</p>
                                @if($task->urgent)
                                    <span class="text-sm text-red-500 bg-red-200 px-2 rounded-md">Urgent</span>
                                @endif
                            </div>
                        </div>

                        <!-- Edit and delete buttons -->
                        <div class="flex space-x-2">
                            <button wire:click="editTask({{ $task->id }})" class="text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM17.6 6.6a7 7 0 10-9.2 10.6L3 21l2.4-6.4a7 7 0 006.4-2.4L21 3l-2.4 2.4a7 7 0 00-1.6 1.6z" />
                                </svg>
                            </button>
                            <button wire:click="deleteTask({{ $task->id }})" class="text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h6"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif

</div>
