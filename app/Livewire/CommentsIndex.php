<?php

namespace App\Livewire;

use App\Models\Comments;
use Livewire\Component;

class CommentsIndex extends Component
{

    public $post;
    public function mount($post)
    {
        $this->post=$post;
    }
    public function render()
    {
        $comments=Comments::where('post_id',$this->post->id)->paginate(2);
        return view('livewire.comments-index',compact('comments'));
    }
}
