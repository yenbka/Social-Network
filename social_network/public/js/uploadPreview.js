//created by ngavuong

function previewFile(inputId,imgId){
    let preview = document.querySelector(imgId); //selects the query named img
    let files    = document.querySelector(inputId).files; //sames as here
    console.log(files);
    updateFiles(files);
}

function closeThumbnail(inputId,i){
    $("#item"+i).remove();
}

function updateFiles(files) {
    $('.thumb_div').empty();
    $.each(files, function(i, file){
        let reader  = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadend = function (e) {
            var thumb_item = '<div class="thumbnail_container" id="item'+i+'">'+
                '<img src="'+e.target.result+'" id="thumbnail1" class="thumbnail" width="100" height="100">'+
                '<a href="#" class="close_thumbnail" onclick="closeThumbnail('+"'#imagefile',"+i+')"'+'>X</a>'+
                '</div>';

            $('.thumb_div').append(thumb_item);
        };
    });
}