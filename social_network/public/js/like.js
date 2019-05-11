var postId = 0;

var token = $('meta[name="csrf-token"]').attr('content');

// 

$('.like').on('click', function(event) {
    event.preventDefault();
    postId = this.dataset.postid;
    $.ajax({
        
        type: "POST",
        url: '/like/'+ postId,
        data: { _token : token },
        dataType: "json",
        success : function (data){
            var like_item = '<li id="item'+data['uid']+'">';
                like_item += '<a href="#">';
                like_item += '<img src="/';
                like_item += data['avatar'];
                like_item +='"'
                like_item += 'alt="friend">';
                like_item += '</a>';
                like_item += '</li>';


            if(data['index']==0){
                $("#"+postId).css('background-color',"#ff5e3a");
                $("#like-item-"+postId).append(like_item);            
            }
            else{
                $("#"+postId).css('background-color',"#9a9fbf");
                var x =data['uid'].toString();
                $("#item"+x).remove();
               
            }
            $("#like_numb"+postId).html(data['numb']);

        }
    })
    .done(function(){
        console.log('sucess');
    })
    .fail(function(){
        console.error();
    })

       
});



$('.comment').on('click', function(event) {
    event.preventDefault();
    postId = this.dataset.postid;
    var content = $("#comment-content"+postId).val();  
    $.ajax({
        
        type: "POST",
        url: '/comment/'+ postId,
        data: { content: content, _token : token },
        dataType: "json",
        success : function (data){
            var comment_item = '<li class="comment-item">';
                comment_item += '<div class="post__author author vcard inline-items">';
                comment_item += '<img src="/';
                comment_item += data['avatar'];
                comment_item += '" alt="author">';

                comment_item += '<div class="author-date">';
                comment_item += '<a class="h6 post__author-name fn" href="02-ProfilePage.html">';
                comment_item += data['name'];
                comment_item += '</a>';
                comment_item += '<div class="post__date">';
                comment_item += '<time class="published" >';
                comment_item += data['time'] ;
                comment_item += '</time>';
                comment_item += '</div>';
                comment_item += '</div>';

                comment_item += '<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>';

                comment_item += '</div>';

                comment_item += '<p>';
                comment_item += data['content'];
                comment_item += '</p>';

            comment_item += '</li>';
            $("#comment-content"+postId).val("");
            $("#comment-"+postId).append(comment_item);
            $("#comment_numb"+postId).html(data['numb']);

        }
    })
    .done(function(){
        console.log('sucess');
    })
    .fail(function(){
        console.error();
    })

       
});




