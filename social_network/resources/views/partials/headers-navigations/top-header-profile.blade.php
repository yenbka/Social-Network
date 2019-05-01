

<!-- Top Header-Profile -->

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						<img src="{{asset('images/top-header1.jpg')}}" alt="nature">
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										@if(\Request::route()->getName()=='profile')
											<a href="{{route('profile', ['id'=>Auth::id()])}}" class="active">Timeline</a>
										@else
											<a href="{{route('profile', ['id'=>Auth::id()])}}" >Timeline</a>
										@endif
									</li>
									<li>
										@if(\Request::route()->getName()=='about')
											<a href="{{route('about', ['id' => Auth::id()])}}" class="active">About</a>
										@else
											<a href="{{route('about', ['id' => Auth::id()])}}">About</a>
										@endif
									</li>
									<li>
										<a href="06-ProfilePage.html">Friends</a>
									</li>
								</ul>
							</div>
							<div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="07-ProfilePage-Photos.html">Photos</a>
									</li>
									<li>
										<a href="09-ProfilePage-Videos.html">Videos</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="top-header-author">
						<a href="" class="author-thumb" data-toggle="modal" data-target="#update-header-photo">
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