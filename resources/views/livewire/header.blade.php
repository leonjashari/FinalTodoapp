<div>
    <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo, Home Link, or Other Branding -->
                <div class="flex items-center">
                    <!-- Add your logo or branding here -->
                    <a href="#" wire:click.prevent="navigateTo('dashboard')" class="text-xl font-bold text-gray-800 dark:text-white">To Do</a>
                </div>
                <div class="flex items-center">
                    <!-- Add your logo or branding here -->
                    <a href="#" wire:click.prevent="navigateTo('tasks.index')" class="text-xl font-bold text-gray-800 dark:text-white">Done</a>
                </div>



                <!-- Navigation Links (if needed) -->

                <!-- Search Button -->
                <div class="flex items-center space-x-4">
                    <!-- Selected Group Name (Adjust styling as needed) -->
                    <div class="text-gray-600">
                        Group X <!-- Replace with actual selected group name -->
                    </div>

                    <!-- Livewire Search Bar Component -->
                    <livewire:search-bar />

                    <!-- Profile Settings Dropdown -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile')" wire:navigate>
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <button wire:click="logout" class="w-full text-start">
                                <x-dropdown-link>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </button>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>
    </nav>
