@extends('frontend.layouts.app')
@section('pageTitle', 'FAQs')
@section('content')
<section class="page__header d-flex align-items-center justify-content-center text-center">
  <img src="{{url('frontend/images/')}}/abouthct.jpg" class="page__image" alt="About High Country">
  <h1>FAQs</h1>
</section>
<section class="faq__main">
  <div class="container">
    <div id="faq__accor" class="accordion">
      @foreach($faq as $k=>$i)
        <div class="faq__list">
          <div class="faq__question" data-toggle="collapse" data-target="#{{str_slug($i['question'])}}" aria-expanded="{{$k == 0 ? 'true':'false'}}">
            <span>{{$i['question']}}</span>
          </div>
          <div id="{{str_slug($i['question'])}}" class="faq__answer collapse {{$k == 0 ? 'show':''}}" data-parent="#faq__accor">
            <div class="faq__answer--wrap">
              {!! $i['answer'] !!}
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
