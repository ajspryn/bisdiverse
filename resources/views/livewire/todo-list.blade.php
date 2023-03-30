<div class="card">
    <div class="card-content" id="todo-list">
        <div class="card-body">
            <div class="business-items">
                @foreach ($todos as $todo)
                    <div class="d-flex align-items-center justify-content-between" wire:loading.class="opacity-50">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox{{ $todo->id }}" @if ($todo->status == 'checked') wire:click.prevent="markAsUncompleted('{{ $todo->id }}')" @else wire:click.prevent="markAsCompleted('{{ $todo->id }}')" @endif value="checked" {{ $todo->status == 'checked' ? 'checked' : ' ' }} />
                            <label class="form-check-label" for="inlineCheckbox{{ $todo->id }}">{!! $todo->status == 'checked' ? '<del>' : '' !!}{{ $todo->todo }}{!! $todo->status == 'checked' ? '<del>' : '' !!}</label>
                        </div>
                        <a wire:click.prevent="deleteTodo('{{ $todo->id }}')" style="color: red" wire:loading.remove>
                            (Delete)
                        </a>
                        <div wire:loading>
                            <i data-feather="loader" class="animate-spin"></i>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
