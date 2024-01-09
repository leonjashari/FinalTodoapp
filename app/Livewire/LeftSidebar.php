<?php

namespace App\Livewire;

use App\Models\Group;
use App\Models\Task;
use Livewire\Component;
use function Livewire\Volt\updated;

class LeftSidebar extends Component
{
    public $newGroupName;
    public $urgent;
    public $groups;
    public $selectedGroup = 'All Tasks';

    public $tasks;

    protected $listeners = ['updateTasks'];

    public function mount()
    {
        $this->groups = $this->fetchGroups();
    }

    public function render()
    {
        return view('livewire.left-sidebar');
    }

    public function createGroup()
    {
        // Add logic to create a new group in the database
        Group::create(['name' => $this->newGroupName]);

        // Clear the input field
        $this->reset('newGroupName', 'urgent');

        // Fetch the updated list of groups
        $this->groups = $this->fetchGroups();
    }

    protected function fetchGroups()
    {
        // Fetch groups dynamically from the database
        $groups = Group::all();

        // Check if $groups is null or empty before returning
        if (!$groups || $groups->isEmpty()) {
            $groups = collect(); // Initialize an empty collection if $groups is null
        }

        return $groups;
    }

    public function selectGroup($groupName, $groupId)
    {
        $this->selectedGroup = $groupName;

        // Emit an event to update the main content with tasks for the selected group
        $this->dispatch('groupSelected', $groupId, $groupName);
    }


}
