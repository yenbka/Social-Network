

<!-- Top Header-Profile -->

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						@if (($profile->header_path) != null)
							<img src="{{asset($profile->header_path)}}" width="1920" height="640" alt="header" >
						@else
							<img src="{{asset('images/bg-group.png')}}" width="1920" height="640" alt="header" >
						@endif
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										@if(\Request::route()->getName()=='profile')
											<a href="{{route('profile', ['id'=>Auth::id()])}}" class="active">Timeline</a>
										@else
											<a href="{{route('profile', ['id'=>Auth::id()])}}" >Dòng thời gian</a>
										@endif
									</li>
									<li>
										@if(\Request::route()->getName()=='about')
											<a href="{{route('about', ['id' => Auth::id()])}}" class="active">Về bạn</a>
										@else
											<a href="{{route('about', ['id' => Auth::id()])}}">Về bạn</a>
										@endif
									</li>
								</ul>
							</div>
							<div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										@if(\Request::route()->getName()=='friend')
											<a href="{{route('friend', ['id' => Auth::id()])}}" class="active">Bạn bè</a>
										@else
											<a href="{{route('friend', ['id' => Auth::id()])}}">Bạn bè</a>
										@endif
									</li>
									<li>
										@if(\Request::route()->getName()=='photo')
											<a href="{{route('photo', ['id' => Auth::id()])}}" class="active">Ảnh</a>
										@else
											<a href="{{route('photo', ['id' => Auth::id()])}}">Ảnh</a>
										@endif
									</li>
								</ul>
							</div>
						</div>
						<div class="control-block-button">
							<div class="btn btn-control bg-primary more">
								<svg class="olymp-settings-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-settings-icon')}}"></use></svg>

								<ul class="more-dropdown more-with-triangle triangle-bottom-right">
									<li>
										<a href="#" data-toggle="modal" data-target="#update-header-photo">Cập nhật ảnh bìa</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="top-header-author">
						<a href="" class="author-thumb" data-toggle="modal" data-target="#update-avatar-photo">
							<img src="{{asset($profile->avatar_path)}}" width="124" height="124" alt="author">
						</a>
						<div class="author-content">
							<a href="{{route('profile', ['id'=>Auth::id()])}}" class="h4 author-name">{{$user->first_name." ".$user->last_name}}</a>
							<div class="country">{{$profile->address}}</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ... end Top Header-Profile -->