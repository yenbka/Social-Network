
<!-- Form Hobbies and Interests -->
@if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $err)
            {{$err}}<br />
        @endforeach
    </div>
@endif

@if(!empty($status))
    <div class="alert alert-success">
        {{$status}}
    </div>
@endif
<form method="POST" action="{{action('HobbieController@hobbies_update_info', ['id' => Auth::id()])}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="row">
        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group label-floating">
                <label class="control-label">Sở thích</label>
                <textarea class="form-control" placeholder=""  name="hobbie">{{$hobbies->hobbie}}</textarea>
            </div>
            <div class="form-group label-floating">
                <label class="control-label">Phim ảnh</label>
                <textarea class="form-control" placeholder=""  name="movies">{{$hobbies->movies}}</textarea>
            </div>
        </div>

        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group label-floating">
                <label class="control-label">Sách</label>
                <textarea class="form-control" placeholder=""  name="books">{{$hobbies->books}}</textarea>
            </div>
            <div class="form-group label-floating">
                <label class="control-label">Khác</label>
                <textarea class="form-control" placeholder=""  name="other">{{$hobbies->other}}</textarea>
            </div>

        </div>
        <button class="btn btn-primary btn-lg full-width">Lưu</button>
    </div>
</form>

<!-- ... end Form Hobbies and Interests -->
