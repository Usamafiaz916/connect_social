@extends('ambassador.layouts.app')
@section('content')
    <div class="profile-content">
        <div class="container">
            <div class="profile-content-inner">
                <div class="profile-content-boxs">
                    <div class="profile-content-boxs-single social-information-content-box">
                        <div class="social-information-content-inner">
                            <div class="content-sides">
                                <div class="content-side-01">
                                    <div class="content-cards">
                                        <div class="content-card">
                                            <div class="content-card-inner">
                                                <div class="content-top-bar custom-padding">
                                                    <div class="content-top-bar-inner">
                                                        <div class="content-top-bar-title">
                                                            <div class="text">
                                                                About
                                                            </div>
                                                            @if($user->id==auth()->user()->id)
                                                                <div class="edit-button"
                                                                     data-target=".abouy-text-editor"
                                                                     data-hide=".about-content" data-type="div">
                                                                    <div class="edit-button-inner">
                                                                        <span class="icon"><span
                                                                                    class="ti-pencil-alt"></span></span>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        @if($user->id==auth()->user()->id)
                                                            <div class="social-dropdown">
                                                                <div class="social-dropdown-inner open-dropdown dropdown-box"
                                                                     data-target=".drop-01">
                                                                    <div class="social-dropdown-main">
                                                                        <div class="icon">
                                                                            <img src="{{getPrivacyDetails(getSocialPrivacy('about'))['url']}}"
                                                                                 alt="">
                                                                        </div>
                                                                        <div class="text">
                                                                            <i style="font-style: normal">{{getPrivacyDetails(getSocialPrivacy('about'))['name']}}</i>
                                                                        </div>
                                                                        <div class="drop-icon">
                                                                            <span class="ti-angle-down"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="set-privacy-dropdown-inner social-privacy custom-dropdown custom-dropdown drop-01"
                                                                     data-key="about">
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="content-card-content">
                                                    <div class="content-card-content-inner about-content custom-padding">
                                                        <p id="about-text">
                                                            {{auth()->user()->details->about}}
                                                        </p>
                                                    </div>
                                                    @if($user->id==auth()->user()->id)

                                                        <div class="abouy-text-editor custom-padding" style="display:none">
                                                            <div class="abouy-text-editor-inner">
                                                                <form id="about_form">
                                                                    @csrf
                                                                    <div class="abouy-text-editor-textarea">
                                                                        <textarea name="about" id="about"
                                                                                  rows="5">{{auth()->user()->details->about}}</textarea>
                                                                    </div>
                                                                    <div class="abouy-text-editor-button mt-2">
                                                                        <button type="submit">Save</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content-card">
                                            <div class="content-card-inner">
                                                <div class="content-top-bar custom-padding">
                                                    <div class="content-top-bar-inner">
                                                        <div class="content-top-bar-title">
                                                            <div class="text">
                                                                Social Information
                                                            </div>
                                                        </div>
                                                        @if($user->id==auth()->user()->id)
                                                            <div class="edit-button" data-toggle="modal"
                                                                 data-target="#update-social-info-modal">
                                                                <div class="edit-button-inner">
                                                                <span class="icon"><span
                                                                            class="ti-pencil-alt"></span></span>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="content-card-content">
                                                    <div class="content-card-content-inner custom-padding">
                                                        <div class="social-info-editor-box">
                                                            <div class="social-info-editor-box-inner">
                                                                <ul class="social-info-editor-box-ul">
                                                                    <li class="social-info-editor-box-li custom-padding">
                                                                        <div class="info-editor-box">
                                                                            <div class="info-editor-box-title">
                                                                                <div class="info-editor-box-title-text">
                                                                                    City
                                                                                </div>
                                                                            </div>

                                                                            <div class="info-editor-box-value">
                                                                                <div class="info-editor-box-value-text"
                                                                                     id="city-text">
                                                                                    {{auth()->user()->details->city}}
                                                                                </div>
                                                                                @if($user->id==auth()->user()->id)
                                                                                    <div class="set-privacy-dropdown">
                                                                                        <div class="set-privacy-dropdown-value open-dropdown dropdown-box"
                                                                                             data-target=".drop-03">
                                                                                            <img src="{{getPrivacyDetails(getSocialPrivacy('city'))['url']}}"
                                                                                                 alt="">
                                                                                        </div>
                                                                                        <div class="set-privacy-dropdown-inner social-privacy custom-dropdown drop-03"
                                                                                             data-key="city">

                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="social-info-editor-box-li custom-padding">
                                                                        <div class="info-editor-box">
                                                                            <div class="info-editor-box-title">
                                                                                <div class="info-editor-box-title-text">
                                                                                    Current State
                                                                                </div>
                                                                            </div>

                                                                            <div class="info-editor-box-value">
                                                                                <div class="info-editor-box-value-text"
                                                                                     id="state-text">
                                                                                    {{auth()->user()->details->state}}

                                                                                </div>
                                                                                @if($user->id==auth()->user()->id)

                                                                                    <div class="set-privacy-dropdown">
                                                                                        <div class="set-privacy-dropdown-value open-dropdown dropdown-box"
                                                                                             data-target=".drop-04">
                                                                                            <img src="{{getPrivacyDetails(getSocialPrivacy('state'))['url']}}"
                                                                                                 alt="">
                                                                                        </div>
                                                                                        <div class="set-privacy-dropdown-inner social-privacy custom-dropdown drop-04"
                                                                                             data-key="state">

                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="social-info-editor-box-li custom-padding">
                                                                        <div class="info-editor-box">
                                                                            <div class="info-editor-box-title">
                                                                                <div class="info-editor-box-title-text">
                                                                                    Relationship Status
                                                                                </div>
                                                                            </div>

                                                                            <div class="info-editor-box-value">
                                                                                <div class="info-editor-box-value-text"
                                                                                     id="relationship-text">
                                                                                    {{auth()->user()->details->relationship}}

                                                                                </div>
                                                                                @if($user->id==auth()->user()->id)

                                                                                    <div class="set-privacy-dropdown">
                                                                                        <div class="set-privacy-dropdown-value open-dropdown dropdown-box"
                                                                                             data-target=".drop-05">
                                                                                            <img src="{{getPrivacyDetails(getSocialPrivacy('relationship'))['url']}}"
                                                                                                 alt="">
                                                                                        </div>
                                                                                        <div class="set-privacy-dropdown-inner social-privacy custom-dropdown drop-05"
                                                                                             data-key="relationship">

                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="social-info-editor-box-li custom-padding">
                                                                        <div class="info-editor-box">
                                                                            <div class="info-editor-box-title">
                                                                                <div class="info-editor-box-title-text">
                                                                                    Date of Joining
                                                                                </div>
                                                                            </div>

                                                                            <div class="info-editor-box-value">
                                                                                <div class="info-editor-box-value-text">
                                                                                    {{dateFormat(auth()->user()->details->joining,'d M Y')}}

                                                                                </div>
                                                                                @if($user->id==auth()->user()->id)

                                                                                    <div class="set-privacy-dropdown">
                                                                                        <div class="set-privacy-dropdown-value open-dropdown dropdown-box"
                                                                                             data-target=".drop-06">
                                                                                            <img src="{{getPrivacyDetails(getSocialPrivacy('joining'))['url']}}"
                                                                                                 alt="">
                                                                                        </div>
                                                                                        <div class="set-privacy-dropdown-inner social-privacy custom-dropdown drop-06"
                                                                                             data-key="joining">

                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="social-info-editor-box-li custom-padding">
                                                                        <div class="info-editor-box">
                                                                            <div class="info-editor-box-title">
                                                                                <div class="info-editor-box-title-text">
                                                                                    Workplace
                                                                                </div>
                                                                            </div>

                                                                            <div class="info-editor-box-value">
                                                                                <div class="info-editor-box-value-text"
                                                                                     id="workplace-text">
                                                                                    {{auth()->user()->details->workplace}}

                                                                                </div>
                                                                                @if($user->id==auth()->user()->id)
                                                                                    <div class="set-privacy-dropdown">
                                                                                        <div class="set-privacy-dropdown-value open-dropdown dropdown-box"
                                                                                             data-target=".drop-07">
                                                                                            <img src="{{getPrivacyDetails(getSocialPrivacy('workplace'))['url']}}"
                                                                                                 alt="">
                                                                                        </div>
                                                                                        <div class="set-privacy-dropdown-inner social-privacy custom-dropdown drop-07"
                                                                                             data-key="workplace">

                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="social-info-editor-box-li custom-padding">
                                                                        <div class="info-editor-box">
                                                                            <div class="info-editor-box-title">
                                                                                <div class="info-editor-box-title-text">
                                                                                    High School
                                                                                </div>
                                                                            </div>

                                                                            <div class="info-editor-box-value">
                                                                                <div class="info-editor-box-value-text"
                                                                                     id="high_school-text">
                                                                                    {{auth()->user()->details->high_school}}

                                                                                </div>
                                                                                @if($user->id==auth()->user()->id)
                                                                                    <div class="set-privacy-dropdown">
                                                                                        <div class="set-privacy-dropdown-value open-dropdown dropdown-box"
                                                                                             data-target=".drop-08">
                                                                                            <img src="{{getPrivacyDetails(getSocialPrivacy('high_school'))['url']}}"
                                                                                                 alt="">
                                                                                        </div>
                                                                                        <div class="set-privacy-dropdown-inner social-privacy custom-dropdown drop-08"
                                                                                             data-key="high_school">

                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="social-info-editor-box-li custom-padding">
                                                                        <div class="info-editor-box">
                                                                            <div class="info-editor-box-title">
                                                                                <div class="info-editor-box-title-text">
                                                                                    Hobbies
                                                                                </div>
                                                                            </div>

                                                                            <div class="info-editor-box-value">
                                                                                <div class="info-editor-box-value-text"
                                                                                     id="hobbies-text">
                                                                                    {{auth()->user()->details->hobbies}}
                                                                                </div>
                                                                                @if($user->id==auth()->user()->id)
                                                                                    <div class="set-privacy-dropdown">
                                                                                        <div class="set-privacy-dropdown-value open-dropdown dropdown-box"
                                                                                             data-target=".drop-09">
                                                                                            <img src="{{getPrivacyDetails(getSocialPrivacy('hobbies'))['url']}}"
                                                                                                 alt="">
                                                                                        </div>
                                                                                        <div class="set-privacy-dropdown-inner social-privacy custom-dropdown drop-09"
                                                                                             data-key="hobbies">

                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="social-info-editor-box-li custom-padding">
                                                                        <div class="info-editor-box">
                                                                            <div class="info-editor-box-title">
                                                                                <div class="info-editor-box-title-text">
                                                                                    Email Address
                                                                                </div>
                                                                            </div>

                                                                            <div class="info-editor-box-value">
                                                                                <div class="info-editor-box-value-text">
                                                                                    {{auth()->user()->email}}

                                                                                </div>
                                                                                @if($user->id==auth()->user()->id)
                                                                                    <div class="set-privacy-dropdown">
                                                                                        <div class="set-privacy-dropdown-value open-dropdown dropdown-box"
                                                                                             data-target=".drop-10">
                                                                                            <img src="{{getPrivacyDetails(getSocialPrivacy('email'))['url']}}"
                                                                                                 alt="">
                                                                                        </div>
                                                                                        <div class="set-privacy-dropdown-inner social-privacy custom-dropdown drop-10"
                                                                                             data-key="email">

                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="social-info-editor-box-li custom-padding">
                                                                        <div class="info-editor-box">
                                                                            <div class="info-editor-box-title">
                                                                                <div class="info-editor-box-title-text">
                                                                                    Mobile Number
                                                                                </div>
                                                                            </div>

                                                                            <div class="info-editor-box-value">
                                                                                <div class="info-editor-box-value-text">
                                                                                    {{auth()->user()->phone}}

                                                                                </div>
                                                                                @if($user->id==auth()->user()->id)
                                                                                    <div class="set-privacy-dropdown">
                                                                                        <div class="set-privacy-dropdown-value open-dropdown dropdown-box"
                                                                                             data-target=".drop-11">
                                                                                            <img src="{{getPrivacyDetails(getSocialPrivacy('phone'))['url']}}"
                                                                                                 alt="">
                                                                                        </div>
                                                                                        <div class="set-privacy-dropdown-inner social-privacy custom-dropdown drop-11"
                                                                                             data-key="phone">

                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="social-info-editor-box-li custom-padding">
                                                                        <div class="info-editor-box">
                                                                            <div class="info-editor-box-title">
                                                                                <div class="info-editor-box-title-text">
                                                                                    Gender
                                                                                </div>
                                                                            </div>

                                                                            <div class="info-editor-box-value">
                                                                                <div class="info-editor-box-value-text"
                                                                                     id="gender-text">
                                                                                    {{auth()->user()->gender}}

                                                                                </div>
                                                                                @if($user->id==auth()->user()->id)
                                                                                    <div class="set-privacy-dropdown">
                                                                                        <div class="set-privacy-dropdown-value open-dropdown dropdown-box"
                                                                                             data-target=".drop-12">
                                                                                            <img src="{{getPrivacyDetails(getSocialPrivacy('gender'))['url']}}"
                                                                                                 alt="">
                                                                                        </div>
                                                                                        <div class="set-privacy-dropdown-inner social-privacy custom-dropdown drop-12"
                                                                                             data-key="gender">

                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content-card">
                                            <div class="content-card-inner">
                                                <div class="content-top-bar custom-padding">
                                                    <div class="content-top-bar-inner">
                                                        <div class="content-top-bar-title">
                                                            <div class="text">
                                                                Photos/Gallery
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content-card-content">
                                                    <div class="content-card-content-inner">
                                                        <div class="photo-galary-grid">
                                                            <div class="photo-galary-grid-inner">
                                                                @foreach($images as $image)
                                                                    <div class="photo-grid-col">
                                                                        <div class="photo-grid-col-inner">
                                                                            <img src="{{$image}}" alt="{{$image}}">
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="see-all custom-padding">
                                                        <div class="see-all-inner">
                                                            <a href="{{route('gallery',['all'])}}">See All</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content-card">
                                            <div class="content-card-inner">
                                                <div class="content-top-bar custom-padding">
                                                    <div class="content-top-bar-inner">
                                                        <div class="content-top-bar-title">
                                                            <div class="text">
                                                                Friends ({{getFriendsList($user->id)->count()}})
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content-card-content">
                                                    <div class="content-card-content-inner">
                                                        <div class="friend-grid">
                                                            <div class="friend-grid-inner">
                                                                @if(getFriendsList($user->id)->count()>0)
                                                                    @foreach(getFriendsListUsers($user->id) as $friend)
                                                                    <div class="friend-grid-col">
                                                                        <div class="friend-grid-col-inner">
                                                                            <div class="firend-grid-col-image">
                                                                                <img src="{{$friend->profile_image()}}" alt="">
                                                                            </div>
                                                                            <div class="friend-grid-col-text">
                                                                                <a href="{{url('profile-view/'.$friend->id)}}" class="text-decoration-none text-muted">{{$friend->fullName()}}</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                @else
                                                                    <i class="text-muted ml-4">No friend</i>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="see-all custom-padding">
                                                        <div class="see-all-inner">
                                                            <a href="{{route('network',['friends'])}}">See All</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-side-02">
                                    <div class="content-cards">
                                        @if($user->id==auth()->user()->id)
                                            @include('ambassador.profile.components.add_post')
                                        @endif
                                    </div>
                                    @include('ambassador.profile.components.show_posts')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="privacy_dropdown" style='display: none'>
        <ul class="set-privacy-dropdown-ul">
            <li class="set-privacy-dropdown-li" data-value="{{Privacy::PRIV_FRIENDS}}">
                <div class="set-privacy-dropdown-icon">
                    <img src="{{url('ambassador_assets/images/icons/users.svg')}}" alt=""> <span
                            class="text">Friends</span>
                </div>
            </li>
            <li class="set-privacy-dropdown-li" data-value="{{Privacy::PRIV_PUBLIC}}">
                <div class="set-privacy-dropdown-icon">
                    <img src="{{url('ambassador_assets/images/icons/globe.svg')}}" alt=""> <span
                            class="text">Public</span>
                </div>
            </li>
            <li class="set-privacy-dropdown-li" data-value="{{Privacy::PRIV_CONNECTIONS}}">
                <div class="set-privacy-dropdown-icon">
                    <img src="{{url('ambassador_assets/images/icons/connection.svg')}}" alt=""> <span class="text">Connections</span>
                </div>
            </li>
            <li class="set-privacy-dropdown-li" data-value="{{Privacy::PRIV_TIER_1}}">
                <div class="set-privacy-dropdown-icon">
                    <img src="{{url('ambassador_assets/images/icons/personal-network.svg')}}" alt=""> <span
                            class="text">Personal TR 01</span>
                </div>
            </li>
            <li class="set-privacy-dropdown-li" data-value="{{Privacy::PRIV_TIER_2}}">
                <div class="set-privacy-dropdown-icon">
                    <img src="{{url('ambassador_assets/images/icons/extended-network.svg')}}" alt=""> <span
                            class="text">Extended TR 02</span>
                </div>
            </li>
        </ul>
    </div>
@endsection
<script src="{{url('index.js')}}"></script>
@push('scripts')
    @if($user->id==auth()->user()->id)
        <script>
            $(function () {
                $(document).on('submit', '#change_name_form', function (e) {
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "{{route('ambassador.update.name')}}",
                        data: new FormData(this),
                        dataType: 'JSON',
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function (data) {
                            $('#update-name-modal').modal('hide');
                            $('#full-name-of-current-user').html(data.response.fname + ' ' + data.response.lname);
                        },
                        error: function (xhr) {
                            erroralert(xhr);
                        }
                    });

                });
                $(document).on('submit', '#about_form', function (e) {
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "{{route('ambassador.update.about')}}",
                        data: new FormData(this),
                        dataType: 'JSON',
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function (data) {
                            $('.abouy-text-editor').hide();
                            $('.about-content').show();
                            $('#about-text').text(data.response.about);
                        },
                        error: function (xhr) {
                            erroralert(xhr);
                        }
                    });

                });
                $(document).on('submit', '#social_info_form', function (e) {
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "{{route('ambassador.update.social.info')}}",
                        data: new FormData(this),
                        dataType: 'JSON',
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function (data) {
                            console.log(data);
                            $('#update-social-info-modal').modal('hide');
                            $('#city-text').text(data.response.city);
                            $('#gender-text').text(data.response.gender);
                            $('#high_school-text').text(data.response.high_school);
                            $('#hobbies-text').text(data.response.hobbies);
                            $('#relationship-text').text(data.response.relationship);
                            $('#state-text').text(data.response.state);
                            $('#workplace-text').text(data.response.workplace);

                        },
                        error: function (xhr) {
                            erroralert(xhr);
                        }
                    });

                });
                $(document).on('submit', '#update_cover_photo_form', function (e) {
                    e.preventDefault();
                    swal({
                        title: "Are you sure to change cover photo?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                            if (willDelete) {
                                $.ajax({
                                    url: "{{route('ambassador.update.cover')}}",
                                    data: new FormData(this),
                                    dataType: "JSON",
                                    type: "post",
                                    processData: false,
                                    contentType: false,
                                    cache: false,
                                    success: function (data) {
                                        $('#cover_photo_preview').attr('src', data.response);
                                        $('#cover_photo_input').val('');
                                    },
                                    error: function (xhr) {
                                        erroralert(xhr);
                                    },
                                });
                            }
                        });
                });
                $(document).on('submit', '#update_profile_photo_form', function (e) {
                    e.preventDefault();
                    swal({
                        title: "Are you sure to change profile photo?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                            if (willDelete) {
                                $.ajax({
                                    url: "{{route('ambassador.update.profile')}}",
                                    data: new FormData(this),
                                    dataType: "JSON",
                                    type: "post",
                                    processData: false,
                                    contentType: false,
                                    cache: false,
                                    success: function (data) {
                                        $('.profile_photo_preview').attr('src', data.response);
                                        $('#profile_photo_input').val('');
                                    },
                                    error: function (xhr) {
                                        erroralert(xhr);
                                    },
                                });
                            }
                        });
                });
            });
            function changePrivacy(key, value) {
                $.ajax({
                    type: "POST",
                    url: "{{route('ambassador.update.privacy')}}",
                    dataType: "JSON",
                    data: {'key': key, 'value': value, _token: '{{csrf_token()}}'},
                    success: function (data) {
                    },
                    error: function (xhr) {
                        erroralert(xhr);
                    }
                });
            }
        </script>
    @else
        <script>
            $(function () {
                showControls('{{$user->id}}');
                $(document).on('click', '#add-as-friend', function () {
                    var to = $(this).attr('data-to');
                    $.ajax({
                        type: "POST",
                        url: "{{route('friends.send.request')}}",
                        dataType: "JSON",
                        data: {'to': to, _token: '{{csrf_token()}}'},
                        success: function (data) {
                            showControls('{{$user->id}}');
                        },
                        error: function (xhr) {
                            erroralert(xhr);
                        }
                    });
                });
                $(document).on('click', '.cancel-friend-request', function () {
                    var id = $(this).attr('data-id');
                    $.ajax({
                        type: "POST",
                        url: "{{route('friends.cancel.request')}}",
                        dataType: "JSON",
                        data: {'id': id, _token: '{{csrf_token()}}'},
                        success: function (data) {
                            showControls('{{$user->id}}');
                        },
                        error: function (xhr) {
                            erroralert(xhr);
                        }
                    });
                });
                $(document).on('click', '.cancel-connection-request', function () {
                    var id = $(this).attr('data-id');
                    $.ajax({
                        type: "POST",
                        url: "{{route('connections.cancel.request')}}",
                        dataType: "JSON",
                        data: {'id': id, _token: '{{csrf_token()}}'},
                        success: function (data) {
                            showControls('{{$user->id}}');
                        },
                        error: function (xhr) {
                            erroralert(xhr);
                        }
                    });
                });
                $(document).on('click', '.remove-friend', function () {
                    var id = $(this).attr('data-id');
                    $.ajax({
                        type: "POST",
                        url: "{{route('friends.remove.friend')}}",
                        dataType: "JSON",
                        data: {'id': id, _token: '{{csrf_token()}}'},
                        success: function (data) {
                            showControls('{{$user->id}}');
                        },
                        error: function (xhr) {
                            erroralert(xhr);
                        }
                    });
                });
                $(document).on('click', '.remove-connection', function () {
                    var id = $(this).attr('data-id');
                    $.ajax({
                        type: "POST",
                        url: "{{route('connections.remove.connection')}}",
                        dataType: "JSON",
                        data: {'id': id, _token: '{{csrf_token()}}'},
                        success: function (data) {
                            showControls('{{$user->id}}');
                        },
                        error: function (xhr) {
                            erroralert(xhr);
                        }
                    });
                });
                $(document).on('click', '.friend-request-sent', function () {
                    var id = $(this).attr('data-id');
                    var status = null;
                    if($(this).hasClass('approve')){
                        status='{{Friends::STATUS_APPROVED}}'
                    }
                    if($(this).hasClass('decline')){
                        status='{{Friends::STATUS_REJECTED}}'
                    }

                    $.ajax({
                        type: "POST",
                        url: "{{route('friends.action')}}",
                        dataType: "JSON",
                        data: {'id': id,'status': status, _token: '{{csrf_token()}}'},
                        success: function (data) {
                            showControls('{{$user->id}}');
                        },
                        error: function (xhr) {
                            erroralert(xhr);
                        }
                    });
                });
                $(document).on('click', '.connection-request-sent', function () {
                    var id = $(this).attr('data-id');
                    var status = null;
                    if($(this).hasClass('approve')){
                        status='{{Connections::STATUS_APPROVED}}'
                    }
                    if($(this).hasClass('decline')){
                        status='{{Connections::STATUS_REJECTED}}'
                    }

                    $.ajax({
                        type: "POST",
                        url: "{{route('connections.action')}}",
                        dataType: "JSON",
                        data: {'id': id,'status': status, _token: '{{csrf_token()}}'},
                        success: function (data) {
                            showControls('{{$user->id}}');
                        },
                        error: function (xhr) {
                            erroralert(xhr);
                        }
                    });
                });
                $(document).on('click', '#add-as-connection', function () {
                    var to = $(this).attr('data-to');
                    $.ajax({
                        type: "POST",
                        url: "{{route('connections.send.request')}}",
                        dataType: "JSON",
                        data: {'to': to, _token: '{{csrf_token()}}'},
                        success: function (data) {
                            showControls('{{$user->id}}');
                        },
                        error: function (xhr) {
                            erroralert(xhr);
                        }
                    });
                });

            });

            function showControls(id) {
                $.ajax({
                    type: "POST",
                    url: "{{route('ambassador.show.control')}}",
                    dataType: "JSON",
                    data: {'id': id, _token: '{{csrf_token()}}'},
                    success: function (data) {
                        $('.profile-action-btns-inner').html(data);
                    },
                    error: function (xhr) {
                        erroralert(xhr);
                    }
                });
            }
        </script>
    @endif
    @stack('subscripts')
@endpush
@if($user->id==auth()->user()->id)
    <div class="modal fade" id="update-social-info-modal" tabindex="-1" role="dialog"
         aria-labelledby="update-social-info-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="update-social-info-modalLabel"><i class="ti-pencil"></i> Update Social
                        Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="social_info_form">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" value="{{auth()->user()->details->city}}"
                                           name="city" id="city">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="state">Current State</label>
                                    <input type="text" class="form-control" value="{{auth()->user()->details->state}}"
                                           name="state" id="state">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="relationship">Relationship Status</label>
                                    <select name="relationship" id="relationship" class="form-control">
                                        <option value="" hidden>Select Status</option>
                                        <option value="single" {{auth()->user()->details->relationship=='single'?'selected':''}}>
                                            Single
                                        </option>
                                        <option value="married" {{auth()->user()->details->relationship=='married'?'selected':''}}>
                                            Married
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="workplace">Workplace</label>
                                    <input type="text" name="workplace" id="workplace" class="form-control"
                                           value="{{auth()->user()->details->workplace}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="high_school">High School</label>
                                    <input type="text" name="high_school" id="high_school" class="form-control"
                                           value="{{auth()->user()->details->high_school}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="hobbies">Hobbies</label>
                                    <input type="text" class="form-control" id="hobbies" name="hobbies"
                                           value="{{auth()->user()->details->city}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="" hidden>Select Gender</option>
                                        <option value="male" {{auth()->user()->gender=='male'?'selected':''}}>Male
                                        </option>
                                        <option value="female" {{auth()->user()->gender=='female'?'selected':''}}>Female
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer share-post-button">
                        <button type="button" data-dismiss="modal">Close</button>
                        <button type="submit">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
