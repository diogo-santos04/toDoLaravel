<div>
    @if ($type == 'text')
        @if ($input)
            <input type="{{ $type }}" wire:model.debounce.500ms="campo" class="form-control">
        @else
            <p class="fw-bold" wire:click='habilitaInput'>{{ $campo }}</p>
        @endif
    @elseif($type == 'date')
        @if (!$input)
            @if ($this->data['prazo'] == NULL)
                <i class="fas fa-calendar-alt" wire:click='habilitaInput'></i>
                <h6 wire:click='habilitaInput'></h6>
            @else
                <p class="fw-bold" wire:click='habilitaInput'>{{ date('d/m/y', strtotime($campo)) }}</p>
            @endif
        @else
            <input type="{{ $type }}" wire:model.debounce.500ms="campo" class="form-control">
        @endif
    @endif
</div>
