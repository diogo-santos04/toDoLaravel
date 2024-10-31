<?php

namespace App\Http\Livewire\Kanban;

use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class KanbanTableComponent extends TableComponent
{
    public $model;
    public $cor = 'primary';
    public $table_class = 'table-hover table-striped';
    public $membros = 'Membro X';
    public $data = [];
    public $checkbox = false;
    protected $paginationTheme = 'bootstrap';
    public $header_view = 'livewire.kanban.table.header';

    protected $listeners = [
        'refreshCrudTable' => '$refresh',
        'dadosPadroes',
    ];

    public function mount()
    {
        // $this->data = $this->model::all();
        // dd($this->data);
    }

    public function query()
    {
        return $this->model::query();
    }


    public function columns()
    {
        if (method_exists($this->model, 'columns')) {
            return (new $this->model)->columns();
        } else {
            return [
                Column::make('ID')->searchable()->sortable(),
            ];
        }
    }

    public function prioridade($cor)
    {
        $this->cor = $cor;
    }

    public function membros($membro)
    {
        $this->membros = $membro;
    }
}
