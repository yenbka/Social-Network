
<!-- News Feed Form  -->

<div class="news-feed-form">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active inline-items" data-toggle="tab" href="#home-1" role="tab" aria-expanded="true">

                <svg class="olymp-status-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-status-icon')}}"></use></svg>

                <span>Trạng thái</span>
            </a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
            <form action="{{route('add-post')}}" method="POST" enctype="multipart/form-data" id="post-form">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="author-thumb">
                    <img src="{{asset($profile->avatar_path)}}" alt="author" height="36px" width="36px">
                </div>
                <div class="form-group with-icon label-floating is-empty">
                    <label class="control-label">Hôm nay bạn như thế nào...</label>
                    <textarea class="form-control" name="text" placeholder=""></textarea>
                </div>
                <div class="thumb_div" >
                    
                </div>
                <div class="add-options-message">
                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD PHOTOS">
                        <svg class="olymp-camera-icon" data-toggle="modal" data-target="#post-photo"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-camera-icon')}}"></use></svg>
                    </a>
                    <button type="submit" class="btn btn-primary btn-md-2">Đăng</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ... end News Feed Form  -->