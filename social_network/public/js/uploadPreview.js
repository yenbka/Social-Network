 //created by ngavuong

 function previewFile(inputId,imgId){
     var preview = document.querySelector(imgId); //selects the query named img
     var files    = document.querySelector(inputId).files; //sames as here
     updateFiles(files);
    

     // if (files) {
     //     reader.readAsDataURL(files); //reads the data as a URL

     // } else {
     //     preview.src = "";
     // }
}


function updateFiles(files) {
    $('.thumb_div').empty();
    $.each(files, function(i, file){
        var reader  = new FileReader();
         reader.readAsDataURL(file);
         reader.onloadend = function (e) {
             // preview.src = reader.result;
             // $('.thumbnail_container').css('display','block');
             // $('.close_thumbnail').css('display','block');onclick="closeThumbnail('#imagefile','#thumbnail1')"
             var thumb_item = '<div class="thumbnail_container" id="item'+i+'">'+
             '<img src="'+e.target.result+'" id="thumbnail1" class="thumbnail" width="100" height="100">'+
             '<a href="#" class="close_thumbnail" onclick="closeThumbnail('+"'#imagefile',"+i+')"'+'>X</a>'+
             '</div>';
                                
                $('.thumb_div').append(thumb_item);
         }
    });
}


function closeThumbnail(inputId,i){
    //$(imgId).src="";
    $("#item"+i).remove();


}