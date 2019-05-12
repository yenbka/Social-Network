//created by ngavuong

function previewFile(inputId,imgId){
    var preview = document.querySelector(imgId); //selects the query named img
    var file    = document.querySelector(inputId).files[0]; //sames as here
    var reader  = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
        $('.thumbnail_container').css('display','block');
        $('.close_thumbnail').css('display','block');
    }

    if (file) {
        reader.readAsDataURL(file); //reads the data as a URL

    } else {
        preview.src = "";
    }
}

function closeThumbnail(inputId,imgId){
    $(imgId).src="";
    document.querySelector(inputId).value = null;
    $('.thumbnail_container').css('display','none');
    $('.close_thumbnail').css('display','none');
}