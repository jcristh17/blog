<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "tailwind";
    public $search='';
    public $qtity='10';
    public $sort = 'id';
    public $direction = 'asc';
    public function render()
    {
        
        $users=User::where('name','like','%'.$this->search.'%')
        ->OrWhere('email','like','%'.$this->search.'%')
        ->orderBy($this->sort, $this->direction)
        ->paginate($this->qtity);
        return view('livewire.admin.users-index',compact('users'));
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
