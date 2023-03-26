<div>
    <form wire:submit.prevent="store">
        @csrf
        <div class="input-group">
            <input type="text" wire:model='todo' class="form-control message" name="todo" placeholder="Add Your Todo" required autofocus />
            <button type="submit" class="btn btn-outline-primary"><i data-feather="send" class="cursor-pointer text-secondary"></i></button>
        </div>
    </form>
    {{-- {{ $taskid }} --}}
</div>
