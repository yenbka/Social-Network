@extends('layouts.master')
@section('content')
    @include('partials.headers-navigations.right-panel')

    @include('partials.headers-navigations.right-panel-responsive')

    @include('partials.headers-navigations.header-BP')

    @include('partials.headers-navigations.header-BP-responsive')

    <div class="header-spacer"></div>

    @include('partials.headers-navigations.top-header-profile')
    <div class="container">
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="ui-block responsive-flex">
                    <div class="ui-block-title">
                        <div class="h6 title">{{$user->first_name.'’s Friends ('.sizeof($friends).')'}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Friends -->

    <div class="container">
        <div class="row">
            <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="ui-block">

                    <!-- Friend Item -->

                    <div class="friend-item">
                        <div class="friend-header-thumb">
                            <img src="{{asset('images/friend1.jpg')}}" alt="friend">
                        </div>

                        <div class="friend-item-content">

                            <div class="more">
                                <svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                                <ul class="more-dropdown">
                                    <li>
                                        <a href="#">Report Profile</a>
                                    </li>
                                    <li>
                                        <a href="#">Block Profile</a>
                                    </li>
                                    <li>
                                        <a href="#">Turn Off Notifications</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="friend-avatar">
                                <div class="author-thumb">
                                    <img src="{{asset('images/avatar1.jpg')}}" alt="author">
                                </div>
                                <div class="author-content">
                                    <a href="#" class="h5 author-name">Nicholas Grissom</a>
                                    <div class="country">San Francisco, CA</div>
                                </div>
                            </div>

                            <div class="swiper-container" data-slide="fade">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="friend-count" data-swiper-parallax="-500">
                                            <a href="#" class="friend-count-item">
                                                <div class="h6">52</div>
                                                <div class="title">Friends</div>
                                            </a>
                                            <a href="#" class="friend-count-item">
                                                <div class="h6">240</div>
                                                <div class="title">Photos</div>
                                            </a>
                                            <a href="#" class="friend-count-item">
                                                <div class="h6">16</div>
                                                <div class="title">Videos</div>
                                            </a>
                                        </div>
                                        <div class="control-block-button" data-swiper-parallax="-100">
                                            <a href="#" class="btn btn-control bg-blue">
                                                <svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
                                            </a>

                                            <a href="#" class="btn btn-control bg-purple">
                                                <svg class="olymp-chat---messages-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-chat---messages-icon')}}"></use></svg>
                                            </a>

                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <p class="friend-about" data-swiper-parallax="-500">
                                            Hi!, I’m Marina and I’m a Community Manager for “Gametube”. Gamer and full-time mother.
                                        </p>

                                        <div class="friend-since" data-swiper-parallax="-100">
                                            <span>Friends Since:</span>
                                            <div class="h6">December 2014</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- If we need pagination -->
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>

                    <!-- ... end Friend Item -->
                </div>
            </div>
        </div>
    </div>

    <!-- ... end Friends -->
@endsection