@extends('layouts.master')

@section('content')
	
@include('partials.headers-navigations.right-panel')

@include('partials.headers-navigations.right-panel-responsive')

@include('partials.headers-navigations.header-BP')

@include('partials.headers-navigations.header-BP-responsive')


<div class="header-spacer"></div>
@include('partials.headers-navigations.top-header-profile')



<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block responsive-flex">
				<div class="ui-block-title">
					<div class="h6 title">{{$user->first_name."’s Photo Gallery"}}</div>

					<div class="block-btn align-right">
						<a href="#" data-toggle="modal" data-target="#create-photo-album" class="btn btn-primary btn-md-2">Create Album  +</a>

						<a href="#" data-toggle="modal" data-target="#update-header-photo" class="btn btn-md-2 btn-border-think custom-color c-grey">Add Photos</a>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane" id="photo-page" role="tabpanel">

					<div class="photo-album-wrapper">
                        @include('partials.photo-items.photo-item-half')

                        @include('partials.photo-items.photo-item1')

                        @include('partials.photo-items.photo-item1')

                        @include('partials.photo-items.photo-item1')

                        @include('partials.photo-items.photo-item1')

                        @include('partials.photo-items.photo-item1')

                        @include('partials.photo-items.photo-item1')

                        @include('partials.photo-items.photo-item1')

                        @include('partials.photo-items.photo-item1')

                        @include('partials.photo-items.photo-item1')

                        @include('partials.photo-items.photo-item1')


						<a href="#" class="btn btn-control btn-more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>

					</div>

				</div>

				<div class="tab-pane active" id="album-page" role="tabpanel">

					<div class="photo-album-wrapper">

						<div class="photo-album-item-wrap col-4-width" >
                            @include('partials.photo-album-items.photo-album-item-create')
						</div>

						<div class="photo-album-item-wrap col-4-width">
                            @include('partials.photo-album-items.photo-album-item1')
						</div>

						<div class="photo-album-item-wrap col-4-width">
                            @include('partials.photo-album-items.photo-album-item1')
						</div>

						<div class="photo-album-item-wrap col-4-width">
                            @include('partials.photo-album-items.photo-album-item1')
						</div>

						<div class="photo-album-item-wrap col-4-width">
                            @include('partials.photo-album-items.photo-album-item1')
						</div>

						<div class="photo-album-item-wrap col-4-width">
                            @include('partials.photo-album-items.photo-album-item1')
						</div>

						<div class="photo-album-item-wrap col-4-width">
                            @include('partials.photo-album-items.photo-album-item1')
						</div>

						<div class="photo-album-item-wrap col-4-width">
                            @include('partials.photo-album-items.photo-album-item1')
						</div>

					</div>

				</div>
			</div>

		</div>
	</div>
</div>

@endsection
