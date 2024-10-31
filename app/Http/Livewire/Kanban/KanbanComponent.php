<?php

namespace App\Http\Livewire\Kanban;

use Livewire\Component;
use App\Models\Kanban\Kanban;
class KanbanComponent extends Component
{
    public $data = [];

    public $atividade = 'Nova Atividade';
    public $membros = 'Membro';
    public $prioridade = 'Baixa';
    public $situacao = 'Pendente';
    public $prazo = NULL;
    public $nota = 'Nota';

    protected $listeners = ['adicionar','destroy','edit'];

    public function render()
    {
        return view('livewire.kanban.kanban-component',);
    }

    public function adicionar()
    {
        $this->validate([
            'membros' => 'required',
        ]);

        $this->data['atividade'] = $this->atividade;
        $this->data['membros'] = $this->membros;
        $this->data['prioridade'] = $this->prioridade;
        $this->data['situacao'] = $this->situacao;
        $this->data['prazo'] = $this->prazo;
        $this->data['nota'] = $this->nota;

        try {
            Kanban::create($this->data);
            session()->flash('message', 'Criado com sucesso!!');
            $this->emit('refreshCrudTable');
        } catch (\Exception $ex) {
            dd($ex);
            session()->flash('message', 'Algo deu errado!!');
        }
    }

    public function delete()
    {
        try{
            $destroy = Kanban::find($this->data['id']);
            $destroy ? $destroy->delete() : false;
            session()->flash('message',"Deletado com sucesso!!");
            $this->emit('refreshCrudTable');
        }catch(\Exception $e){
            session()->flash('message',"Algo deu errado!!");
        }
    }

    public function update()
    {
        // dd($this->data);
        $this->validate([
            'data.title' => 'required',
        ]);
        try {
            $this->model::find($this->data['id'])->update($this->data);
            session()->flash('message','Atualizado com sucesso!!');
            $this->resetFields();
        } catch (\Exception $ex) {
            session()->flash('message','Algo deu errado!!');
        }
    }

    public function destroy($data)
    {
        $this->data = $data;
        $this->delete();
    }

    public function edit($data)
    {
        $this->data = $data;
        $this->update();
    }

    private function resetFields(){
        $this->resetErrorBag();
        $this->resetValidation();
        $this->data = [];
    }
}
