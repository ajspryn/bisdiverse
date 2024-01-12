<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Bisdiboard\Entities\BoardTodo;

class FormTodo extends Component
{
    // protected $listeners = ['todoAdded' => 'refresh'];
    public $todo;
    public $taskid;

    public function mount($taskid)
    {
        $this->taskid = $taskid;
    }

    public function render()
    {
        return view('livewire.form-todo');
    }

    public function store()
    {
        $todo = BoardTodo::create([
            'todo' => $this->todo,
            'task_id' => $this->taskid,
        ]);
        $this->resetForm();
        $this->emit('todoAdded', $todo);
    }

    private function resetForm()
    {
        $this->todo = null;
    }

    // public function refresh($todo)
    // {
    //     $this->resetForm();
    // }
}
