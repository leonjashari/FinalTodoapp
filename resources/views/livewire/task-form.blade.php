<div class="flex items-center space-x-4">
    <form wire:submit.prevent="createTask" class="flex space-x-14">

        <div class="flex items-center">
            <label for="title" class="mr-2"></label>
            <input wire:model="title" type="text" id="title" placeholder="Task Title" class="border p-2">
        </div>

        <div class="flex items-center">
            <label for="group" class="mr-2"></label>
            <select wire:model="group" id="group" class="border p-2" @if($urgentChecked) disabled @endif>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center">
            <label for="urgent" class="mr-2"></label>
            <input wire:model="urgent" type="checkbox" id="urgent" class="border p-2">
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-black p-2">Create Task</button>
        </div>
    </form>
</div>
