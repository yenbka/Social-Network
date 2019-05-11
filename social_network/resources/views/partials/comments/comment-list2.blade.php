<?php use Carbon\Carbon;?>
<!-- Comments -->
@if(!empty($comments))
<ul class="comments-list" id="comment-{{$post_id}}">
	@foreach($comments as $comment)
	<li class="comment-item">
		<div class="post__author author vcard inline-items">
			<img src="/{{$comment->user->profile->avatar_path}}" alt="author">

			<div class="author-date">
				<a class="h6 post__author-name fn" href="02-ProfilePage.html">{{$comment->user->last_name}} {{$comment->user->first_name}}</a>
				<div class="post__date">
					<time class="published" >
						<?php
	                        $date_comment = $comment->created_at;
	                        $now = Carbon::now('Asia/Ho_Chi_Minh');
	                        $result = $date_comment->diffForHumans($now);
	                        echo $result;
	                    ?>
					</time>
				</div>
			</div>

{{--			<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>--}}

		</div>

		<p>{{$comment->content}}</p>

	</li>
	@endforeach
</ul>
@endif

<!-- ... end Comments -->
