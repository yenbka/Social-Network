
<?php use Carbon\Carbon;?>

<div class="photo-album-item" data-mh="album-item">
	<div class="photo-item" style="height: 332px;">
		<img src="/uploads/{{$photo->link}}" alt="photo">
		<div class="overlay overlay-dark"></div>
	</div>

	<div class="content">
		<span class="sub-title">
			<?php
				$date_post = $photo->created_at;
				$now = Carbon::now('Asia/Ho_Chi_Minh');
				$result = $date_post->diffForHumans($now);
				echo $result;
			?>
		</span>
	</div>

</div>
