<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController 
{ 
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        // echo 'hii';die;
        return view('admin.layouts.dashboard');
     
        // return view('admin.welcome'); // Pass the tree to the view
    }
    
}
