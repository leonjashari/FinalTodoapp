<div class="flex items-center space-x-4">
    <form wire:submit.prevent="createTask" class="flex space-x-14">
        <div class="flex items-center">
            <label for="title" class="mr-2"></label>
            <input wire:model="title" type="text" id="title" placeholder="Task Title" class="border p-2">
        </div>

        <div class="flex items-center">
            <label for="group" class="mr-2"></label>
            <select wire:model="group" id="group" class="border p-2" @if($urgentChecked) disabled @endif>
                <option value="" disabled selected>Select Group</option>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center">
            <label for="urgent" class="mr-2"></label>
            <div x-data="{ urgentChecked: @entangle('urgentChecked') }">
                <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                    <input type="checkbox" id="urgent" wire:model="urgent" x-model="urgentChecked"
                           class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                    <label for="urgent" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                </div>
                <span x-text="urgentChecked ? 'Urgent' : 'Not Urgent'" class="text-sm"></span>
            </div>
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-black p-2">
                Create Task
            </button>
{{--            <button wire:click="resetForm" class="text-red-500 p-2 ml-2">--}}
{{--                Reset Form--}}
{{--            </button>--}}
        </div>
    </form>
</div>

{{--<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js" defer></script>--}}
