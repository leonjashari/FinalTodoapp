<?php

use App\Livewire\Actions\Logout;
use App\Livewire\LeftSidebar;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>


<div class="flex h-screen bg-gray-100 dark:bg-gray-800 font-roboto">
    <!-- Left Sidebar -->
    <div class="w-64 min-h-screen flex flex-col justify-between p-4">
        <div>
            <livewire:left-sidebar />
        </div>
    </div>

    <div class="flex flex-col flex-1 w-full">
        <livewire:header />


        <!-- Content Area -->
        <div class="flex-1 bg-gray-200 dark:bg-gray-900 overflow-hidden">


            <div class="max-h-[400px] overflow-y-auto">
                <!-- Include the TaskList Livewire component -->
                <livewire:task-list />

            </div>


        </div>
        <div class="flex flex-col items-center">
            <livewire:task-form />
        </div>
    </div>

</div>
