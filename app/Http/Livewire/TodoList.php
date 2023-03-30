<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Bisdiboard\Entities\BoardTodo;

class TodoList extends Component
{
    protected $listeners = ['todoAdded' => 'refresh'];
    public $selectedTodos = [];
    public $taskid;
    public $newTodo;

    public function mount($taskid)
    {
        $this->taskid = $taskid;
    }

    public function refresh($todo)
    {
        // dd($todo);
    }

    public function render()
    {
        $todos = BoardTodo::where('task_id', $this->taskid)->get();
        return view('livewire.todo-list', compact('todos'));
    }

    public function deleteSelected()
    {
        BoardTodo::whereIn('id', array_keys($this->selectedTodos))->delete();
        $this->selectedTodos = [];
    }

    public function markAllAsCompleted()
    {
        BoardTodo::where('task_id', $this->taskid)->update(['status' => 'checked']);
        $this->emit('todoAdded');
    }

    public function markAsCompleted($todoId)
    {
        BoardTodo::find($todoId)->update(['status' => 'checked']);
    }

    public function markAsUncompleted($todoId)
    {
        BoardTodo::find($todoId)->update(['status' => 'unchecked']);
    }

    public function deleteTodo($todoId)
    {
        BoardTodo::find($todoId)->delete();
    }
}
