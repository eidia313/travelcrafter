<header id="nav">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('storage/images')}}/{{$settings->logo}}" height="46" alt="High Country Trekking"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse my-lg-0 " id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('activity')}}">Activities</a>
            <div class="nav__fulldrop">
              <div class="container">
                <ul class="d-flex align-items-center">
                  @foreach($activities as $a)
                  <li>
                    <a href="{{url('activity')}}/{{$a->slug}}">
                      <span class="nav__img">
                        <img src="{{url('storage/images')}}/{{$a->image}}" alt="">
                      </span>
                      <span>{{$a->name}}</span>
                    </a>
                  </li>
                  @endforeach
                  <!-- <li>
                    <a href="#">
                      <span class="nav__img">
                        <img src="https://via.placeholder.com/150x80" alt="">
                      </span>
                      <span>Leisure Trips</span>
                    </a>
                  </li> -->
                  <li>
                    <a href="{{url('tailor-made-trip')}}">
                      <span class="nav__img">
                        <img src="{{url('frontend/images/')}}/tailormade.jpg" alt="">
                      </span>
                      <span>Tailor Made Trip</span>
                    </a>
                  </li>

                </ul>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">High Country</a>
            <div class="nav__fulldrop">
              <div class="container">
                <ul class="d-flex align-items-center">
                  <li>
                    <a href="{{url('about-us')}}">
                      <span class="nav__img">
                        <img src="{{url('frontend/images/')}}/abouthct.jpg" alt="About Us">
                      </span>
                      <span>About Us</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{url('teams')}}">
                      <span class="nav__img">
                        <img src="{{url('frontend/images/')}}/hctteam.jpg" alt="Our Team">
                      </span>
                      <span>Our Team</span>
                    </a>
                  </li>
                  <!-- <li>
                    <a href="{{url('about-us')}}">
                      <span class="nav__img">
                        <img src="https://via.placeholder.com/150x80" alt="">
                      </span>
                      <span>Our Partners</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{url('about-us')}}">
                      <span class="nav__img">
                        <img src="https://via.placeholder.com/150x80" alt="">
                      </span>
                      <span>Social Welfare</span>
                    </a>
                  </li> -->
                </ul>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('services')}}">Services</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="{{url('activity')}}">Social Welfare</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('activity')}}">Blog</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="{{url('contact')}}">Contact</a>
          </li>
        </ul>
        <ul class="navbar-searchsocial d-flex align-items-center ml-auto">
          <li>
            <a href="https://www.instagram.com/{{$settings->instagram}}" target="_blank">
              <i class="hct-instagram"></i>
            </a>
          </li>
          <li>
            <a href="https://www.facebook.com/{{$settings->facebook}}" target="_blank">
              <i class="hct-facebook"></i>
            </a>
          </li>
          <li>
            <a href="https://www.youtube.com/{{$settings->twitter}}" target="_blank">
              <i class="hct-youtube"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
