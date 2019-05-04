
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
						
					</div>
					@elseif($post->media->type===1)
					<div class="ui-block">
						@include('partials.posts.posts7-BP')
					</div>
					@else
					<div class="ui-block">
						@include('partials.posts.posts5-BP')
					</div>
					@endif
				@endforeach
					
					<!-- <div class="ui-block">
						@include('partials.posts.posts8-BP')
					</div>

					<div class="ui-block">
						@include('partials.posts.posts9-BP')
					</div> -->

				</div>

				<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>

			</main>

			<!-- ... end Main Content -->


			<!-- Left Sidebar -->

			<aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">
				<div class="ui-block">
					{{--@include('partials.widgets.w-weather')--}}
				</div>

				<div class="ui-block">
{{--					@include('partials.widgets.w-calendar')--}}
				</div>

				<div class="ui-block">
					<div class="ui-block-title">
						<h6 class="title">Pages You May Like</h6>
						<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
					</div>

					@include('partials.widgets.w-friend-pages-added')

				</div>
			</aside>

			<!-- ... end Left Sidebar -->


			<!-- Right Sidebar -->

			<aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">

				<div class="ui-block">
{{--					@include('partials.widgets.w-birthsday-alert')--}}
				</div>

				<div class="ui-block">
					<div class="ui-block-title">
						<h6 class="title">Friend Suggestions</h6>
						<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
					</div>

{{--					@include('partials.widgets.w-friend-pages-added-suggestions')--}}

				</div>

				<div class="ui-block">

					<div class="ui-block-title">
						<h6 class="title">Activity Feed</h6>
						<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
					</div>

{{--					@include('partials.widgets.w-activity-feed')--}}

				</div>


				<div class="ui-block">

{{--					@include('partials.widgets.w-action')--}}

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
