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
function getFriendsListUsers($id){
    $friends=Friend::where('from',$id)->where('status',\Friends::STATUS_APPROVED)->orwhere('to',$id)->where('status',\Friends::STATUS_APPROVED)->get();
    $users=[];
    foreach ($friends as $friend){
        $users[]=getFriendDetails($friend);
    }
    return $users;
}


function getConnectionsList($id){
    $connections=Connection::where('from',$id)->where('status',\Connections::STATUS_APPROVED)->orwhere('to',$id)->where('status',\Connections::STATUS_APPROVED)->get();
    return $connections;
}
function getConnectionsListUsers($id){
    $connections=Connection::where('from',$id)->where('status',\Connections::STATUS_APPROVED)->orwhere('to',$id)->where('status',\Connections::STATUS_APPROVED)->get();
    $users=[];
    foreach ($connections as $connection){
        $users[]=getConnectionDetails($connection);
    }
    return $users;
}

function getMessageHtml($chat){
    if ($chat->from == auth()->user()->id){
        $align='sent';
        $profile=$chat->sender->profile_image();
    }else{
        $align='received';
        $profile=$chat->sender->profile_image();
    }
    $name=$chat->sender->fullName();
    $singleMessageBody='<div class="single-message '.$align.'">
                                                    <div class="single-message-profile">
                                                        <div class="single-message-image">
                                                            <img src="'.$profile.'" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="single-chat-message-inner">
                                                        <div class="single-message-chat-inner">
                                                            <div class="single-chat-message-username">'.$name.'</div>
                                                            ';
    if ($chat->message){
        $singleMessageBody.='<div class="single-chat-message-text-inner">
                                                                <div class="single-chat-message-text">'.$chat->message.'</div>
                                                            </div>';
    }
    if ($chat->file){
        $singleMessageBody.='<div class="single-chat-message-attachment open-file" data-url="'.Storage::disk('local')->url('/chat/'.$chat->from.'/'.$chat->file).'">
                                                                <div class="single-chat-message-attachment-image">
                                                                    <img src="'.url('ambassador_assets/images/icons/image-default.png').'" alt="">
                                                                </div>
                                                                <div class="single-chat-message-attachment-download">
                                                                    <a download >Download</a>
                                                                </div>
                                                            </div>
                                                            ';
    }
    $singleMessageBody.='
                                                        </div>
                                                    </div>
                                                    <div class="single-chat-message-attachment-time">
                                                        <div class="single-chat-message-attachment-time-inner">
                                                            ';
    $singleMessageBody.='
                                                            <div class="single-chat-message-time">
                                                                '.$chat->created_at->format('h:i A').'
                                                           </div>
                                                        </div>
                                                    </div>
                                                </div>
';
    return $singleMessageBody;
}
function getArrayFromKeyofEloquent($eloquent,$key){

    $array=[];
    foreach ($eloquent as $k=>$item) {
        $array[]=$item[$key];
    }
    return $array;
}
function invite_email_text($name){
    $html='<p class="bg-light border rounded p-3 message-value">
              Hi XXXXX,
              <br>
              <br>
              '.auth()->user()->fullName().' has sent you an invitation link to join Connect Social network.
              <br>
              <br>
              You can use the below link to either join as Ambassador or Merchant on Connect Social network. You will be rewarded with XX Connect Coins as a welcome bonus after successful registration.
              <br>
              <br>
              Referral link: <a href="'.auth()->user()->invite().'">'.auth()->user()->invite().'</a><br>
              <br>
              If you have any questions, feel free to contact us at abcxyz@gmail.com.
              <br>
              <br>
              Best Regards,<br>
              Connect Social Team
    </p>';
    $message=str_replace('XXXXX',$name,$html);
    return $message;
}