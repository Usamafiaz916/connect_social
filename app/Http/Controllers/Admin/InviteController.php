<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InviteController extends Controller
{
    //
    public function index(){
        return view('admin.invite');
    }
    public function send(Request $request){
        $this->validate($request,[
           'email'=>'required|string|email|max:255',
           'name'=>'required|string|max:255'
        ]);
        $message=str_replace('XXXXX',$request->name,$request->message);
        sendEmail($request->email,null,$request->subject,$message);
        return response()->json(['success'=>'Invitation sent successfully!']);
    }

}
