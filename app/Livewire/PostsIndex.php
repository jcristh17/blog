<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class PostsIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "tailwind";
    public $search = '';
    public $categoryID = '';
    public $order = 'desc';
 

    public function render()
    {
        //dd($this->recents);
        //$this->categories  = Category::all()->pluck('name');
        $categories = Category::all();

            $posts =  Post::where('name', 'like', '%' . $this->search . '%')
                ->where('status', 2)
                ->Where('category_id', 'like', '%' . $this->categoryID . '%')
                ->orderBy('id',$this->order)
                ->paginate(9);

        return view('livewire.posts-index', compact('posts', 'categories'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
