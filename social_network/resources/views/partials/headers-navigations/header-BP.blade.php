

<!-- Header-BP -->

<header class="header" id="site-header">
	@php
		$myProfile = \App\Http\Controllers\ProfileController::getProfile(\Illuminate\Support\Facades\Auth::id());
		$friendRequests = \App\Http\Controllers\FriendController::getFriendRequest(\Illuminate\Support\Facades\Auth::id());
	@endphp
	<div class="fixed-sidebar">
		<a href="{{route('home', ['id' => Auth::id()])}}" class="logo">
			<div class="img-wrap">
				<img src="{{asset('images/logo.png')}}" alt="Olympus">
			</div>
		</a>
	</div>
	<div class="page-title">
		<h6><a href="{{route('home', ['id' => Auth::id()])}}" class="logo">Trang chủ</a></h6>
	</div>

	<div class="header-content-wrapper">
		<form method="POST" action="{{action('HomeController@search', ['id' => Auth::id()])}}" class="search-bar w-search notification-list friend-requests">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group with-button">
				<input name="search" class="form-control" placeholder="Tìm bạn bè..." type="text">
				<button>
					<svg class="olymp-magnifying-glass-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon')}}"></use></svg>
				</button>
			</div>
		</form>

		<div class="control-block">

			<div class="control-icon more has-items">
				<svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
				@if(count($friendRequests[0])>0)
					<div class="label-avatar bg-blue">{{count($friendRequests[0])}}</div>
				@endif
				<div class="more-dropdown more-with-triangle triangle-top-center">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">Lời mời kết bạn</h6>
					</div>

					<div class="mCustomScrollbar" data-mcs-theme="dark">
						<ul class="notification-list friend-requests">
							@if(count($friendRequests[0])>0)
								@for ($i = 0; $i < count($friendRequests[0]); $i++)
									<li id="noti_relationship{{$i}}">
										<div class="author-thumb">
											<img src="{{asset($friendRequests[1][$i]->avatar_path)}}" alt="author" width="34px" height="34px">
										</div>
										<div class="notification-event">
											<a href="{{route('profile', ['id' => $friendRequests[0][$i]->id])}}" class="h6">{{$friendRequests[0][$i]->first_name.' '.$friendRequests[0][$i]->last_name}}</a>
										</div>
									</li>
									@if($i==3)
										@break
									@endif
								@endfor
							@else
								<div class="alert alert-success">
									<i class="fa" aria-hidden="true"></i>
									<strong>Không có lời mời nào!</strong>
								</div>
							@endif

						</ul>
					</div>

					<a href="{{route('friend_requests', ['id' => Auth::id()])}}" class="view-all bg-blue">Xem tất cả</a>
				</div>
			</div>

			<div class="control-icon more has-items">
				<svg class="olymp-thunder-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-thunder-icon')}}"></use></svg>

				<div class="label-avatar bg-primary">8</div>

				<div class="more-dropdown more-with-triangle triangle-top-center">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">Thông báo</h6>
					</div>

					<div class="mCustomScrollbar" data-mcs-theme="dark">
						<ul class="notification-list">
							<li>
								<div class="author-thumb">
									<img src="{{asset('images/avatar62-sm.jpg')}}" alt="author">
								</div>
								<div class="notification-event">
									<div><a href="#" class="h6 notification-friend">Mathilda Brinker</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
								</div>
									<span class="notification-icon">
										<svg class="olymp-comments-post-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-comments-post-icon')}}"></use></svg>
									</span>

								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
									<svg class="olymp-little-delete"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-little-delete')}}"></use></svg>
								</div>
							</li>

							<li class="un-read">
								<div class="author-thumb">
									<img src="{{asset('images/avatar63-sm.jpg')}}" alt="author">
								</div>
								<div class="notification-event">
									<div>You and <a href="#" class="h6 notification-friend">Nicholas Grissom</a> just became friends. Write on <a href="#" class="notification-link">his wall</a>.</div>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">9 hours ago</time></span>
								</div>
									<span class="notification-icon">
										<svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
									</span>

								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
									<svg class="olymp-little-delete"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-little-delete')}}"></use></svg>
								</div>
							</li>

							<li class="with-comment-photo">
								<div class="author-thumb">
									<img src="{{asset('images/avatar64-sm.jpg')}}" alt="author">
								</div>
								<div class="notification-event">
									<div><a href="#" class="h6 notification-friend">Sarah Hetfield</a> commented on your <a href="#" class="notification-link">photo</a>.</div>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 5:32am</time></span>
								</div>
									<span class="notification-icon">
										<svg class="olymp-comments-post-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-comments-post-icon')}}"></use></svg>
									</span>

								<div class="comment-photo">
									<img src="{{asset('images/comment-photo1.jpg')}}" alt="photo">
									<span>“She looks incredible in that outfit! We should see each...”</span>
								</div>

								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
									<svg class="olymp-little-delete"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-little-delete')}}"></use></svg>
								</div>
							</li>

							<li>
								<div class="author-thumb">
									<img src="{{asset('images/avatar65-sm.jpg')}}" alt="author">
								</div>
								<div class="notification-event">
									<div><a href="#" class="h6 notification-friend">Green Goo Rock</a> invited you to attend to his event Goo in <a href="#" class="notification-link">Gotham Bar</a>.</div>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 5th at 6:43pm</time></span>
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
									<img src="{{asset('images/avatar66-sm.jpg')}}" alt="author">
								</div>
								<div class="notification-event">
									<div><a href="#" class="h6 notification-friend">James Summers</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 2nd at 8:29pm</time></span>
								</div>
									<span class="notification-icon">
										<svg class="olymp-heart-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-heart-icon')}}"></use></svg>
									</span>

								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
									<svg class="olymp-little-delete"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-little-delete')}}"></use></svg>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="author-page author vcard inline-items more">
				<div class="author-thumb">
					<a href="{{route('profile', ['id' => Auth::id()])}}">
						@if (($myProfile->avatar_path) != null)
							<img alt="author" src="{{asset($myProfile->avatar_path)}}" width="36" height="36" class="avatar">
						@else
							<img alt="author" src="{{asset('images/avatar67-sm.jpg')}}" width="36" height="36" class="avatar">
						@endif
					</a>
					<div class="more-dropdown more-with-triangle">
						<div class="mCustomScrollbar" data-mcs-theme="dark">
							<div class="ui-block-title ui-block-title-small">
								<h6 class="title">Tài khoản</h6>
							</div>

							<ul class="account-settings">
								<li>
									<a href="{{route('get_profile_update_info', ['id' => Auth::id()])}}">
										<svg class="olymp-menu-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-menu-icon')}}"></use></svg>

										<span>Thông tin cá nhân</span>
									</a>
								</li>
								<li>
									<a href="{{route('logout')}}">
										<svg class="olymp-logout-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-logout-icon')}}"></use></svg>

										<span>Đăng xuất</span>
									</a>
								</li>
							</ul>
						</div>

					</div>
				</div>
				<!-- <a href="02-ProfilePage.html" class="author-name fn">
					<div class="author-title">
						James Spiegel <svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')}}"></use></svg>
					</div>
					<span class="author-subtitle">SPACE COWBOY</span>
				</a> -->
				<a href="{{route('profile', ['id' => Auth::id()])}}" class="author-name fn">
					<div class="author-title">
						{{Auth::user()->first_name}}<svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')}}"></use></svg>
					</div>
					<!-- <span class="author-subtitle">SPACE COWBOY</span> -->
				</a>
			</div>

		</div>
	</div>
</header>

<!-- ... end Header-BP -->