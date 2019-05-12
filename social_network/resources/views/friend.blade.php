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
                        <div class="h6 title">Bạn bè của {{$user->first_name}}(<span id="no_friends">{{count($friends)}}</span>)</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Friends -->

    <div class="container">
        <input id="unfriend" name="_token" type="hidden" value="{{csrf_token()}}">
        <div class="row">
        @for ($i = 0; $i < count($friends); $i++)
            <div id="friend-item" class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 ">
                <div class="ui-block">

                    <!-- Friend Item -->

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
                                        <a href="#" class="h5 author-name">{{$friends[$i]->first_name.' '.$friends[$i]->last_name}}</a>
                                        <div class="country">{{$profile_friends[$i]->address}}</div>
                                    </div>
                                </div>
                                <div class="h6" data-swiper-parallax="-100">
                                    <div class="friend-about" data-swiper-parallax="-500">
                                        <span class="title">{{$profile_friends[$i]->about_me}}</span>
                                    </div>
                                </div>
                                <div class="control-block-button" data-swiper-parallax="-100">
                                    <a href="javascript:;" class="btn btn-control bg-blue" onclick="unfriend({{$friends[$i]->id}})">
                                        <svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
                                    </a>
                                    <a href="javascript:;" class="btn btn-control bg-purple">
                                        <svg class="olymp-chat---messages-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-chat---messages-icon')}}"></use></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <!-- ... end Friend Item -->
                </div>
            </div>
        @endfor
        </div>
    </div>
    <!-- ... end Friends -->
@endsection

<script>
function unfriend(id){

    var BASE_URL = "{{ url('/') }}";
	$.ajax({
		url: BASE_URL + '/friend/unfriend',
		type: "POST",
		data: {id_friend: id, _token: $('#unfriend').val()},
		success: function (response) {

			if (response.code == 200) {
                $('#friend-item').remove();
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