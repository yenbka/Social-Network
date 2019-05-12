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

		<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<div class="h6 title">Có {{$user_result->count()}} kết quả: “<span class="c-primary">{{$search}}</span>”</div>
				</div>
			</div>

			<div id="search-items-grid">
                @for ($i = 0; $i < $user_result->count(); $i++)
                    <div class="ui-block">
                        @include('partials.search-results.search-result1')
                    </div>
                @endfor



			</div>

			<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="search-items-to-load.html" data-container="search-items-grid">
				<svg class="olymp-three-dots-icon">
					<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
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
						<h6 class="title">Last Photos</h6>
					</div>
					<div class="ui-block-content">

						@include('partials.widgets.w-last-photo')

					</div>
				</div>
			<div class="ui-block">
					<div class="ui-block-title">
						<h6 class="title">Friend Suggestions</h6>
						<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>
					</div>
				</div>


		</div>

		<!-- ... end Left Sidebar -->


		<!-- Right Sidebar -->

		<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Gợi ý kết bạn</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
			</div>
		</div>

		<!-- ... end Right Sidebar -->

	</div>
</div>

@include('partials.windows-popup.window-chat-responsive')
@include('partials.back-to-top')

@endsection