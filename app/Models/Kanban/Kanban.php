<?php

namespace App\Models\Kanban;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kdion4891\LaravelLivewireTables\Column;


class Kanban extends Model
{
    use HasFactory;
    protected $table = 'kanban.kanbans';

    protected $fillable = ['atividade', 'membros', 'prioridade', 'situacao', 'prazo', 'nota','cor'];

    public $rules = [
        'atividade' => 'required',
        'membros' => 'required',
        'prioridade' => 'required',
        'situacao' => 'required',
        'prazo' => 'required',
        'nota' => 'required',
    ];

    public function columns()
    {
        return [
            Column::make('ID')->searchable()->sortable(),
            Column::make('Atividade')->view('livewire.kanban.kanban-views.kanban-view-text'),
            Column::make('Membros', 'membros')->view('livewire.kanban.kanban-views.kanban-view-dropdown'),
            Column::make('Proridade', 'prioridade')->view('livewire.kanban.kanban-views.prioridade-view'),
            Column::make('Situacao','situacao')->view('livewire.kanban.kanban-views.situacao-view'),
            Column::make('Prazo','prazo')->view('livewire.kanban.kanban-views.kanban-view-date'),
            Column::make('Nota','nota')->view('livewire.kanban.kanban-views.nota-view'),
            Column::make('Açoes')->view('livewire.kanban.table.table-actions'),
        ];
    }
}
