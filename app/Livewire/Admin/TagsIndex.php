<?php

namespace App\Livewire\Admin;

use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class TagsIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "tailwind";
    public $search = '';
    public $qtity = '5';
    public $sort = 'id';
    public $direction = 'asc';
    public function render()
    {
        $tags = Tag::where('name', 'like', '%' . $this->search . '%')
            //->OrWhere('email','like','%'.$this->search.'%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->qtity);
        return view('livewire.admin.tags-index', compact('tags'));
    }
    public function updatingSearch()
    {
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
