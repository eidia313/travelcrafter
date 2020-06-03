@extends('frontend.layouts.app')
@section('pageTitle', isset($page->title) ? $page->title : '')
@section('content')
    <section class="content-area p-5" >
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>{{ $page->title }}</h3>
                    @if(!empty($page->image))
                        <img src="{{ asset('storage/images/'.$page->image) }}"  class="img-fluid" alt="{{$page->title}}" width="100%">
                    @endif
                    <div class="card">
                        <div class="card-body">
                            {!! $page->description !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@stop

