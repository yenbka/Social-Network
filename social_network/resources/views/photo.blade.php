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
					<div class="h6 title">{{"Ảnh của ".$user->first_name}}</div>
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
				<div class="tab-pane active" id="album-page" role="tabpanel">
					<div class="photo-album-wrapper">
						@foreach($photos as $photo)
							<div class="photo-album-item-wrap col-4-width">
								@include('partials.photo-album-items.photo-album-item1')
							</div>
						@endforeach
					</div>

				</div>
			</div>

		</div>
	</div>
</div>

@endsection
