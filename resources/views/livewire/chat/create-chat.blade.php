<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <ul class="list-group w-75 mx-auto mt-3 container-fluid">
        @foreach ($users as $user)
        <li class="list-group-item list-group-item-action" wire:click='checkConversation({{ $user->id }})'>{{ $user->name }}</li>
        @endforeach
    </ul>
</div>
