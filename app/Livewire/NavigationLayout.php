<?php

namespace App\Livewire;

use Livewire\Component;

class NavigationLayout extends Component
{

    protected $listeners = ['editTask' => 'handleEditTask', 'tasksUpdated' => 'updateTasks'];

    public $tasks; // Add a property to store tasks

    public function handleEditTask($taskId)
    {
        // Implement logic to handle the edit task event
        // This method will be called when the 'editTask' event is emitted from the child component
    }

    public function updateTasks($tasks)
    {
        // Update the main content tasks with the new tasks
        $this->tasks = $tasks;
    }
//    public function updateTasks($groupId)
//    {
//
//        // Implement logic to update tasks based on the selected group
//        // You may fetch tasks for the group and pass them to the Livewire component responsible for displaying tasks.
//        // This is where you should update the main content with the tasks of the selected group without refreshing the page.
//    }
    public function render()
    {
        return view('livewire.layout.navigation');
    }
}
