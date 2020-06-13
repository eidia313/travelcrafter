@extends('backend.layouts.app')
@section('pageTitle', 'Edit Page')

@section('content')
{!! Form::model($page, [
'method' => 'PUT',
'url' => ['admin/pages', $page->id],
'files'=>true
]) !!}
@include ('backend.pages.partials.form', ['formMode' => 'edit'])
{!! Form::close() !!}
@endsection

@section('js')
<script>
    function changeImage() {
            $('#image').click();
        }
        $('#image').change(function () {
            var imgPath = this.value;
            var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
                readURL(this);
            else
                alert("Please select image file (jpg, jpeg, png).")
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
//              $("#remove").val(0);
                };
            }
        }
        function removeImage() {
            $('#preview').attr('src', '{{ asset('backend/images/noimage.jpg') }}');
//      $("#remove").val(1);
        }
</script>
@endsection
