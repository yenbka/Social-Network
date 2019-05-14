<!-- Window-popup Post Photo -->

<div class="modal fade" id="post-photo" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog window-popup update-header-photo" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
			</a>

			<div class="modal-header">
				<h6 class="title">Chỉnh sửa ảnh bìa</h6>
			</div>

			<div class="modal-body">
				<div class="upload-photo-item">

					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<input type="file" id="imagefile" name="imagefile[]" class="inputfile" form="post-form" onchange="previewFile('#imagefile','#thumbnail1')" multiple/>
					<h2><label for="imagefile"><i class="fas fa-image" ></i></label></h2>

					<h6>Tải ảnh lên</h6>
					<span>Từ máy tính của bạn.</span>
				</div>

				<a href="#" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">
					<svg class="olymp-photos-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-photos-icon"></use></svg>

					<h6>Tải ảnh lên</h6>
					<span>Ảnh trong bộ sưu tập</span>
				</a>
			</div>
		</div>
	</div>
</div>


<!-- ... end Window-popup Update Header Photo -->