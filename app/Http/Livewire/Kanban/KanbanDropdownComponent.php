<?php

namespace App\Http\Livewire\Kanban;

use Livewire\Component;

class KanbanDropdownComponent extends Component
{
    public $model, $campo,$field,$tipo,$cor;
    public $data = [];

    public function mount($model,$data,$field, $cor)
    {
        $this->model = $model;
        $this->data = $data;
        $this->field = $field;
        $this->campo = $data[$this->field];
        $this->cor = $cor;
        // dd($model, $data,$field, $this->campo);
    }
    public function render()
    {
        return view('livewire.kanban.kanban-dropdown-component');
    }

    public function updatedCampo($data)
    {
        if ($this->campo) {
            $data = app($this->model)::where('id', $this->data['id'])->update([$this->field => $this->campo]);
            $this->emit('refreshCrudTable');
        }   
    }

    public function campo($value)
    {   
        $this->campo = $value;
        $this->updatedCampo($value);    
    }

    public function prioridade($data, $cor)
    {
        $this->cor = $cor;
        $this->campo = $data;
        $this->updatedCampo($data);
        $this->updateCor($cor);
    }

    protected function updateCor($cor)
    {
        app($this->model)::where('id', $this->data['id'])->update(['cor' => $cor]);
    }

    public function situacao($data)
    {
        // dd($data);
        $this->campo = $data;
        $this->updatedCampo($data);
    }

    public function nota($data)
    {
        // dd($data);
        $this->campo = $data;
        $this->updatedCampo($data);
    }
}
