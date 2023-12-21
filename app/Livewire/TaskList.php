<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskList extends Component
{

    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];
    public $perPage = 5; // Set the number of tasks per page
    public $editingTaskId;

    public $tasks; // Add a property to store tasks


    public function render()
    {
        // Fetch tasks from the database or any other source
        $tasks = Task::paginate($this->perPage);

        return view('livewire.task-list', compact('tasks')); // Pass only the items to Livewire
    }

    public function editTask($taskId)
    {
        // Implement logic to set the task as editable
        $this->editingTaskId = $taskId;
    }

    public function deleteTask($taskId)
    {
        // Implement logic to delete the task
        Task::find($taskId)->delete();

        // Refresh the task list after deletion
        $this->render();
    }

    public function updateTasks($groupId)
    {
        // Fetch tasks for the selected group
        $this->tasks = Task::where('group_id', $groupId)->get();

        // Dispatch a browser event to update the component state with the new tasks
        $this->dispatch('tasksUpdated', ['tasks' => $this->tasks->toArray()]);
    }

    public function updateTask($taskId)
    {
        // Implement logic to update the task
        $task = Task::find($taskId);

        // Update the task properties as needed
        $task->update([
            'title' => $this->updatedTitle,
            'description' => $this->updatedDescription,
            'group' => $this->updatedGroup,
            'urgent' => $this->updatedUrgent,
        ]);

        // Reset input fields and end the edit mode
        $this->resetEditFields();
    }


    private function resetEditFields()
    {
        $this->editingTaskId = null;
        $this->updatedTitle = '';
        $this->updatedDescription = '';
        $this->updatedGroup = '';
        $this->updatedUrgent = false;
    }
}
