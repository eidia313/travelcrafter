//Featured Image
function changeImage() {
    $("#image").click();
}
$("#image").change(function () {
    var imgPath = this.value;
    var ext = imgPath.substring(imgPath.lastIndexOf(".") + 1).toLowerCase();
    if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
        readURL(this);
    else alert("Please select image file (jpg, jpeg, png).");
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.readAsDataURL(input.files[0]);
        reader.onload = function (e) {
            $("#preview").attr("src", e.target.result);
        };
    }
}
function removeImage() {
    $("#preview").attr(
        "src",
        window.location.origin + "/backend/images/noimage.jpg"
    );
}

//Thumbnail
function changeThumb() {
    $("#thumb").click();
}
$("#thumb").change(function () {
    var imgPath = this.value;
    var ext = imgPath.substring(imgPath.lastIndexOf(".") + 1).toLowerCase();
    if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
        readThumbURL(this);
    else alert("Please select image file (jpg, jpeg, png).");
});
function readThumbURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.readAsDataURL(input.files[0]);
        reader.onload = function (e) {
            $("#preview-thumb").attr("src", e.target.result);
        };
    }
}
function removeThumb() {
    $("#preview-thumb").attr(
        "src",
        window.location.origin + "/backend/images/noimage.jpg"
    );
}
