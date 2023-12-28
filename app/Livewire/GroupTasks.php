<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class GroupTasks extends Component
{
    public $selectedGroup;
    public $tasks;

    public function render()
    {
        // Fetch tasks based on the selected group
        // Implement the logic to retrieve tasks for the selected group
        $this->tasks = Task::where('group', $this->selectedGroup)->get();

        return view('livewire.group-tasks', ['tasks' => $this->tasks]);
    }
}
