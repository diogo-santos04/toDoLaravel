<div class="btn-group dropend">
    @if ($tipo == 'membros')
        <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user"></i> {{ $campo }}
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" value ="Membro A" wire:click="campo('Membro A')">Membro A</a></li>
            <li><a class="dropdown-item" value ="Membro A" wire:click="campo('Membro B')">Membro B</a></li>
            <li><a class="dropdown-item" value ="Membro A" wire:click="campo('Membro C')">Membro C</a></li>
        </ul>
    @elseif($tipo == 'prioridade')
        <button type="button" class="btn btn-{{ $cor }} dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fas fa-list-ol"></i> {{ $campo }}
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" wire:click="prioridade('Alta', 'danger')">Alta</a></li>
            <li><a class="dropdown-item" wire:click="prioridade('Media', 'warning')">Media</a></li>
            <li><a class="dropdown-item" wire:click="prioridade('Baixa', 'success')">Baixa</a></li>
        </ul>
    @elseif($tipo == 'situacao')
        <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            @if ($campo == 'Pendente')
                <i class="fas fa-exclamation-circle"></i> {{ $campo }}
            @else
                <i class="fas fa-check-circle"></i> {{ $campo }}
            @endif
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" wire:click="situacao('Pendente')">Pendente</a></li>
            <li><a class="dropdown-item" wire:click="situacao('Pronto')">Pronto</a></li>
        </ul>
    @elseif($tipo == 'nota')
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-sticky-note"></i> Nota
        </button>
        <ul class="dropdown-menu">
            <li>
                <textarea class="form-control" rows="3" wire:keydown.enter="nota($event.target.value)">{{ $campo }}</textarea>
            </li>
        </ul>
    @endif
</div>
