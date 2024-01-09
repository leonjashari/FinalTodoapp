<div class="flex flex-col h-full">
    <div class="p-4">
        Welcome, {{ auth()->user()->name }}
    </div>



    <div class="p-4 flex-grow">
        <h2 class="text-lg font-semibold mb-2">Task Groups</h2>
        <ul class="list-disc pl-5">
            <li class="mb-1">
                <a href="#" wire:click.prevent="selectGroup('Urgent', '0')">Urgent</a>


            @foreach($groups as $group)
                <li wire:click.prevent="selectGroup('{{ $group->name }}', '{{ $group->id }}')" class="cursor-pointer">
                    {{ $group->name }}
                </li>
                @endforeach


        </ul>
    </div>

    <div class="p-4">
        <input wire:model="newGroupName" type="text" placeholder="New Group Name" class="border p-2">
        <button wire:click="createGroup" class="bg-blue-500 text-black p-2">Create Group</button>
    </div>
</div>

