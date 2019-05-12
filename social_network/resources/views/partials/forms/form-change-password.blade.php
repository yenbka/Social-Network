
<!-- Change Password Form -->

<form action="{{url('change-password')}}" method="post">
	{{ csrf_field() }}
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="form-group label-floating">
				<label class="control-label">Mật khẩu cũ</label>
				<input class="form-control" placeholder="" type="password" name="oldPass">
				@if ($errors->has('oldPass'))
					<p>{{$errors->first('oldPass')}}</p>
				@endif
			</div>
		</div>
		<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
			<div class="form-group label-floating is-empty">
				<label class="control-label">Mật khẩu mới</label>
				<input class="form-control" placeholder="" type="password" name="newPass">
				@if ($errors->has('newPass'))
					<p>{{$errors->first('newPass')}}</p>
				@endif
			</div>
		</div>
		<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
			<div class="form-group label-floating is-empty">
				<label class="control-label">Nhập lại mật khẩu mới</label>
				<input class="form-control" placeholder="" type="password" name="newPass1">
				@if ($errors->has('newPass1'))
					<p>{{$errors->first('newPass1')}}</p>
				@endif
			</div>
		</div>
		<div class="col col-lg-12 col-sm-12 col-sm-12 col-12">
			<div class="remember">
				<div class="checkbox">
					<label>
						<input name="optionsCheckboxes" type="checkbox" checked>
						Nhớ đăng nhập
					</label>
				</div>
				<a href="#" class="forgot">Quên mật khẩu</a>
			</div>
		</div>
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<input type="submit" value="Đổi mật khẩu" class="btn btn-primary btn-lg full-width">
		</div>

	</div>
</form>

<!-- ... end Change Password Form -->