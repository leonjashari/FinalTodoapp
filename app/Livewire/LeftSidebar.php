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
    public $selectedGroup;

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
        $this->newGroupName = '';

        // Fetch the updated list of groups
        $this->groups = $this->fetchGroups();
    }
    public function selectGroup($groupId)
    {
        $this->selectedGroup = $groupId;

        // Dispatch a browser event to update tasks in the main content
        $this->dispatch('updateTasks', ['groupId' => $groupId]);
    }
    protected function fetchGroups()
    {
        // Fetch groups dynamically from the database
        return Group::all(); // Assuming you have a Group model with "id" and "name" columns
    }

}
