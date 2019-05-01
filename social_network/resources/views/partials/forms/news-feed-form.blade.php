
<!-- News Feed Form  -->

<div class="news-feed-form">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active inline-items" data-toggle="tab" href="#home-1" role="tab" aria-expanded="true">

                <svg class="olymp-status-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use></svg>

                <span>Status</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link inline-items" data-toggle="tab" href="#profile-1" role="tab" aria-expanded="false">

                <svg class="olymp-multimedia-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-multimedia-icon"></use></svg>

                <span>Multimedia</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link inline-items" data-toggle="tab" href="#blog" role="tab" aria-expanded="false">
                <svg class="olymp-blog-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-blog-icon"></use></svg>

                <span>Blog Post</span>
            </a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
            <form>
                <div class="author-thumb">
                    <img src="{{asset('images/author-page.jpg')}}" alt="author">
                </div>
                <div class="form-group with-icon label-floating is-empty">
                    <label class="control-label">Share what you are thinking here...</label>
                    <textarea class="form-control" placeholder=""></textarea>
                </div>
                <div class="add-options-message">
                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD PHOTOS">
                        <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo"><use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use></svg>
                    </a>
                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
                        <svg class="olymp-computer-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>
                    </a>

                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD LOCATION">
                        <svg class="olymp-small-pin-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-small-pin-icon"></use></svg>
                    </a>

                    <button class="btn btn-primary btn-md-2">Post Status</button>
                    <button   class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>

                </div>

            </form>
        </div>

        <div class="tab-pane" id="profile-1" role="tabpanel" aria-expanded="true">
            <form>
                <div class="author-thumb">
                    <img src="{{asset('images/author-page.jpg')}}" alt="author">
                </div>
                <div class="form-group with-icon label-floating is-empty">
                    <label class="control-label">Share what you are thinking here...</label>
                    <textarea class="form-control" placeholder=""  ></textarea>
                </div>
                <div class="add-options-message">
                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD PHOTOS">
                        <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo"><use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use></svg>
                    </a>
                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
                        <svg class="olymp-computer-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>
                    </a>

                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD LOCATION">
                        <svg class="olymp-small-pin-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-small-pin-icon"></use></svg>
                    </a>

                    <button class="btn btn-primary btn-md-2">Post Status</button>
                    <button   class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>

                </div>

            </form>
        </div>

        <div class="tab-pane" id="blog" role="tabpanel" aria-expanded="true">
            <form>
                <div class="author-thumb">
                    <img src="{{asset('images/author-page.jpg')}}" alt="author">
                </div>
                <div class="form-group with-icon label-floating is-empty">
                    <label class="control-label">Share what you are thinking here...</label>
                    <textarea class="form-control" placeholder=""  ></textarea>
                </div>
                <div class="add-options-message">
                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD PHOTOS">
                        <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo"><use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use></svg>
                    </a>
                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
                        <svg class="olymp-computer-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>
                    </a>

                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD LOCATION">
                        <svg class="olymp-small-pin-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-small-pin-icon"></use></svg>
                    </a>

                    <button class="btn btn-primary btn-md-2">Post Status</button>
                    <button   class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>

                </div>

            </form>
        </div>
    </div>
</div>

<!-- ... end News Feed Form  -->