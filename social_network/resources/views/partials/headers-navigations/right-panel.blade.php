

<!-- Fixed Sidebar Right -->

<div class="fixed-sidebar right">
	<div class="fixed-sidebar-right sidebar--small" id="sidebar-right">

		<div class="mCustomScrollbar" data-mcs-theme="dark">
			<ul class="chat-users">
			@foreach ($listUser as $user)
				<li class="inline-items js-chat-open">
					<div class="author-thumb">
					@if (($user->profile->avatar_path) != null)
						<img alt="author" src="{{asset($user->profile->avatar_path)}}" class="avatar">
					@else
						<img alt="author" src="{{asset('images/avatar67-sm.jpg')}}" class="avatar">
					@endif
						<span class="icon-status online"></span>
					</div>
				</li>
			@endforeach
			</ul>
		</div>

		<!-- <div class="search-friend inline-items">
			<a href="#" class="js-sidebar-open">
				<svg class="olymp-menu-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-menu-icon')}}"></use></svg>
			</a>
		</div> -->

		<a href="#" class="olympus-chat inline-items js-sidebar-open">
			<svg class="olymp-menu-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-menu-icon')}}"></use></svg>
		</a>

	</div>

	<div class="fixed-sidebar-right sidebar--large" id="sidebar-right-1">

		<div class="mCustomScrollbar" data-mcs-theme="dark">

			<div class="ui-block-title ui-block-title-small">
				<p class="title">Danh sách bạn bè</p>
			</div>

			<ul class="chat-users">
				@foreach ($listUser as $user)
					<li class="inline-items js-chat-open">
						<div class="author-thumb">
							@if (($user->profile->avatar_path) != null)
								<img alt="author" src="{{asset($user->profile->avatar_path)}}" class="avatar">
							@else
								<img alt="author" src="{{asset('images/avatar67-sm.jpg')}}" class="avatar">
							@endif
							<span class="icon-status online"></span>
						</div>
						<div class="author-status">
							<a href="#" class="h6 author-name">{{$user->first_name.' '.$user->last_name}}</a>
							<span class="status">Đang hoạt động</span>
						</div>
					</li>
				@endforeach
			</ul>
		</div>

		<!-- <div class="search-friend inline-items">
			<form class="form-group" >
				<input class="form-control" placeholder="Search Friends..." value="" type="text">
			</form>

			<a href="29-YourAccount-AccountSettings.html" class="settings">
				<svg class="olymp-settings-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-settings-icon')}}"></use></svg>
			</a>

			<a href="#" class="js-sidebar-open">
				<svg class="olymp-close-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use></svg>
			</a>
		</div> -->

		<a href="#" class="olympus-chat inline-items js-sidebar-open">
			<h6 class="olympus-chat-title">Let's chat</h6>
			<svg class="olymp-close-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use></svg>
		</a>

	</div>
</div>

<!-- ... end Fixed Sidebar Right -->