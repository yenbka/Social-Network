@extends('layouts.master')

@section('content')
@include('partials.headers-navigations.left-panel-responsive')

@include('partials.headers-navigations.right-panel')

@include('partials.headers-navigations.right-panel-responsive')

@include('partials.headers-navigations.header-BP')

@include('partials.headers-navigations.header-BP-responsive')

<div class="header-spacer"></div>

@include('partials.headers-navigations.top-header-profile')


<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title inline-items">
					<div class="btn btn-control btn-control-small bg-yellow">
						<svg class="olymp-trophy-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-trophy-icon"></use></svg>
					</div>
					<h6 class="title">James’s Featured Video</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            @include('partials.features-video.features-video')
		</div>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<div class="h6 title">James’s Videos</div>

					<div class="align-right">
						<a href="#" class="btn btn-primary btn-md-2" data-toggle="modal" data-target="#update-header-photo">Upload Video  +</a>
					</div>

					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            @include('partials.features-video.video-item1')
            
		</div>
		<div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            @include('partials.features-video.video-item2')
		</div>
		<div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            @include('partials.features-video.video-item3')
		</div>
		<div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            @include('partials.features-video.video-item4')
		</div>
		<div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            @include('partials.features-video.video-item5')
		</div>
		<div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            @include('partials.features-video.video-item6')
		</div>
		<div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            @include('partials.features-video.video-item7')
		</div>
		<div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            @include('partials.features-video.video-item8')
		</div>
	</div>
</div>

@include('partials.windows-popup.update-header-photo')

@include('partials.windows-popup.choose-from-my-photo')

@include('partials.back-to-top')

@include('partials.windows-popup.window-chat-responsive')

@endsection