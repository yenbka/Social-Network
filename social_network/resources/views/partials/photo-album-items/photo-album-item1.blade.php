

<div class="photo-album-item" data-mh="album-item">
	<div class="photo-item">
		<img src="{{asset('images/photo-item2.jpg')}}" alt="photo">
		<div class="overlay overlay-dark"></div>
		<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>
		<a href="#" class="post-add-icon">
			<svg class="olymp-heart-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-heart-icon')}}"></use></svg>
			<span>324</span>
		</a>
		<a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
	</div>

	<div class="content">
		<a href="#" class="title h5">South America Vacations</a>
		<span class="sub-title">Last Added: 2 hours ago</span>

		<div class="swiper-container">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<ul class="friends-harmonic">
						<li>
							<a href="#">
								<img src="{{asset('images/friend-harmonic5.jpg')}}" alt="friend">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="{{asset('images/friend-harmonic10.jpg')}}" alt="friend">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="{{asset('images/friend-harmonic7.jpg')}}" alt="friend">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="{{asset('images/friend-harmonic8.jpg')}}" alt="friend">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="{{asset('images/friend-harmonic2.jpg')}}" alt="friend">
							</a>
						</li>
					</ul>
				</div>

				<div class="swiper-slide">
					<div class="friend-count" data-swiper-parallax="-500">
						<a href="#" class="friend-count-item">
							<div class="h6">24</div>
							<div class="title">Photos</div>
						</a>
						<a href="#" class="friend-count-item">
							<div class="h6">86</div>
							<div class="title">Comments</div>
						</a>
						<a href="#" class="friend-count-item">
							<div class="h6">16</div>
							<div class="title">Share</div>
						</a>
					</div>
				</div>
			</div>

			<!-- If we need pagination -->
			<div class="swiper-pagination"></div>
		</div>
	</div>

</div>
