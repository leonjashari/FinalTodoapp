<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;


class TaskList extends Component
{

    public $tasks; // Add a property to store tasks
    public $editingTaskId;
    public $description;
    public $selectedTaskId;

    public $editingTitle = '';




    protected $listeners = ['taskCreated' => 'refreshTaskList'];

    public function mount()
    {
        $this->tasks = auth()->user()->tasks()->with('group')->get(); // Fetch tasks with relationship
        $this->selectedTaskId = null;
    }


    public function editTask($taskId)
    {
        $this->editingTaskId = $taskId;
        $task = Task::find($taskId); // Fetch the task
        $this->editingTitle = $task->title; // Set the initial editing title
    }

    public function updateTaskTitle($taskId)
    {
        $task = Task::find($taskId);
        $task->update(['title' => $this->editingTitle]);
        $this->editingTaskId = null; // Exit editing mode
        $this->editingTitle = ''; // Reset the title
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
            'tasks' => $this->tasks, // Pass the already fetched tasks
        ]);
    }





}
