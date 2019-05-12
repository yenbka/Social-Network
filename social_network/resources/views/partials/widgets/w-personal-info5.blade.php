
<!-- W-Personal-Info -->

<ul class="widget w-personal-info">
	<li>
		<span class="title">Tên</span>
		<span class="text">{{$user->first_name.' '.$user->last_name}}</span>
	</li>
	<li>
		<span class="title">Ngày sinh</span>
		<span class="text">{{$profile->birth_date}}</span>
	</li>
	<li>
		<span class="title">Địa chỉ</span>
		<span class="text">{{$profile->address}}</span>
	</li>

	<li>
		<span class="title">Giới tính</span>
		@if($profile->gender==0)
			<span class="text">Nam</span>
		@else
			<span class="text">Nữ</span>
		@endif
	</li>
	<li>
		<span class="title">Tình trạng</span>
		<span class="text">Độc thân</span>
	</li>
	<li>
		<span class="title">Địa chỉ email</span>
		<span class="text">{{$user->email}}</span>
	</li>
	<!-- <li>
		<span class="title">Website:</span>
		<a href="#" class="text">daydreamsagency.com</a>
	</li> -->
	<li>
		<span class="title">Số điện thoại</span>
		<span class="text">{{$profile->phone}}</span>
	</li>
	<li>
		<span class="title">Về tôi</span>
		<span class="text">{{$profile->about_me}}</span>
	</li>
	<!-- <li>
		<span class="title">Religious Belifs:</span>
		<span class="text">-</span>
	</li>
	<li>
		<span class="title">Political Incline:</span>
		<span class="text">Democrat</span>
	</li> -->
</ul>

<!-- ... end W-Personal-Info -->