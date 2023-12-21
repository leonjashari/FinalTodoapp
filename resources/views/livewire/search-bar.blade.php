<div>
    <button wire:click="toggleSearch" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
        <!-- Add your search loop icon here -->
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-5.2-5.2"></path>
            <circle cx="10" cy="10" r="8"></circle>
        </svg>

    </button>

    <!-- Search Bar (Initially hidden) -->
    @if ($isOpen)
        <div class="absolute right-8 mt-2 bg-white border dark:border-gray-800 rounded-md overflow-hidden">
            <input type="text" placeholder="Search..." class="p-2 w-10 focus:outline-none" wire:model="searchTerm">
        </div>
    @endif
</div>
