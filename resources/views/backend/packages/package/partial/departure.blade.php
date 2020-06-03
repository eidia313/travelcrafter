@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

<?php
if(Route::current()->getName() == 'package.edit'){
   $departures = $package->departures;
   $array = decodeJsonObjectAsArray($departures);
   if(!empty($array)){
   foreach($array as $a){
?>
<div class="departures">
    <div class="form-group" >
      {!! Form::label('Departure Date') !!}
      {!! Form::text('departures[departure_day][]', $a['departure_day'], ['class'=>'form-control datepicker', 'placeholder'=>'Date', 'autocomplete'=>'off']) !!}
    </div>
    <button type="button" class="remove-departurerow" class="btn btn-danger" name="button">Remove</button>
</div>
<?php
}
   }
}else{
?>
<div class="departures">
    <div class="form-group" >
      {!! Form::label('Departure Date') !!}
      {!! Form::text('departures[departure_day][]', null, ['class'=>'form-control datepicker', 'placeholder'=>'Date', 'autocomplete'=>'off']) !!}
    </div>

    <button type="button" class="remove-departurerow" class="btn btn-danger" name="button">Remove</button>
</div>
<?php
}
?>
<div class="empty-departures">
    <div class="form-group" >
      {!! Form::label('Departure Date') !!}
      {!! Form::text('departures[departure_day][]', null, ['class'=>'form-control datepicker', 'placeholder'=>'Date', 'autocomplete'=>'off']) !!}
    </div>
    <button type="button" class="remove-departurerow" class="btn btn-danger" name="button">Remove</button>
</div>

@section('js')
@parent
  <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($){
      $('#add-departurerow').on('click', function() {
        console.log('Add Departure Clicked');
        var deprow = $( '.empty-departures' ).clone(true);
        deprow.removeClass('empty-departures');
        deprow.insertBefore( '.empty-departures' );
        deprow.addClass( 'departures' );
        return false;
      });

      $( '.remove-departurerow' ).on('click', function() {
        $(this).parents('.departures').remove();
        return false;
      });

      $('body').on('focus',".datepicker", function(){
        $(this).datepicker();
    });
    });
  </script>
@endsection
