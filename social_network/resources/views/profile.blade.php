@extends('layouts.master')
<!-- <body> -->

@include('partials.headers-navigations.right-panel')

@include('partials.headers-navigations.right-panel-responsive')

@include('partials.headers-navigations.header-BP')

@include('partials.headers-navigations.header-BP-responsive')

<div class="header-spacer"></div>

@include('partials.headers-navigations.top-header-profile')
@section('content')

<!-- <div class="container"> -->
<div class="row">

	<!-- Main Content -->

	<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
		<div id="newsfeed-items-grid">

			<div class="ui-block">
				@include('partials.posts.posts1-BP')
			</div>
			<div class="ui-block">
				@include('partials.posts.posts1-BP')
			</div>
			<div class="ui-block">
				@include('partials.posts.posts1-BP')
				@include('partials.comments.comment-list1')
				<a href="#" class="more-comments">View more comments <span>+</span></a>
				@include('partials.forms.comment-form')
			</div>
			<div class="ui-block">
				@include('partials.posts.posts4-BP')
			</div>
		</div>

		<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid">
			<svg class="olymp-three-dots-icon">
				<use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use>
			</svg>
		</a>
	</div>

	<!-- ... end Main Content -->


	<!-- Left Sidebar -->

	<div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">

		<div class="ui-block">
			<div class="ui-block-title">
				<h6 class="title">Profile Intro</h6>
			</div>
			<div class="ui-block-content">

				@include('partials.widgets.w-personal-info')

			</div>
		</div>

		<div class="ui-block">
			<div class="ui-block-title">
				<h6 class="title">Last Videos</h6>
			</div>
			<div class="ui-block-content">

				@include('partials.widgets.w-last-video')

			</div>
		</div>

	</div>

	<!-- ... end Left Sidebar -->


	<!-- Right Sidebar -->

	<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">

		<div class="ui-block">
			<div class="ui-block-title">
				<h6 class="title">Last Photos</h6>
			</div>
			<div class="ui-block-content">

				@include('partials.widgets.w-last-photo')

			</div>
		</div>

		<div class="ui-block">
			<div class="ui-block-title">
				<h6 class="title">Blog Posts</h6>
			</div>
			@include('partials.widgets.w-blog-posts')

		</div>

		<div class="ui-block">
			<div class="ui-block-title">
				<h6 class="title">Friends (86)</h6>
			</div>
			<div class="ui-block-content">

				@include('partials.widgets.w-faved-pages')

			</div>
		</div>

		<div class="ui-block">
			<div class="ui-block-title">
				<h6 class="title">Favourite Pages</h6>
			</div>

			@include('partials.widgets.w-friend-pages-added')

		</div>

		<div class="ui-block">
			<div class="ui-block-title">
				<h6 class="title">James's Poll</h6>
			</div>
			<div class="ui-block-content">

				@include('partials.widgets.w-pool')

				<a href="#" class="btn btn-md-2 btn-border-think custom-color c-grey full-width">Vote Now!</a>
			</div>
		</div>

	</div>

	<!-- ... end Right Sidebar -->

</div>
<!-- </div> -->

@include('partials.windows-popup.update-header-photo')
@include('partials.windows-popup.update-avatar-photo')

@include('partials.windows-popup.choose-from-my-photo')

@include('partials.windows-popup.playlist-popup')

@include('partials.back-to-top')

@include('partials.windows-popup.window-chat-responsive')
@endsection