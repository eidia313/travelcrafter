@extends('backend.layouts.app')
@section('pageTitle', 'Gallery')

@section('content')
<div class="main">
    <div class="row m-0">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active"><a href="/">Dashboard</a> </li>
            <li class="active"><a href="{{route('package.index')}}">Packages</a> </li>
            <li class="active"><a href="{{route('gallery.index',$packageId)}}">Gallery</a> </li>
        </ol>
    </div>
    <!--/.row-->

    @include('partials.messages')

    <div class="row m-0">
        <div class="col-lg-12 p-0">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Gallery</div>
                    <form role="form" method="post" action="{{route('gallery.store')}}" enctype="multipart/form-data">
                        {{ csrf_field()}}
                        <input type="hidden" name="package_id" value="{{$packageId}}">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="caption" class="form-control" placeholder="Caption">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label>Upload Image</label>
                                    <input type="file" name="image[]" multiple>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 pull-left">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->
    </div><!-- /.row -->

    <div class="row m-0 pt-2 gallery-img">
        @forelse($galleries as $gallery)
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 mb-20">
            <div class="gallery">
                {{--{{dd($gallery->image)}}--}}
                <img src="{{url('storage/images')}}/{{$gallery->image}}" class="card-img-top"
                    alt="{{$gallery->caption}}" height="250">
                <div class="gallery-body">
                    <h5 class="gallery-title">{{ $package->package_title}}</h5>
                    @if($package->caption)
                    <p class="gallery-text"><strong>Caption: </strong>{{ $gallery->caption }}
                        <br>
                    </p>
                    @endif

                    <div class="btn-group">
                        <form action="{{route('gallery.destroy',$gallery->id)}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn  btn-danger"
                                onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center m-0">
            No Images!
        </p>
        @endforelse
    </div>
    <div class="col-12">
        <div class="pagination-links-be">
            {{$galleries->links()}}

        </div>
    </div>
</div>
@endsection
