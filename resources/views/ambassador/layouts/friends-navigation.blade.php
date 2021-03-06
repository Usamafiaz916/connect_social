<div class="inner-navigation">
    <div class="inner-navigation-outer">
        <div class="container">
            <div class="inner-navigation-inner">
                <div class="inner-navigation-main">
                    <ul class="inner-navigation-ul">
                        <li class="inner-navigation-li {{$type=='friend'?'active':''}}">
                            <a href data-type="friend" class="inner-navigation-link network-link">
                                <span class="icon">
                                    <img src="{{url('ambassador_assets/images/icons/users.svg')}}" alt="">
                                </span>
                                <span class="text">Friends <span id="total-friends">{{getFriendsList($user->id)->count()}}</span> </span>
                            </a>
                        </li>
                        <li class="inner-navigation-li {{$type=='connection'?'active':''}}">

                            <a href data-type="connection" class="inner-navigation-link network-link">
                                <span class="icon">
                                    <img src="{{url('ambassador_assets/images/icons/connection.svg')}}" alt="">
                                </span>
                                <span class="text">Connections <span id="total-connections">{{getConnectionsList($user->id)->count()}}</span></span>
                            </a>
                        </li>
                        <li class="inner-navigation-li {{$type=='tier-1'?'active':''}}">
                            <a href data-type="tier-1" class="inner-navigation-link network-link">
                                <span class="icon">
                                    <img src="{{url('ambassador_assets/images/icons/personal-network.svg')}}" alt="">
                                </span>
                                <span class="text">Personalized Network-Tier-1  <span id="total-tier-1">{{auth()->user()->tier_1()->count()}}</span></span>
                            </a>
                        </li>
                        <li class="inner-navigation-li {{$type=='tier-2'?'active':''}}">
                            <a href data-type="tier-2" class="inner-navigation-link network-link">
                                <span class="icon">
                                    <img src="{{url('ambassador_assets/images/icons/extended-network.svg')}}" alt="">
                                </span>
                                <span class="text">Extended Network-Tier 2 <span id="total-tier-2">{{auth()->user()->tier_2()->count()}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>