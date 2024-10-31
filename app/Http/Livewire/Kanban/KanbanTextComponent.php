<?php

namespace App\Http\Livewire\Kanban;

use Livewire\Component;

class KanbanTextComponent extends Component
{
    public $type, $model, $field,$campo;

    public $input = false;

    public $data = [];

    protected $listeners = ['save'];

    public function mount($type, $model,$field,$data)
    {
        // dd($type, $model,$field,$data);
        $this->type = $type;
        $this->model = $model;
        $this->field = $field;
        $this->data = $data;
        $this->campo = $data[$this->field];
    }
    public function render()
    {
        return view('livewire.kanban.kanban-text-component');
    }

    public function updatedCampo($data)
    {
        // dd($data);
        if ($this->campo) {
            $data = app($this->model)::where('id', $this->data['id'])->update([$this->field => $this->campo]);
            $this->emit('refreshCrudTable');
        }
    }

    public function habilitaInput()
    {
        $this->input = true;
    }

}
