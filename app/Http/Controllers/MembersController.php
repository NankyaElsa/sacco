<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MembersController extends Controller
{
    //check if user is logged in
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $arr['members'] = Member::all();
        return view('admin.members.index')-> with ($arr);
    }
} 

