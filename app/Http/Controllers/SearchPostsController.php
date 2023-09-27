<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchPostsController extends Controller
{
    public function posts(Request $request)
    {
         $term = $request->get('term');
         $querys= Post::where('status','2')->where('name','like','%'.$term.'%')->get();

        $data=[];
        foreach($querys as $query)
        {
            $data[]=
            [
                'label'=>$query->name
            ];
        } 
        return $data;
        
        /* if($request->get('query'))
        {
            $query = $request->get('query');
            $data = Post::
                where('name', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul >';
            foreach($data as $row)
            {
                $output .= '
                <li><a  href="#">'.$row->name.'</a></li>
                ';
            }
            $output .= '</ul>';
            return $output;
        } */
       // return $term;
        
    }
}
