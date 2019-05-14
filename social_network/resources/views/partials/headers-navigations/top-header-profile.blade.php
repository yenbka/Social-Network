

<!-- Top Header-Profile -->
@php
	$currentID = Route::getCurrentRoute()->parameters()['id'];
	$currentUser = \App\User::find($currentID);
	$currentProfile = \App\Http\Controllers\ProfileController::getProfile($currentID);
@endphp
<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						@if (($currentProfile->header_path) != null)
							<img src="{{asset($currentProfile->header_path)}}" width="1920" height="640" alt="header" >
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
											<a href="{{route('profile', ['id'=>$currentID])}}" class="active">Dòng thời gian</a>
										@else
											<a href="{{route('profile', ['id'=>$currentID])}}" >Dòng thời gian</a>
										@endif
									</li>
									<li>
										@if(\Request::route()->getName()=='about')
											<a href="{{route('about', ['id' => $currentID])}}" class="active">Giới thiệu</a>
										@else
											<a href="{{route('about', ['id' => $currentID])}}">Giới thiệu</a>
										@endif
									</li>
								</ul>
							</div>
							<div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										@if(\Request::route()->getName()=='friend')
											<a href="{{route('friend', ['id' => $currentID])}}" class="active">Bạn bè</a>
										@else
											<a href="{{route('friend', ['id' => $currentID])}}">Bạn bè</a>
										@endif
									</li>
									<li>
										@if(\Request::route()->getName()=='photo')
											<a href="{{route('photo', ['id' => $currentID])}}" class="active">Ảnh</a>
										@else
											<a href="{{route('photo', ['id' => $currentID])}}">Ảnh</a>
										@endif
									</li>
								</ul>
							</div>
						</div>
						@if($currentID==Auth::id())
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
						@endif
					</div>
					<div class="top-header-author">
						@if($currentID==Auth::id())
							<a href="" class="author-thumb" data-toggle="modal" data-target="#update-avatar-photo">
								<img src="{{asset($currentProfile->avatar_path)}}" width="124" height="124" alt="author">
							</a>
						@else
							<a href="" class="author-thumb">
								<img src="{{asset($currentProfile->avatar_path)}}" width="124" height="124" alt="author">
							</a>
						@endif

						<div class="author-content">
							<a href="{{route('profile', ['id'=>$currentID])}}" class="h4 author-name">{{$currentUser->first_name." ".$currentUser->last_name}}</a>
							<div class="country">{{$currentProfile->address}}</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ... end Top Header-Profile -->