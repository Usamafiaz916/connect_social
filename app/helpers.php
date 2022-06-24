<?php
use \PHPMailer\PHPMailer\PHPMailer;

function sendEmail($to,$from,$subject,$message){
    if ($from==null){
        $from='connectsocial@napollo.net';
    }
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';             //  smtp host
        $mail->SMTPAuth = true;
        $mail->Username = 'connectsocial@napollo.net';   //  sender username
        $mail->Password = 'SDE$#@W#42';       // sender password
        $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
        $mail->Port = 587;                          // port - 587/465

        $mail->setFrom($from, 'Connect social');
        $mail->addAddress($to);
        //$mail->addCC();
        //$mail->addBCC($request->emailBcc);
        //$mail->addReplyTo('sender@example.com', 'SenderReplyName');

        $mail->isHTML(true);                // Set email content format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;
        // $mail->AltBody = plain text version of email body;
        if($mail->send() ) {
            return true;
        }
        else {
            return response()->json(["failed", $mail->ErrorInfo]);
        }
    } catch (Exception $e) {
        return response()->json(["error", "Message could not be sent."]);
    }
}
function dateFormat($date,$format){
    $seconds= strtotime($date);
    return date($format,$seconds);
}
class Privacy{
    const PRIV_FRIENDS='friends';
    const PRIV_PUBLIC='public';
    const PRIV_CONNECTIONS='connections';
    const PRIV_TIER_1='tier-1';
    const PRIV_TIER_2='tier-2';
}
class Friends{
    const STATUS_REQUEST_SENT=0;
    const STATUS_APPROVED=1;
    const STATUS_REJECTED=2;
}
class Connections{
    const STATUS_REQUEST_SENT=0;
    const STATUS_APPROVED=1;
    const STATUS_REJECTED=2;
}

function getPrivacyDetails($slug){
    $data=[];
    if ($slug=='friends') {
        $data['url'] = url('ambassador_assets/images/icons/users.svg');
        $data['name'] = 'Friends';
    }
    if ($slug=='public') {
        $data['url'] = url('ambassador_assets/images/icons/globe.svg');
        $data['name'] = 'Public';
    }
    if ($slug=='connections') {
        $data['url'] = url('ambassador_assets/images/icons/connection.svg');
        $data['name'] = 'Connections';
    }
    if ($slug=='tier-1') {
        $data['url'] = url('ambassador_assets/images/icons/personal-network.svg');
        $data['name'] = 'Personal Tier 01';
    }
    if ($slug=='tier-2') {
        $data['url'] = url('ambassador_assets/images/icons/extended-network.svg');
        $data['name'] = 'Extended Tier 02';
    }
    return $data;
}

function myLikeOnPost($post){
    $my=false;
    foreach ($post->likes as $like){
        if ($like->user_id==auth()->user()->id){
            $my=true;
        }
    }
    return $my;
}
function getSocialPrivacy($k){
    $data=unserialize(auth()->user()->details->privacy);
    $privacy='friends';
    if ($data){
        foreach ($data as $key=>$value){
            if ($key==$k){
                $privacy=$value;
            }
        }
    }

    return $privacy;
}
use App\Models\Friend;
use App\Models\Connection;
function friendRequestSent($to){
    if (Friend::where('from',auth()->user()->id)->where('to',$to)->where('status',Friends::STATUS_REQUEST_SENT)->get()->count()==0){
        return false;
    }
    return true;
}function connectionRequestSent($to){
    if (Connection::where('from',auth()->user()->id)->where('to',$to)->where('status',Connections::STATUS_REQUEST_SENT)->get()->count()==0){
        return false;
    }
    return true;
}
function fOrCRequestSent($to){
    $anyOne=false;
    if (Connection::where('from',auth()->user()->id)->where('to',$to)->get()->count()>0){
        $anyOne=true;
    }
    if (Friend::where('from',auth()->user()->id)->where('to',$to)->get()->count()>0){
        $anyOne=true;
    }
    return $anyOne;
}
function receivedAnyPendingRequest($id){
    $anyOne=false;
    if (Friend::where('to',auth()->user()->id)->where('from',$id)->where('status',Friends::STATUS_REQUEST_SENT)->get()->count()){
        $anyOne=true;
    }
    if (Connection::where('to',auth()->user()->id)->where('from',$id)->where('status',Connections::STATUS_REQUEST_SENT)->get()->count()){
        $anyOne=true;
    }
    return $anyOne;
}
function receivedAnyApprovedRequest($id){

    $anyOne=false;
    if (Friend::where('to',auth()->user()->id)->where('from',$id)->where('status',Friends::STATUS_APPROVED)->get()->count()){
        $anyOne=true;
    }
    if (Friend::where('to',$id)->where('from',auth()->user()->id)->where('status',Friends::STATUS_APPROVED)->get()->count()){
        $anyOne=true;
    }

    if (Connection::where('to',auth()->user()->id)->where('from',$id)->where('status',Connections::STATUS_APPROVED)->get()->count()){
        $anyOne=true;
    }
    if (Connection::where('to',$id)->where('from',auth()->user()->id)->where('status',Connections::STATUS_APPROVED)->get()->count()){
        $anyOne=true;
    }
    return $anyOne;
}
function checkApprovedRequest($id){

    $anyOne='';
    if (Friend::where('to',auth()->user()->id)->where('from',$id)->where('status',Friends::STATUS_APPROVED)->get()->count()){
        $anyOne='friends';
    }
    if (Friend::where('to',$id)->where('from',auth()->user()->id)->where('status',Friends::STATUS_APPROVED)->get()->count()){
        $anyOne='friends';
    }

    if (Connection::where('to',auth()->user()->id)->where('from',$id)->where('status',Connections::STATUS_APPROVED)->get()->count()){
        $anyOne='connections';
    }
    if (Connection::where('to',$id)->where('from',auth()->user()->id)->where('status',Connections::STATUS_APPROVED)->get()->count()){
        $anyOne='connections';
    }
    return $anyOne;
}

function receivedFriendRequest($id){
    if (Friend::where('to',auth()->user()->id)->where('from',$id)->where('status',Friends::STATUS_REQUEST_SENT)->get()->count()>0){
        return true;
    }
    return false;
}
function receivedConnectionRequest($id){
    if (Connection::where('to',auth()->user()->id)->where('from',$id)->where('status',Connections::STATUS_REQUEST_SENT)->get()->count()>0){
        return true;
    }
    return false;
}
function getFriendDetails($f){
    $friend=null;
    if (auth()->user()->id==$f->from){
        $friend=$f->user_to;
    }
    if (auth()->user()->id==$f->to){
        $friend=$f->user_from;
    }
    return $friend;
}
function getConnectionDetails($f){
    $friend=null;
    if (auth()->user()->id==$f->from){
        $friend=$f->user_to;
    }
    if (auth()->user()->id==$f->to){
        $friend=$f->user_from;
    }
    return $friend;
}
function getFriendsList($id){
    $friends=Friend::where('from',$id)->where('status',\Friends::STATUS_APPROVED)->orwhere('to',$id)->where('status',\Friends::STATUS_APPROVED)->get();
    return $friends;
}
function getConnectionsList($id){
    $connections=Connection::where('from',$id)->where('status',\Connections::STATUS_APPROVED)->orwhere('to',$id)->where('status',\Connections::STATUS_APPROVED)->get();
    return $connections;
}
