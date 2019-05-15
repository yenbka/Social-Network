
<!-- Notification List Frien Requests -->
@php
    $friendRequests = \App\Http\Controllers\FriendController::getFriendRequest(\Illuminate\Support\Facades\Auth::id());
@endphp
<input id="friend-token" name="_token" type="hidden" value="{{csrf_token()}}">

<ul class="notification-list friend-requests">
    @if (count($friendRequests[0]) > 0)
        @for ($i = 0; $i < count($friendRequests[0]); $i++)
            <li>
                <div class="author-thumb">
                    <img src="{{asset($friendRequests[1][$i]->avatar_path)}}" alt="author" width='42' height='42'>                </div>
                <div class="notification-event">
                    <a href="{{route('profile', ['id' => $friendRequests[0][$i]->id])}}" class="h6 notification-friend">{{$friendRequests[0][$i]->first_name.' '.$friendRequests[0][$i]->last_name}}</a>
                    <span class="chat-message-item">{{$friendRequests[1][$i]->about_me}}</span>
                </div>
                <span class="notification-icon">
                    <a id="accept{{$i}}" href="#" class="accept-request" onclick="process_request(1, {{$friendRequests[0][$i]->id}}, {{$i}})">
                        <span class="icon-add">
                            <svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
                        </span>
                        Chấp nhận
                    </a>

                    <a id="deny{{$i}}" href="#" class="accept-request request-del" onclick="process_request(0, {{$friendRequests[0][$i]->id}}, {{$i}})">
                        <span class="icon-minus">
                            <svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
                        </span>
                        Từ chối
                    </a>

                    <button id="friend{{$i}}" type="button" class="btn btn-success d-none"><i class="fa fa-check" aria-hidden="true"></i>Bạn bè</button>
                    <button id="denied{{$i}}" type="button" class="btn btn-success d-none">Đã từ chối</button>
                    <button id="error{{$i}}" type="button" class="btn btn-warning d-none"><i class="fa fa-time" aria-hidden="true"></i>Đã có lỗi xảy ra!</button>
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
</ul>

<!-- ... end Notification List Frien Requests -->
<script>
    function process_request(is_accept, id, idx){

        var BASE_URL = "{{ url('/') }}";
        $.ajax({
            url: BASE_URL + '/friend/process_request',
            type: "POST",
            data: {is_accept: is_accept, request_id: id, _token: $('#friend-token').val()},
            success: function (response) {
                $("#accept" + idx).addClass("d-none");
                $("#deny" + idx).addClass("d-none");
                if (response.code == 200) {
                    if (is_accept == 1) {
                        $("#friend" + idx).removeClass("d-none");
                    } else {
                        $("#denied" + idx).removeClass("d-none");
                    }
                } else {
                    $("#error" + idx).removeClass("d-none");
                }
            },
            error: function () {
                $("#accept" + idx).addClass("d-none");
                $("#deny" + idx).addClass("d-none");
                $("#error" + idx).removeClass("d-none");
            }
        });
    }
</script>