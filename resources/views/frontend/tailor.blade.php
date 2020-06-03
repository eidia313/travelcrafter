@extends('frontend.layouts.app')
@section('pageTitle', 'Tailor Made Trips')
@section('content')
<section class="page__header d-flex flex-column align-items-center justify-content-center text-center">
  <img src="{{url('frontend/images/')}}/tailormade.jpg" class="page__image" alt="Tailor Made Trips">

  <h1>Tailor Made Trips</h1>
</section>
    <main id="main">
        <div id="contact" class="content-area pt-5 ">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @if(count($errors) > 0)
                            <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
                                @foreach($errors->all() as $error)
                                    {{ $error }}<br>
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="card">
                            @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                                    {{ Session::get('success') }}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="card-body">

                                <form action="{{ route('trip.store') }}" method="POST">
                                    @csrf()
                                    <fieldset>
                                        <legend><strong>Trip Information</strong></legend>

                                        <div class="form-group row">
                                            <div class="col-12 col-sm-3 col-md-3">
                                                <label>Where do you want to go?</label>
                                            </div>
                                            <div class="col-12 col-sm-9 col-md-9">
                                                @foreach($destinations as $destination)
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input single-check" type="checkbox" name="destination_id" id="destination-{{ lcfirst($destination->name) }}" value="{{ $destination->id }}">
                                                        <label class="form-check-label" for="destination-{{ lcfirst($destination->name) }}">
                                                            {{ $destination->name }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12 col-sm-3 col-md-3">
                                                <label for="activities">Preferred Activities</label>
                                            </div>
                                            <div class="col-12 col-sm-9 col-md-9">
                                                @foreach($activities as $activity)
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="activity-{{ $activity->id }}" name="activity[]" value="{{ $activity->id }}">
                                                        <label class="form-check-label" for="activity-{{ $activity->id }}">
                                                            {{ $activity->name }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12 col-sm-3 col-md-3">
                                                <label for="dateOfTravel">Approximate Date of Travel</label>
                                            </div>
                                            <div class="col-12 col-sm-9 col-md-9">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <select name="day" id="day" class="form-control">
                                                            <option>Day</option>
                                                            @for($i=1; $i<=31;$i++)
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="month" id="month" class="form-control">
                                                            <option>Month</option>
                                                            @for($i=1; $i<=12;$i++)
                                                                <option class="form-control" value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="year" id="year" class="form-control">
                                                            <option>Year</option>
                                                            @for($i= date('Y')-1; $i<=(date('Y')+1); $i++)
                                                                <option class="form-control" value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12 col-sm-3 col-md-3">
                                                <label for="season">Month/Season</label>
                                            </div>
                                            <div class="col-12 col-sm-9 col-md-9">
                                                <textarea name="season" id="season" class="form-control" rows="3" placeholder="If you have any preferences on particular season or month for your trip, please fill here"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12 col-sm-3 col-md-3">
                                                <label for="season">Duration of Travel</label>
                                            </div>
                                            <div class="col-12 col-sm-9 col-md-9">
                                                <select name="duration" id="duration" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="Less than 7 Days">Less than 7 Days</option>
                                                    <option value="7 Days - 14 Days">7 Days - 14 Days</option>
                                                    <option value="14 Days - 21 Days">14 Days - 21 Days</option>
                                                    <option value="21 Days - 28 Days">21 Days - 28 Days</option>
                                                    <option value="28 Days - 35 Days">28 Days - 35 Days</option>
                                                    <option value="35 Days - 42 Days">35 Days - 42 Days</option>
                                                    <option value="42 Days - 49 Days">42 Days - 49 Days</option>
                                                    <option value="49 Days - 56 Days">49 Days - 56 Days</option>
                                                    <option value="56 Days - 63 Days">56 Days - 63 Days</option>
                                                    <option value="More than 63 Days">More than 63 Days</option>
                                                </select>
                                            </div>
                                        </div>

                                    </fieldset>

                                    <hr>

                                    <fieldset>
                                        <legend><strong>Number of Travellers</strong></legend>

                                        <div class="form-group row">
                                            <div class="col-12 col-sm-3 col-md-3">
                                                <label for="adults">Adults</label>
                                            </div>
                                            <div class="col-12 col-sm-9 col-md-9">
                                                <select name="adults" id="adults" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12 col-sm-3 col-md-3">
                                                <label for="children">Children</label>
                                            </div>
                                            <div class="col-12 col-sm-9 col-md-9">
                                                <select name="children" id="children" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12 col-sm-3 col-md-3">
                                                <label for="hotel_class">Hotel Class</label>
                                            </div>
                                            <div class="col-12 col-sm-9 col-md-9">
                                                <select name="hotel_class" id="hotel_class" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="5 Star Hotel">5 Star Hotel</option>
                                                    <option value="4 Star Hotel">4 Star Hotel</option>
                                                    <option value="3 Star Hotel">3 Star Hotel</option>
                                                    <option value="2 Star Hotel">2 Star Hotel</option>
                                                    <option value="1 Star Hotel">1 Star Hotel</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12 col-sm-3 col-md-3">
                                                <label for="interest">Tell us about your interest?</label>
                                            </div>
                                            <div class="col-12 col-sm-9 col-md-9">
                                                <textarea name="interest" id="interest" class="form-control" rows="3" placeholder="Tell us more about you. What you are particularly interested in; anything that can help us help you."></textarea>
                                            </div>
                                        </div>

                                    </fieldset>
                                    

                                    <hr>

                                    <fieldset>
                                        <legend><strong>Average Fitness Level</strong></legend>

                                        <div class="form-group row">
                                            <div class="col-12 col-sm-12 col-md-12">
                                                <label for="adults">Is there any member visiting Nepal for the first time? If yes tick the box</label>
                                                <input type="checkbox" id="firsttime" name="firsttime" value="true">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <div>
                                                    <label>Select the least fitness level of the members?</label>
                                                </div>
                                                <div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" id="fitness-unfit" name="fitnesslevel" value="unfit">
                                                        <label class="form-check-label" for="fitness-unfit">
                                                            Unfit
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" id="fitness-fairlyfit" name="fitnesslevel" value="fairlyfit">
                                                        <label class="form-check-label" for="fitness-fairlyfit">
                                                            Fairly
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" id="fitness-fit" name="fitnesslevel" value="fit">
                                                        <label class="form-check-label" for="fitness-fit">
                                                            Fit
                                                        </label>
                                                    </div>
                                                </div>    
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <div>
                                                    <label>Is there any members that requires special attention?</label>
                                                </div>
                                                <div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" id="medical-condition" name="specialattn" value="medical-condition">
                                                        <label class="form-check-label" for="medical-condition">
                                                            Medical Condition
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" id="differently-abled" name="specialattn" value="differently-abled">
                                                        <label class="form-check-label" for="differently-abled">
                                                            Differently Abled
                                                        </label>
                                                    </div>
                                                </div>    
                                            </div>
                                        </div>
                                    </fieldset>  
                                    <hr>
                                    <fieldset>
                                        <legend><strong>Personal Information</strong></legend>

                                        <div class="form-group row">
                                            <div class="col-12 col-sm-3 col-md-3">
                                                <label for="title">Title</label>
                                            </div>
                                            <div class="col-12 col-sm-9 col-md-9">
                                                <select name="title" id="title" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="Mr.">Mr.</option>
                                                    <option value="Mrs.">Mrs.</option>
                                                    <option value="Miss">Miss</option>
                                                    <option value="Dr.">Dr.</option>
                                                    <option value="Prof.">Prof.</option>
                                                    <option value="Jr.">Jr.</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12 col-sm-3 col-md-3">
                                                <label for="full_name">Full Name</label>
                                            </div>
                                            <div class="col-12 col-sm-9 col-md-9">
                                                <input type="text" name="full_name" id="full_name" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12 col-sm-3 col-md-3">
                                                <label for="email">Email</label>
                                            </div>
                                            <div class="col-12 col-sm-9 col-md-9">
                                                <input type="email" name="email" id="email" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12 col-sm-3 col-md-3">
                                                <label for="phone">Phone</label>
                                            </div>
                                            <div class="col-12 col-sm-9 col-md-9">
                                                <input type="text" name="phone" id="phone" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12 col-sm-3 col-md-3">
                                                <label for="nationality">Nationality</label>
                                            </div>
                                            <div class="col-12 col-sm-9 col-md-9">
                                                <input type="text" name="nationality" id="nationality" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12 col-sm-3 col-md-3">
                                                <label for="contact_way">Best way to contact you?</label>
                                            </div>
                                            <div class="col-12 col-sm-9 col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input contact_way" type="checkbox" id="email-way" name="contact_way" value="Email">
                                                    <label class="form-check-label" for="email-way">
                                                        Email
                                                    </label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input contact_way" type="checkbox" id="phone-way" name="contact_way" value="Phone">
                                                    <label class="form-check-label" for="phone-way">
                                                        Phone
                                                    </label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input contact_way" type="checkbox" id="skype-way" name="contact_way" value="Skype">
                                                    <label class="form-check-label" for="skype-way">
                                                        Skype
                                                    </label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input contact_way" type="checkbox" id="whatsapp-way" name="contact_way" value="Whatsapp">
                                                    <label class="form-check-label" for="whatsapp-way">
                                                        Whatsapp
                                                    </label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input contact_way" type="checkbox" id="viber-way" name="contact_way" value="Viber">
                                                    <label class="form-check-label" for="viber-way">
                                                        Viber
                                                    </label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12 col-sm-3 col-md-3">
                                                <label for="find_us">How did you find us?</label>
                                            </div>
                                            <div class="col-12 col-sm-9 col-md-9">
                                                <select name="find_us" id="find_us" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="Search Engine">Search Engine</option>
                                                    <option value="Recommended by friends">Recommended by friends</option>
                                                    <option value="Facebook">Facebook</option>
                                                    <option value="Trip Advisor">Trip Advisor</option>
                                                    <option value="Newsletter">Newsletter</option>
                                                    <option value="Others">Others</option>
                                                </select>

                                            </div>
                                        </div>

                                    </fieldset>

                                    <div class="mt-2">
                                        <input type="submit" value="submit" class="btn btn-primary btn-block col-md-2">
                                    </div>


                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
@section('js')
    <script>
      $(document).ready(function(){
            $('.single-check').click(function() {
                $('.single-check').not(this).prop('checked', false);
            });
          $('.contact_way').click(function() {
              $('.contact_way').not(this).prop('checked', false);
          });
        });
    </script>
@endsection
