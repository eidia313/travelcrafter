<header class="video">
    <div class="video__container">
      <div class="video__overlay">

        <div class="video__welcome mt-auto container">
          <h1>Welcome to High Country</h1>
          <h3>We help travel enthusiast find their adventure</h3>
        </div>
      </div>
        <div class="filter"></div>
        <video autoplay loop class="fillWidth">
            <source src="{{url('storage/images')}}/{{$settings->videomp}}" type="video/mp4" />
            <source src="{{url('storage/images')}}/{{$settings->videowebm}}" type="video/webm" />
        </video>
        <div class="poster hidden">
            <img src="{{url('storage/images')}}/Mt_Baker.jpg" alt="Video">
        </div>
    </div>
</header>
