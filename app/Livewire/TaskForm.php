<?php

namespace App\Livewire;

use App\Models\Group;
use App\Models\Task;
use Livewire\Component;

class TaskForm extends Component
{
    public $title;
    public $description;
    public $group;
    public $urgent;
    public $groups;

    // Fetch groups from the database or any other source
    public function mount()
    {
        // Fetch groups as objects from the Group model
        $this->groups = Group::all();
    }

    // Add the method to create a task
    public function createTask()
    {
        // Validate form fields (you can add more validation rules)
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'group' => 'required|string',
            'urgent' => 'boolean',
        ]);

        // Get the group id based on the selected group name
        $groupId = Group::where('name', $this->group)->value('id');


        // Create a new task
        Task::create([
            'title' => $this->title,
            'description' => $this->description,
            'group' => $this->group,
            'group_id' => $groupId, // Set the group_id
            'urgent' => $this->urgent,
            'status' => 'Todo',
        ]);

        // Clear form fields after creating the task
        $this->title = '';
        $this->description = '';
        $this->group = '';
        $this->urgent = false;


        if ($this->urgentChecked) {
            // If urgent, set the group to 'Urgent' or any other identifier you prefer
            $this->group = 'Urgent';
        }

        // Dispatch a browser event to update tasks in the main content
        $this->dispatch('refreshComponent');

        // Flash a success message
        session()->flash('message', 'Task created successfully!');
    }

    public $urgentChecked = false;


    public function render()
    {
        return view('livewire.task-form');
    }
}
