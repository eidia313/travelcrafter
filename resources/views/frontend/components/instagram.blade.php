<div class="container">
  <div class="row">
    @foreach($instagram as $i)
    <div class="col-md-3">
      <a href="https://www.instagram.com/{{$i->user->username}}" target="_blank" class="instagram__collage">
        <img src="{{$i->images->low_resolution->url}}" alt="{{$i->user->full_name}}">
      </a>
    </div>
    @endforeach
  </div>

</div>
