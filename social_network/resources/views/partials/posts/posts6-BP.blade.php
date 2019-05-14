<?php use Carbon\Carbon;?>
<article class="hentry post">

    <div class="post__author author vcard inline-items">
        <img src="/{{$post->user->profile->avatar_path}}" alt="author">

        <div class="author-date">
            <a class="h6 post__author-name fn" href="{{route('profile', ['id' => $post->user->id])}}">{{$post->user->last_name}} {{$post->user->first_name}}</a>
            <div class="post__date">
                <time class="published" >
                    <?php
                        Carbon::setLocale('vi');
                        $date_post = $post->created_at;
                        $now = Carbon::now('Asia/Ho_Chi_Minh');
                        $result = $date_post->diffForHumans($now);
                        echo $result;
                    ?>
                </time>
            </div>
        </div>
        @if($post->user->id==Auth::user()->id)
            <div class="more">
                <svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                <ul class="more-dropdown">
                    <li>
                        <a href="{{route('get-edit-post',['pid'=>$post->id])}}">Chỉnh sửa</a>
                    </li>
                    <li>
                        <a href="{{route('delete-post',['pid'=>$post->id])}}">Xóa</a>
                    </li>
                </ul>
            </div>
        @endif

    </div>

    <p>{{$post->content}}</p>

    <div class="post-additional-info inline-items">

        <a href="#" class="post-add-icon inline-items" >
            <svg class="olymp-heart-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-heart-icon')}}"></use></svg>
            <span id="like_numb{{$post->id}}">
                <?php
                    $numb = 0;
                    foreach ($post->likes as $like) {
                        $numb ++;
                    }
                    echo $numb;
                ?>
            </span>
        </a>

        <ul class="friends-harmonic" id="like-item-{{$post->id}}">
             @foreach($post->likes as $like)
                <li id="item{{$like->user_id}}">
                    <a>
                        <img src="/{{$like->user->profile->avatar_path}}" alt="friend">
                    </a>
                </li>
            @endforeach
        </ul>


        <div class="comments-shared">
            <a href="#" class="post-add-icon inline-items" >
                <svg class="olymp-speech-balloon-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-speech-balloon-icon')}}"></use></svg>
                <span id="comment_numb{{$post->id}}">
                    <?php
                        $numb = 0;
                        foreach ($post->comment as $comment) {
                            $numb ++;
                        }
                        echo $numb;
                    ?>
                </span>
            </a>
        </div>
    </div>

    <div class="control-block-button post-control-button">

        <a href="#" class="btn btn-control like" id="{{$post->id}}" data-postid="{{$post->id}}"style="
            @if(!empty($post->likes))
                @foreach($post->likes as $like)
                    @if($like->user_id == Auth::id())
                        background-color:#ff5e3e;

                    @endif
                @endforeach
            @else
               background-color:#9a9fbf;
            @endif
        ">
            <svg class="olymp-like-post-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-like-post-icon')}}"></use></svg>
        </a>
    </div>

</article>
