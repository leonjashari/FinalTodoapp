<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Task;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function showGroupPage($groupId)
    {
        // Add logic to fetch tasks or other data based on the group ID
        // For example, fetch tasks for the group with ID $groupId
        $group = Group::findOrFail($groupId);
        $tasks = Task::where('group_id', $groupId)->paginate(5); // Adjust the pagination as needed

        // Return the view with tasks for the specific group
        return view('group.page', compact('group','tasks'));
    }


}
