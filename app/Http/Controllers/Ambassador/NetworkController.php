<?php

namespace App\Http\Controllers\Ambassador;

use App\Http\Controllers\Controller;
use App\Models\Connection;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;

class NetworkController extends Controller
{
    public function index($type,$id=null){
        if ($id){ $user=User::find($id); }else{ $id=auth()->user()->id; $user=User::find($id); }


        $repeated_html='<div class="friend-grid-col-options-dropdown-inner">
            <div class="friend-grid-col-options-dropdown-main">
                <ul class="friend-grid-col-options-dropdown-ul">';
        if ($type=='friend' or $type=='connection'){
            $repeated_html.='                    <li class="friend-grid-col-options-dropdown-li network-dropdown-option-in-options">
                        <a href="javascript:void(0)" class="friend-grid-col-options-dropdown-link remove-'.$type.'">Remove '.ucfirst($type).'</a>
                    </li>';
        }

        $repeated_html.='            <li class="friend-grid-col-options-dropdown-li">
                        <a href="'.url('chat').'" class="friend-grid-col-options-dropdown-link">Send Message</a>
                    </li>
                </ul>
            </div>
        </div>';

        return view('ambassador.profile.network',compact('type','user','repeated_html'));
    }
    public function fetch(Request $request){
        $type=$request->type;
        $id=$request->user;
        $data=null;
        $html='';
        if ($type=='friend'){
            $data=getFriendsListUsers(auth()->user()->id);
        }
        if ($type=='connection'){
            $data=getConnectionsListUsers(auth()->user()->id);
        }
        if ($type=='tier-1'){
            $data=auth()->user()->tier_1();
        }
        if ($type=='tier-2'){
            $data=auth()->user()->tier_2();
        }

        foreach ($data as $detail){
            $html.='<div class="friend-grid-col">
                            <div class="friend-grid-col-inner-div">
                                <div class="friend-grid-col-profile">
                                    <div class="friend-grid-col-profile-inner">
                                        <div class="friend-grid-col-profile-image">
                                            <img src="'.$detail->profile_image().'" alt="">
                                        </div>
                                        <div class="friend-grid-col-profile-text">
                                            <div class="friend-grid-col-profile-text-top">
                                                <a href="'.url('profile-view/'.$detail->id).'" class="text-decoration-none text-secondary">'.$detail->fullName().'</a>
                                            </div>
                                            <div class="friend-grid-col-profile-text-bottom">
                                                '.ucfirst($type).'
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="friend-grid-col-options">
                                    <div class="friend-grid-col-options-inner">
                                        <div class="friend-grid-col-options-icon">
                                            <span class="ti-more-alt"></span>
                                            <div class="friend-grid-col-options-dropdown" data-id="'.$detail->id.'">
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
        }
        $repeated_html='<div class="friend-grid-col-options-dropdown-inner">
            <div class="friend-grid-col-options-dropdown-main">
                <ul class="friend-grid-col-options-dropdown-ul">';
        if ($type=='friend' or $type=='connection'){
            $repeated_html.='                    <li class="friend-grid-col-options-dropdown-li network-dropdown-option-in-options">
                        <a href="javascript:void(0)" class="friend-grid-col-options-dropdown-link remove-'.$type.'">Remove '.ucfirst($type).'</a>
                    </li>';
        }

        $repeated_html.='            <li class="friend-grid-col-options-dropdown-li">
                        <a href="'.url('chat').'" class="friend-grid-col-options-dropdown-link">Send Message</a>
                    </li>
                </ul>
            </div>
        </div>';
        return response()->json(['repeated_html'=>$repeated_html,'html'=>$html]);

    }
}
