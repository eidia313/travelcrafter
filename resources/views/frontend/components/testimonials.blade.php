<section class="testimonial">
  <div class="section-heading text-center">
    <h2>Testimonials</h2>
  </div>
  <div class="container">
    <div class="testimonial__selected">

    </div>
    <div class="row">
      @foreach($testimonials as $testimonial)
        <div class="col-md-4 testimonial__det">
          <div class="video__wrap">
            <iframe width="560" height="215" src="https://www.youtube.com/embed/{{$testimonial->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <h6>{{$testimonial->client_name}}</h6>
          <p>Location: {{$testimonial->client_location}}</p>
          <p>{!! str_limit(strip_tags($testimonial->client_message), 80) !!}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>
