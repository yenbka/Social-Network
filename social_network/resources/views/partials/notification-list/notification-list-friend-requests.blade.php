
<!-- Notification List Frien Requests -->
<input id="friend-token" name="_token" type="hidden" value="{{csrf_token()}}">

<ul class="notification-list friend-requests">
    @if (count($friends) > 0)
        @for ($i = 0; $i < count($friends); $i++)
            <li>
                <div class="author-thumb">
                <img src="{{asset($profile_friends[$i]->avatar_path)}}" alt="author" width='42' height='42'>                </div>
                <div class="notification-event">
                    <a href="#" class="h6 notification-friend">{{$friends[$i]->first_name.' '.$friends[$i]->last_name}}</a>
                    <span class="chat-message-item">{{$profile_friends[$i]->about_me}}</span>
                </div>
                <span class="notification-icon">
                                    <a id="accept" href="#" class="accept-request" onclick="process_request(1, {{$friends[$i]->id}})">
                                        <span class="icon-add">
                                            <svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
                                        </span>
                                        Chấp nhận
                                    </a>

                                    <a id="deny" href="#" class="accept-request request-del" onclick="process_request(0, {{$friends[$i]->id}})">
                                        <span class="icon-minus">
                                            <svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
                                        </span>
                                        Từ chối
                                    </a>

                                    <button id="friend" type="button" class="btn btn-success d-none"><i class="fa fa-check" aria-hidden="true"></i>Bạn bè</button>
                                    <button id="denied" type="button" class="btn btn-success d-none">Từ chối</button>
			                        <button id="error" type="button" class="btn btn-warning d-none"><i class="fa fa-time" aria-hidden="true"></i>Đã có lỗi xảy ra!</button>
                                </span>

                <div class="more">
                    <svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                    <svg class="olymp-little-delete"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-little-delete')}}"></use></svg>
                </div>
            </li>
        @endfor
    @else
    <div class="alert alert-success">
        <i class="fa" aria-hidden="true"></i>
        <strong>Không có lời mời nào!</strong>
    </div>
    @endif

    <!-- <li>
        <div class="author-thumb">
            <img src="{{asset('images/avatar16-sm.jpg')}}" alt="author">
        </div>
        <div class="notification-event">
            <a href="#" class="h6 notification-friend">Tony Stevens</a>
            <span class="chat-message-item">4 Friends in Common</span>
        </div>
        <span class="notification-icon">
							<a href="#" class="accept-request">
								<span class="icon-add">
									<svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
								</span>
								Accept Friend Request
							</a>

							<a href="#" class="accept-request request-del">
								<span class="icon-minus">
									<svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
								</span>
							</a>

						</span>

        <div class="more">
            <svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
            <svg class="olymp-little-delete"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-little-delete')}}"></use></svg>
        </div>
    </li>

    <li class="accepted">
        <div class="author-thumb">
            <img src="{{asset('images/avatar17-sm.jpg')}}" alt="author">
        </div>
        <div class="notification-event">
            You and <a href="#" class="h6 notification-friend">Mary Jane Stark</a> just became friends. Write on <a href="#" class="notification-link">his wall</a>.
        </div>
        <span class="notification-icon">
							<svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
						</span>

        <div class="more">
            <svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
            <svg class="olymp-little-delete"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-little-delete')}}"></use></svg>
        </div>
    </li>

    <li>
        <div class="author-thumb">
            <img src="{{asset('images/avatar18-sm.jpg')}}" alt="author">
        </div>
        <div class="notification-event">
            <a href="#" class="h6 notification-friend">Stagg Clothing</a>
            <span class="chat-message-item">9 Friends in Common</span>
        </div>
        <span class="notification-icon">
							<a href="#" class="accept-request">
								<span class="icon-add">
									<svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
								</span>
								Accept Friend Request
							</a>

							<a href="#" class="accept-request request-del">
								<span class="icon-minus">
									<svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
								</span>
							</a>

						</span>

        <div class="more">
            <svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
            <svg class="olymp-little-delete"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-little-delete')}}"></use></svg>
        </div>
    </li> -->

</ul>

<!-- ... end Notification List Frien Requests -->
<script>
function process_request(is_accept, id){

    var BASE_URL = "{{ url('/') }}";
	$.ajax({
		url: BASE_URL + '/friend/process_request',
		type: "POST",
		data: {is_accept: is_accept, request_id: id, _token: $('#friend-token').val()},
		success: function (response) {
            $("#accept").addClass("d-none");
			$("#deny").addClass("d-none");
			if (response.code == 200) {
                if (is_accept == 1) {
                    $("#friend").removeClass("d-none");
                } else {
                    $("#denied").removeClass("d-none");
                }
			} else {
                $("#error").removeClass("d-none");
			}
		},
		error: function () {
			$("#accept").addClass("d-none");
			$("#deny").addClass("d-none");
            $("#error").removeClass("d-none");
		}
	});
}
</script>