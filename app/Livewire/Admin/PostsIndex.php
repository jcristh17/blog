<?php

namespace App\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search='';
    public $qtity='10';
 
    public $sort = 'id';
    public $direction = 'asc';
    public function render()
    {
        
        $posts=Post::where('user_id',auth()->user()->id)
        ->where('name','like','%'.$this->search.'%')
        ->orderBy($this->sort, $this->direction)
        ->paginate($this->qtity);
        return view('livewire.admin.posts-index',compact('posts'));
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
