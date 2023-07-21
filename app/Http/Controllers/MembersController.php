<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use PhpParser\Node\Stmt\TryCatch;

class MembersController extends Controller
{
    //check if user is logged in
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

    }

    public function add_members()
    {
        return view('add_members');
    }
    public function store_members(Request $request)
    {
      $validatedData = $request->validate([
        'member_number' => 'required|string|max:255',
        'username' => 'required|string|max:255',
        'password' => 'required|string|min:6',
        'phone_number' => 'required|int|max:15', 
       ]);  
       //create a new member record in the database
       try {
            Member::create($validatedData);
            return redirect()->back()->with('sucess', 'member added successfully');
       }
       catch(\Exception $e){
        return redirect()->back()->with('Error','An error occured while adding member');
       }
    }
} 

