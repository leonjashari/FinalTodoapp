<div class="relative">
    <button wire:click.prevent="toggleSearch" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
        <!-- Add your search loop icon here -->
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-5.2-5.2"></path>
            <circle cx="10" cy="10" r="8"></circle>
        </svg>

    </button>

    <!-- Search Bar (Initially hidden) -->
    @if ($isOpen)
        <div class="absolute right-0 top-0 bg-white border overflow-hidden w-64">
            <input type="text" placeholder="Search..." class="p-2 w-full rounded" wire:model.live="searchTerm">
        </div>
    @endif
</div>
