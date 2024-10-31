@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<button  class="btn btn-primary" wire:click="$emit('adicionar')" ><i class="fas fa-plus-circle"></i> ADICIONAR ATIVIDADE</button>
