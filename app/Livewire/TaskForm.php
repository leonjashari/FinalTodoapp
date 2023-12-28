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
    public $groupId;

    public function mount()
    {
        // Fetch groups as objects from the Group model
        $this->groups = Group::all();
    }

    // method to create a task
    public function createTask()
    {
        // Validate form fields (you can add more validation rules)
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'group' => 'required|string',
            'urgent' => 'boolean',
        ]);
        // Debugging: Add the following line to log the submitted data
        logger('Submitted Data:', [
            'title' => $this->title,
            'description' => $this->description,
            'group' => $this->group,
            'urgent' => $this->urgent,
        ]);

        // Get the group id based on the selected group name
        $group = Group::where('name', 'like', '%' . trim($this->group) . '%')->first();
        // Debugging: Add the following lines to log information
        logger("Selected Group: {$this->group}");
        logger("Retrieved Group ID: " . ($group ? $group->id : 'Not Found'));

        // Create a new task
        auth()->user()->tasks()->create([
            'title' => $this->title,
            'description' => $this->description,
            'group' => $this->group,
//            'group_id' => $this->group, // Set the group_id
            'group_id' => $group ? $group->id : null,
            'urgent' => $this->urgent,
            'status' => 'Todo',
        ]);
//        // Debugging: Add the following line to log the created task
//        logger('Task created:', [
//            'title' => $this->title,
//            'group_id' => $group ? $group->id : null,
//        ]);

        // Clear form fields after creating the task
        $this->title = '';
        $this->description = '';
        $this->group = '';
        $this->urgent = false;
        $this->urgentChecked = false;


        if ($this->urgentChecked) {
            // If urgent, set the group to 'Urgent' or any other identifier you prefer
            $this->group = 'Urgent';
        }


//        // Dispatch a browser event to update tasks in the main content
        $this->dispatch('refreshComponent'); // Notify other components
        $this->dispatch('taskCreated');


        // Flash a success message
        session()->flash('message', 'Task created successfully!');
    }

    public $urgentChecked = false;

    public function resetForm()
    {
        // Reset form fields
        $this->reset('title', 'description', 'group', 'urgent', 'urgentChecked');
    }


    public function render()
    {
        return view('livewire.task-form');
    }
}
