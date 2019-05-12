<!-- Personal Information Form  -->
@if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $err)
            {{$err}}<br />
        @endforeach
    </div>
@endif

@if(!empty($status))
    <div class="alert alert-success">
        {{$status}}
	</div>
@endif

<form method="POST" action="{{action('ProfileController@profile_update_info', ['id' => Auth::id()])}}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="row">

		<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
			<div class="form-group label-floating">
				<label class="control-label">Họ</label>
				<input name="first_name" class="form-control" placeholder="" type="text" value="{{$user->first_name}}" required>
			</div>

			<div class="form-group label-floating">
				<label class="control-label">Địa chỉ email</label>
				<input name="email" class="form-control" placeholder="" type="email" value="{{$user->email}}" readonly>
			</div>

			<div class="form-group date-time-picker label-floating">
				<label class="control-label">Ngày sinh</label>
				<input name="birth_date" value="{{$profile->birth_date}}" />
				<span class="input-group-addon">
					<svg class="olymp-month-calendar-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-month-calendar-icon')}}"></use></svg>
				</span>
			</div>
		</div>

		<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
			<div class="form-group label-floating">
				<label class="control-label">Họ</label>
				<input name="last_name" class="form-control" placeholder="" type="text" value="{{$user->last_name}}">
			</div>

			<div class="form-group label-floating">
				<label class="control-label">Địa chỉ</label>
				<input name="address" class="form-control" placeholder="" type="text" value="{{$profile->address}}">
			</div>


			<div class="form-group label-floating">
				<label class="control-label">Số điện thoại</label>
				<input name="phone" class="form-control" placeholder="" type="text" value="{{$profile->phone}}">
			</div>
		</div>

		<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
			<div class="form-group label-floating">
				<label class="control-label">Thông tin</label>
				<textarea name="about_me" class="form-control" placeholder="">{{$profile->about_me}}</textarea>
			</div>
		</div>
		<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
			<div class="form-group label-floating is-select">
				<label class="control-label">Giới tính</label>
				<select name="gender" class="selectpicker form-control">
					@if ($profile->gender==0)
					<option value="MA" selected>Nam</option>
					<option value="FE">Nữ</option>
					@else
					<option value="FE" selected>Nữ</option>
					<option value="MA">Nam</option>
					@endif
				</select>
			</div>
			<div class="form-group label-floating is-select">
				<label class="control-label">Tình trạng quan hệ</label>
				<select name="status" class="selectpicker form-control">
					@if ($profile->status == 1)
					<option value="Married" selected>Đã cưới</option>
					<option value="NotMarried">Độc thân</option>
					@else
					<option value="NotMarried" selected>Độc thân</option>
					<option value="Married">Đã cưới</option>
					@endif
				</select>
			</div>

		</div>
		<div class="col col-lg-12 col-md-12 col-sm-12 col-12">
			<button class="btn btn-primary btn-lg full-width">Lưu</button>
		</div>

	</div>
</form>

<!-- ... end Personal Information Form  -->