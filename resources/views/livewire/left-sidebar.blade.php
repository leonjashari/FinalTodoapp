<div class="flex flex-col h-full bg-gray-200">
    <div class="p-4 text-gray-700">
        <span class="font-bold">Welcome, {{ auth()->user()->name }}</span>
    </div>

    <div class="p-4 flex-grow">
        <h2 class="text-lg font-semibold mb-2">Task Groups</h2>
        <ul>
            <li class="mb-1">
                <a href="#" wire:click.prevent="selectGroup('Urgent', '0')"
                   class="text-red-500 hover:underline flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" class="w-6 h-6 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                    </svg>
                    Urgent
                </a>
            </li>

            @foreach($groups as $group)
                <li wire:click.prevent="selectGroup('{{ $group->name }}', '{{ $group->id }}')"
                    class="cursor-pointer mb-1">
                    <a href="#" class="text-black hover:text-blue-500 hover:underline flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" class="w-6 h-6 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                        </svg>
                        {{ $group->name }}
                    </a>
                </li>
            @endforeach

        </ul>
    </div>

    <div class="p-4">
        <input wire:model="newGroupName" type="text" placeholder="New Group Name" class="border p-2">
        <button wire:click="createGroup" class="bg-blue-500 text-white p-2">Create Group</button>
    </div>
</div>
