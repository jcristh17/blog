<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class SearchBox extends Component
{
    public $showdiv = true;
     public $search = "";
     public $records;
     public $posts;

     // Fetch records
     public function searchResult(){

         if(!empty($this->search)){

             $this->records = Post::where('name','like','%'.$this->search.'%')->limit(8);
         }else{
            $this->records = Post::where('status','2')->latest('id')->limit(8);
         }
     }

     // Fetch record by ID
     public function fetchEmployeeDetail($id = 0){

         $record = Post::select('*')
                     ->where('id',$id)
                     ->first();

         $this->search = $record->name;
         $this->posts = $record;
         $this->showdiv = false;
     }
    public function render()
    {
        $this->records = Post::where('status','2')->latest('id')->limit(8);
        return view('livewire.search-box');
    }
}
