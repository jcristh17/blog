<?php

namespace App\Livewire\Admin;
use Livewire\WithPagination;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionsIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search='';
    public $qtity='10';
 
    public $sort = 'id';
    public $direction = 'asc';
    public function render()
    {
        
        $permissions=Permission::where('name','like','%'.$this->search.'%')
        ->OrWhere('description','like','%'.$this->search.'%')
        ->orderBy($this->sort, $this->direction)
        ->paginate($this->qtity);
        return view('livewire.admin.permissions-index',compact('permissions'));
    }
    public function updatingSearch(){
        $this->resetPage();
    }
    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'asc') {
                $this->direction = 'desc';
            } else {
                $this->direction = 'asc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'desc';
        }
    }
}
