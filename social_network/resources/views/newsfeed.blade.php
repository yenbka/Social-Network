
@extends('layouts.master')

@section('content')

	@include('partials.headers-navigations.right-panel')

	@include('partials.headers-navigations.right-panel-responsive')

	@include('partials.headers-navigations.header-BP')

	@include('partials.headers-navigations.header-BP-responsive')

	<div class="header-spacer"></div>
	<div class="container">
		<div class="row">
			<!-- Main Content -->
			<main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
				<div class="ui-block">
					@include('partials.forms.news-feed-form')
				</div>
				<div id="newsfeed-items-grid">
				@foreach($posts as $post)
					@if($post->has_medias===0)
					<div class="ui-block">
						@include('partials.posts.posts6-BP')
						@include('partials.comments.comment-list2',['comments' => $post->comment, 'post_id' => $post->id])
						<!-- <a href="#" class="more-comments">View more comments <span>+</span></a> -->
						@include('partials.forms.comment-form')
					</div>
					@else
					<div class="ui-block">
						@include('partials.posts.posts7-BP')
						@include('partials.comments.comment-list2',['comments' => $post->comment, 'post_id' => $post->id])
						<!-- <a href="#" class="more-comments">View more comments <span>+</span></a> -->
						@include('partials.forms.comment-form')
					</div>
					@endif
					
				@endforeach
				</div>
				<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>
			</main>

			<!-- ... end Main Content -->


			<!-- Left Sidebar -->

			<div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">
				<div class="ui-block">
					<div class="ui-block-title">
						<h6 class="title">Thông tin</h6>
					</div>
					<div class="ui-block-content">

						@include('partials.widgets.w-personal-info')

					</div>
				</div>

				<div class="ui-block">
					<div class="ui-block-title">
						<h6 class="title">Ảnh</h6>
					</div>
					<div class="ui-block-content">

						@include('partials.widgets.w-last-photo')

					</div>
				</div>

			</div>

			<!-- ... end Left Sidebar -->


			<!-- Right Sidebar -->

			<aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
				<div class="ui-block">
					<div class="ui-block-title">
						<h6 class="title">Gợi ý kết bạn</h6>
						<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>
					</div>
				</div>

				<div class="ui-block">
<!--
					<div class="ui-block-title">
						<h6 class="title">Hoạt động</h6>
						<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>
					</div>
-->
				</div>


				<div class="ui-block">
				</div>

			</aside>

			<!-- ... end Right Sidebar -->

		</div>
	</div>


	@include('partials.windows-popup.post-photo')

	@include('partials.windows-popup.choose-from-my-photo')

	@include('partials.back-to-top')

	@include('partials.windows-popup.window-chat-responsive')

@endsection
