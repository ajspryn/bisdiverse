<div>
    <form wire:submit.prevent="store">
        @csrf
        <div class="input-group">
            <input type="text" wire:model='todo' class="form-control message" name="todo" placeholder="Add Your Todo" required autofocus />
            <button type="submit" class="btn btn-outline-primary"><i data-feather="send" class="cursor-pointer text-secondary"></i></button>
        </div>
    </form>
</div>
{{-- <button class="btn btn-primary me-1 mb-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i data-feather="check-square" class="me-50"></i>
    Add Todo
</button>
<div class="collapse mb-1" id="collapseExample">
    <form wire:submit.prevent="store">
        @csrf
        <div class="input-group">
            <input type="text" wire:model='todo' class="form-control message" name="todo" placeholder="Add Your Todo" required autofocus />
            <button type="submit" class="btn btn-outline-primary"><i data-feather="send" class="cursor-pointer text-secondary"></i></button>
        </div>
    </form>
</div> --}}
