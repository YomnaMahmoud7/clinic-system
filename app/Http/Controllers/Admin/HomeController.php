<?php

namespace App\Http\Controllers\Admin;
use App\Model\Advice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advices =Advice::latest()->paginate(5);
        return view('admin.home.home',compact($advices));
    }
}
