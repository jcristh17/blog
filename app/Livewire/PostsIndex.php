<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Livewire\WithPagination;


class PostsIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search = '';
    public $recents = 'most_recent';
    public $categoryID = '';

    public function check()
    {
        dd($this->recents);
    }
    public function render()
    {
        //dd($this->recents);
        $tags = Tag::all();
        $categories = Category::all();


        if ($this->recents == 'most_recent') {
            $posts =  Post::where('name', 'like', '%' . $this->search . '%')
                ->where('status', 2)
                ->Where('category_id', 'like', '%' . $this->categoryID . '%')
                ->latest('id')
                ->paginate(9);
        } else {
            $posts =  Post::where('name', 'like', '%' . $this->search . '%')
                ->where('status', 2)
                ->where('category_id', 'like', '%' . $this->categoryID . '%')
                ->paginate(9);
        }
        return view('livewire.posts-index', compact('posts', 'categories', 'tags'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
