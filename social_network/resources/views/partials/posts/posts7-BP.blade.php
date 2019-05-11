<?php use Carbon\Carbon;?>
<article class="hentry post has-post-thumbnail">

    <div class="post__author author vcard inline-items">
        <img src="/{{$profile->avatar_path}}" alt="author">

        <div class="author-date">
            <a class="h6 post__author-name fn" href="#">{{$post->user->last_name}} {{$post->user->first_name}}</a>
            <div class="post__date">
                <time class="published" >
                    <?php
                        $date_post = $post->created_at;
                        $now = Carbon::now('Asia/Ho_Chi_Minh');
                        $result = $date_post->diffForHumans($now);
                        echo $result;
                    ?>
                </time>
            </div>
        </div>

        <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
            <ul class="more-dropdown">
                <li>
                    <a href="{{route('get-edit-post',['pid'=>$post->id])}}">Edit Post</a>
                </li>
                <li>
                    <a href="{{route('delete-post',['pid'=>$post->id])}}">Delete Post</a>
                </li>
                <li>
                    <a href="#">Turn Off Notifications</a>
                </li>
                <li>
                    <a href="#">Select as Featured</a>
                </li>
            </ul>
        </div>

    </div>

    <p>{{$post->content}}</p>

    <div class="post-thumb">
        <img src="/uploads/{{$post->media->link}}" alt="photo">
    </div>

    <div class="post-additional-info inline-items">

        <a href="#" class="post-add-icon inline-items">
            <svg class="olymp-heart-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-heart-icon')}}"></use></svg>
            <span>49</span>
        </a>

        <ul class="friends-harmonic">
            <li>
                <a href="#">
                    <img src="/img/friend-harmonic9.jpg" alt="friend">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/img/friend-harmonic10.jpg" alt="friend">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/img/friend-harmonic7.jpg" alt="friend">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/img/friend-harmonic8.jpg" alt="friend">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/img/friend-harmonic11.jpg" alt="friend">
                </a>
            </li>
        </ul>

        <div class="names-people-likes">
            <a href="#">Jimmy</a>, <a href="#">Andrea</a> and
            <br>47 more liked this
        </div>


        <div class="comments-shared">
            <a href="#" class="post-add-icon inline-items">
                <svg class="olymp-speech-balloon-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-speech-balloon-icon')}}"></use></svg>
                <span>264</span>
            </a>

            <a href="#" class="post-add-icon inline-items">
                <svg class="olymp-share-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-share-icon')}}"></use></svg>
                <span>37</span>
            </a>
        </div>


    </div>

    <div class="control-block-button post-control-button">


        <a href="#" class="btn btn-control like" id="{{$post->id}}" data-postid="{{$post->id}}"style="
            @if(!empty($post->likes))
                @foreach($post->likes as $like)
                    @if($like->user_id == $user->id)
                        background-color:#ff5e3e;
                           
                    @endif
                @endforeach
            @else
               background-color:#9a9fbf;
            @endif
        ">
            <svg class="olymp-like-post-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-like-post-icon')}}"></use></svg>
        </a>

        <a href="#" class="btn btn-control">
            <svg class="olymp-comments-post-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-comments-post-icon')}}"></use></svg>
        </a>

        <a href="#" class="btn btn-control">
            <svg class="olymp-share-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-share-icon')}}"></use></svg>
        </a>

    </div>

</article>
