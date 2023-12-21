<div>
    <h2 class="text-2xl font-bold mb-4">Task List</h2>

    @if (empty($tasks))
        <p>No tasks available.</p>
    @else
        <ul class="divide-y divide-gray-300">
            @foreach($tasks as $task)

                <li class="py-2">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <div>
                                <!-- Circle for Marking as Done -->
                                <input type="checkbox" wire:click="markAsDone({{ $task->id }})" class="form-checkbox h-4 w-4 text-blue-500 rounded-full">
                            </div>
                            <div class="ml-2">
                                <!-- Adjusted Title Position -->
                                <h3 class="text-lg font-semibold @if($task->selected) font-bold text-blue-500 @endif">{{ $task->title }}</h3>
                                @if($task->selected)
                                    <textarea class="mt-2 text-gray-500 border rounded-md p-2" wire:model="description" placeholder="Here Task Description"></textarea>
                                    <button wire:click="updateTask" class="text-blue-500">Update</button>
                                @endif
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">{{ $task->group }} @if($task->urgent) - <span class="text-red-500">Urgent</span> @endif</p>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button wire:click="editTask({{ $task->id }})" class="text-blue-500">Edit</button>
                            <button wire:click="deleteTask({{ $task->id }})" class="text-red-500">Delete</button>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        {{ $tasks->links() }}
    @endif

</div>
