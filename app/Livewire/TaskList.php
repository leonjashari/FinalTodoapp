<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class TaskList extends Component
{

use WithPagination;
//    public $perPage = 5; // Set the number of tasks per page
//    public $tasks; // Add a property to store tasks
    public $editingTaskId;
    public $description;
    public $selectedTaskId;



    protected $listeners = ['taskCreated' => 'refreshTaskList'];

    public function mount()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Fetch tasks for the authenticated user
            $this->tasks = Task::where('assigned_user_id', Auth::id())->get();
        } else {
            // User is not authenticated, set $tasks to an empty collection or handle it as needed
            $this->tasks = collect();
        }
        $this->selectedTaskId = null;
    }


    public function editTask($taskId)
    {
        // Implement logic to set the task as editable
        $this->editingTaskId = $taskId;
        $this->selectedTaskId = $taskId;

    }
    public function resetEditingState()
    {
        $this->editingTaskId = null;
        $this->description = '';
    }

    public function deleteTask($taskId)
    {
        // Implement logic to delete the task
        Task::find($taskId)->delete();
        $this->resetEditingState();
        $this->refreshTaskList();
    }

    public function updateTasks($groupId)
    {
        // Fetch tasks for the selected group
        $this->tasks = Task::where('group_id', $groupId)->paginate($this->perPage);

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
//            'description' => $this->updatedDescription,
            'description' => $this->description,
            'group' => $this->updatedGroup,
            'urgent' => $this->updatedUrgent,
        ]);
        $this->resetEditingState();
        $this->refreshTaskList();

//         Reset input fields and end the edit mode
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

    public function refreshTaskList()
    {
        // Fetch tasks for the authenticated user
        $this->tasks = Task::where('assigned_user_id', auth()->id())->get();
        // Reset the editing state
        $this->resetEditingState();
    }

    public function selectTask($taskId)
    {
        // Toggle selected task
        $this->selectedTaskId = ($this->selectedTaskId == $taskId) ? null : $taskId;    }

    public function render()
    {
        return view('livewire.task-list', [
            'tasks' => auth()->user()->tasks()->with('group')->paginate(5),
        ]);
    }





}
