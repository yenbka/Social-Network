

<!-- Fixed Sidebar Right -->
@php
	$listUser = \App\Http\Controllers\ChatController::getListUser(Auth::id());
@endphp

<div class="fixed-sidebar right">
	<div class="fixed-sidebar-right sidebar--small" id="sidebar-right">
		<div class="mCustomScrollbar" data-mcs-theme="dark">
			<ul class="chat-users">
				@foreach ($listUser as $user)
					<li class="inline-items js-chat-open" user-id="{{$user->id}}">
						<div class="author-thumb">
						@if (($user->profile->avatar_path) != null)
							<img alt="author" src="{{asset($user->profile->avatar_path)}}" class="avatar">
						@else
							<img alt="author" src="{{asset('images/avatar67-sm.jpg')}}" class="avatar">
						@endif
						</div>
					</li>
				@endforeach
			</ul>
		</div>
		<a href="#" class="olympus-chat inline-items js-sidebar-open">
			<svg class="olymp-menu-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-menu-icon')}}"></use></svg>
		</a>
	</div>
	<div class="fixed-sidebar-right sidebar--large" id="sidebar-right-1">
		<div class="mCustomScrollbar" data-mcs-theme="dark">
			<div class="ui-block-title ui-block-title-small">
				<p class="title">Danh sách người dùng</p>
			</div>
			<ul class="chat-users">
				@foreach ($listUser as $user)
					<li class="inline-items js-chat-open" user-id="{{$user->id}}">
						<div class="author-thumb">
							@if (($user->profile->avatar_path) != null)
								<img alt="author" src="{{asset($user->profile->avatar_path)}}" class="avatar">
							@else
								<img alt="author" src="{{asset('images/avatar67-sm.jpg')}}" class="avatar">
							@endif
						</div>
						<div class="author-status">
							<a href="#" class="h6 author-name">{{$user->first_name.' '.$user->last_name}}</a>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
		<a href="#" class="olympus-chat inline-items js-sidebar-open">
			<h6 class="olympus-chat-title">Nhắn tin</h6>
			<svg class="olymp-close-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use></svg>
		</a>
	</div>
</div>

<!-- ... end Fixed Sidebar Right -->