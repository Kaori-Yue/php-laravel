<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
     public function index()
    {
        return "Method GET: Index succes";
    }

    public function demotwo()
    {
        return "Method POST: demotwo";
    }

    public function demothree()
    {
        session(['myName'=>'Hello','test'=>'ni hao']);
        echo session('myName')."<br />";
        echo session('test')."<br />";
    }

    public function demofour()
    {
        return "Method GET, POST, PUT/PATCH, DELETE : demofour";
    }

}
