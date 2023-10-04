<?php

namespace App\Livewire;

use App\Models\Comments;
use Livewire\Component;

class CommentsIndex extends Component
{

    public $post;
    public $Comment;
    public $pagination=2;
    public $count;
    protected $rules = [
        'Comment' => 'required',
    ];
    public function mount($post)
    {
        $this->post=$post;
        //$this->count=$post->comments->count();
    }
    public function render()
    {
        $comments=Comments::where('post_id',$this->post->id)->latest('id')->paginate($this->pagination);
        return view('livewire.comments-index',compact('comments'));
    }

    public function save(){
        $this->validate();
        Comments::create([
            'post_id' => $this->post->id,
            'user_id' => auth()->user()->id,
            'body'=>$this->Comment
        ]);
        $this->reset(['Comment']);
        $this->dispatch('render')->to(CommentsIndex::class);
    }
    public function incrementar()
    {
        $this->pagination=$this->pagination+2;
    }
    public function decrementar()
    {
        $this->pagination=$this->pagination-2;
    }
    public function deletecomment(Comments $comment){
        $comment->delete();
        $this->dispatch('render')->to(CommentsIndex::class);
    }
}
