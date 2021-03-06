@extends('auth.layouts.app')
@section('content')
    <link rel="stylesheet" href="{{url('assets/css/all.css')}}">
    <!-- Header -->
    <div class="page-navigation">
        <div class="container">
            <!-- <div class="container-fluid"> -->
            <div class="page-navigation-inner">
                <div class="mobile-menu-btn">
                    <div class="mobile-menu-btn-outer">
                        <div class="mobile-menu-btn-inner">
                            <span class='mobile-menu-btn-image open-menu'>
                                <img src="{{url('assets/images/icons/menu.png')}}" alt="">
                            </span>
                        </div>
                    </div>
                </div>
                <ul class="page-navigation-ul">
                    <li class="page-navigation-li active">
                        <a href="javascript:void(0)" class="page-navigation-link">About</a>
                    </li>
                    <li class="page-navigation-li">
                        <a href="javascript:void(0)" class="page-navigation-link">Ambassador</a>
                    </li>
                    <li class="page-navigation-li">
                        <a href="javascript:void(0)" class="page-navigation-link">Merchants</a>
                    </li>
                    <li class="page-navigation-li">
                        <a href="javascript:void(0)" class="page-navigation-link">Our World</a>
                    </li>
                    <li class="page-navigation-li">
                        <a href="javascript:void(0)" class="page-navigation-link">Treasure Island</a>
                    </li>
                </ul>
                <div class="login-link">

                </div>
            </div>
            <div class="navigation-in-mobile">
                <ul class="page-navigation-ul d-block">
                    <li class="page-navigation-li active">
                        <a href="javascript:void(0)" class="page-navigation-link">About</a>
                    </li>
                    <li class="page-navigation-li">
                        <a href="javascript:void(0)" class="page-navigation-link">Consumer</a>
                    </li>
                    <li class="page-navigation-li">
                        <a href="javascript:void(0)" class="page-navigation-link">Merchants</a>
                    </li>
                    <li class="page-navigation-li">
                        <a href="javascript:void(0)" class="page-navigation-link">Our World</a>
                    </li>
                    <li class="page-navigation-li">
                        <a href="javascript:void(0)" class="page-navigation-link">Treasure Island</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Profile -->
    <div class="user-profile-div">
        <div class="container">
            <!-- <div class="container-fluid"> -->
            <div class="user-profile-div-inner">
                <div class="user-profile-div-main row">
                    <div class="col-md-6">
                        <div class="user-profile-info-inner">
                            <div class="user-profile-info-image">
                                <img src="{{$ref->profile_image()}}" alt="">
                            </div>
                            <div class="user-profile-info-text">
                                <h2 class="user-profile-info-text-name">Referrer</h2>
                                <h4 class="user-profile-info-text-name">{{$ref->fullName()}}</h4>
                                <div class="user-profile-info-text-type"><i>{{$ref->roles->name}}</i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="user-profile-info-action-inner text-center">
                            <h4 class="user-profile-info-action-top-text">
                                Get Started & Join My Network!
                            </h4>
                            <div class="user-profile-info-action-buttons">
                                <a href="{{url('sign-up?by='.$ref->id.'&role=2')}}"
                                   class="user-profile-btn-large white mr-3">Join as Merchant</a>
                                <a href="{{url('sign-up?by='.$ref->id.'&role=3')}}"
                                   class="user-profile-btn-large white">Join as Ambassador</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="user-profile-about">
        <div class="container">
            <!-- <div class="container-fluid"> -->
            <div class="user-profile-about-inner">
                <div class="user-profile-about-main row">
                    @if($ref->roles->slug=='ambassador')
                    <div class="user-profile-about-text col-md-5">
                        <h2 class="user-profile-about-title text-center">
                            About {{$ref->fullName()}}
                        </h2>
                        <div class="user-profile-about-text-p">
                            <p>{{$ref->details->about}}</p>
                        </div>
                        <div class="user-profile-social-info">
                            <div class="user-profile-social-info-title">
                                <div class="user-profile-social-info-table">
                                    <table class="table table-borderd">
                                        <tbody>
                                        <tr>
                                            <td>City</td>
                                            <td>{{$ref->details->city}}</td>
                                        </tr>
                                        <tr>
                                            <td>Current State</td>
                                            <td>{{$ref->details->state}}</td>
                                        </tr>
                                        <tr>
                                            <td>Relationship Status</td>
                                            <td>{{$ref->details->relationship}}</td>
                                        </tr>
                                        <tr>
                                            <td>Date of Joining</td>
                                            <td>{{$ref->details->joining}}</td>
                                        </tr>
                                        <tr>
                                            <td>Workplace</td>
                                            <td>{{$ref->details->workplace}}</td>
                                        </tr>
                                        <tr>
                                            <td>High School</td>
                                            <td>{{$ref->details->high_school}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="user-profile-about-video col-md-6">
                        <h2 class="user-profile-about-title text-center">
                            About Connect Social
                        </h2>
                        <div class="user-profile-video-container">
                            <div class="user-profile-video-container-inner">
                                <div class="user-profile-video-container-image">
                                    <img src="{{url('assets/images/video/bg-01.png')}}" alt="">
                                    <div class="user-profile-video-controller">
                                        <div class="user-profile-video-controller-inner">
                                            <img src="{{url('assets/images/icons/play.svg')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-profile-video-bottom-text">
                            <div class="user-profile-video-bottom-text-inner">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, impedit aperiam!
                                    Nam amet eius, alias earum, praesentium magni ex accusamus pariatur aut
                                    perspiciatis, repellendus velit facere libero ipsam commodi quae.</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, impedit aperiam!
                                    Nam amet eius, alias earum, praesentium magni ex accusamus pariatur aut
                                    perspiciatis, repellendus velit facere libero ipsam commodi quae.</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, impedit aperiam!
                                    Nam amet eius, alias earum, praesentium magni ex accusamus pariatur aut
                                    perspiciatis, repellendus velit facere libero ipsam commodi quae.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        var count = 0;
        $(".mobile-menu-btn-image").click(function () {
            if (count == 0) {
                $('.navigation-in-mobile').slideDown(500);
                count = 1;
            } else {
                $('.navigation-in-mobile').slideUp(500);
                count = 0;
            }
        });
    </script>
@endsection