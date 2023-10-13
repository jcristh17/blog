<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarkAsReadNotifications extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function MarkAsRead(Request $request)
    {
        //dd($request);
        auth()->user()
        ->unreadNotifications
        ->when($request->id,function($query) use ($request)
        {
            return $query->where('id',$request->id);
        })->MarkAsRead();
        return back();
    }
}
