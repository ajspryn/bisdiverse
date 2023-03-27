<div>
    @foreach ($todos as $todo)
        <div class="form-check form-check-inline mb-1">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox{{ $todo->id }}" wire:click.prevent="markAsCompleted('{{ $todo->id }}')" value="checked" {{ $todo->status == 'checked' ? 'checked' : '' }} />
            <label class="form-check-label" for="inlineCheckbox{{ $todo->id }}">{!! $todo->status == 'checked' ? '<del>' : '' !!}{{ $todo->todo }}{!! $todo->status == 'checked' ? '<del>' : '' !!}</label>
        </div>
    @endforeach

    {{-- @if ($todos->count())
        <button class="btn btn-danger" wire:click.prevent="deleteSelected">Delete Selected</button>
        <button class="btn btn-primary" wire:click.prevent="markAllAsCompleted">Mark All as Completed</button>
    @endif --}}
</div>

{{-- <div class="collapse mb-1" id="collapseExample">
    <form wire:submit.prevent="addTodo">
        <div class="input-group">
            <input type="text" class="form-control message" wire:model.defer="newTodo" placeholder="Add Your Todo" required autofocus />
            <button type="submit" class="btn btn-outline-primary"><i data-feather="send" class="cursor-pointer text-secondary"></i></button>
        </div>
    </form>
</div>
<div class="card">
    <div class="card-content" id="todo-list" wire:poll.1000ms>
        <div class="card-body">
            @foreach ($todos as $todo)
                <div class="form-check form-check-inline mb-1">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox{{ $todo->id }}" wire:model="selectedTodos.{{ $todo->id }}" value="checked" {{ $todo->status == 'checked' ? 'checked' : '' }} />
                    <label class="form-check-label" for="inlineCheckbox{{ $todo->id }}">{{ $todo->todo }}</label>
                    <a href="#" class="text-danger ml-2" wire:click.prevent="markAsCompleted('{{ $todo->id }}')"><i class="fas fa-check"></i></a>
                </div>
            @endforeach

            @if ($todos->count())
                <button class="btn btn-danger" wire:click.prevent="deleteSelected">Delete Selected</button>
                <button class="btn btn-primary" wire:click.prevent="markAllAsCompleted">Mark All as Completed</button>
            @endif
        </div>
    </div>
</div> --}}
