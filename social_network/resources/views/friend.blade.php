@extends('layouts.master')
@section('content')
    @php
        $currentID = Route::getCurrentRoute()->parameters()['id'];
        $currentUser = \App\User::find($currentID);
        $friendList = \App\Http\Controllers\FriendController::getFriendList($currentID);
        $friends = $friendList[0];
        $profile_friends = $friendList[1];
    @endphp

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
                        <div class="h6 title">Bạn bè của {{$currentUser->first_name}}(<span id="no_friends">{{count($friends)}}</span>)</div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Friends -->

        <input id="unfriend" name="_token" type="hidden" value="{{csrf_token()}}">
        <div class="row">
            @for ($i = 0; $i < count($friends); $i++)
                <div id="friend-item{{$i}}" class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 ">
                    <div class="ui-block">
                        <div class="friend-item">
                            <div class="friend-header-thumb">
                                <img src="{{asset($profile_friends[$i]->header_path)}}" alt="friend" width="318" height="122">
                            </div>

                            <div class="friend-item-content">
                                <div class="friend-avatar">
                                    <div class="author-thumb">
                                        <img src="{{asset($profile_friends[$i]->avatar_path)}}" alt="author" width="92" height="92">
                                    </div>
                                    <div class="author-content">
                                        <a href="{{route('profile', ['id' => $friends[$i]->id])}}" class="h5 author-name">{{$friends[$i]->first_name.' '.$friends[$i]->last_name}}</a>
                                    </div>
                                </div>
                                <div class="control-block-button" data-swiper-parallax="-100">
                                    <a href="javascript:;" class="accept-request" onclick="unfriend({{$friends[$i]->id}}, {{$i}})">
                                        <span class="icon-minus">
                                            <svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
                                        </span>
                                        Huỷ kết bạn
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
    <!-- ... end Friends -->
    @include('partials.windows-popup.update-header-photo')
    @include('partials.windows-popup.update-avatar-photo')

    @include('partials.windows-popup.choose-from-my-photo')

    @include('partials.windows-popup.playlist-popup')

    @include('partials.back-to-top')

    @include('partials.windows-popup.window-chat-responsive')

<script>
    function unfriend(id, idx){

        var BASE_URL = "{{ url('/') }}";
        $.ajax({
            url: BASE_URL + '/friend/unfriend',
            type: "POST",
            data: {id_friend: id, _token: $('#unfriend').val()},
            success: function (response) {
                if (response.code == 200) {
                    $('#friend-item' + idx).remove();
                    $('#no_friends').text(response.no_friends);
                } else {
                    alert("Something went wrong!");
                }
            },
            error: function () {
                alert("Something went wrong!");
            }
        });
    }
</script>

@endsection