<?php
if(Route::current()->getName() == 'package.edit'){
   $itinerary = $package->itenerary;
   $array = decodeJsonObjectAsArray($itinerary);
   foreach($array as $a){
?>
<div class="itinerary">
    <div class="form-group">
        <div class="itinerary__short">
          <div class="d-flex">
            {!! Form::text('itenerary[day][]', $a['day'], ['class'=>'form-control itinerary__day', 'placeholder'=>'Day']) !!}
            {!! Form::text('itenerary[title][]', $a['title'], ['class'=>'form-control itinerary__title', 'placeholder'=>'Itinerary Title']) !!}
          </div>
        </div>
    </div>
    <div class="form-group">
      {!! Form::text('itenerary[mode][]', $a['mode'], ['class'=>'form-control itinerary__mode', 'placeholder'=>'Mode of Travel']) !!}
    </div>
    <div class="form-group">
        <div class="itinerary__short">
          <div class="d-flex">
            {!! Form::text('itenerary[duration][]', $a['duration'], ['class'=>'form-control itinerary__duration', 'placeholder'=>'Duration']) !!}
            {!! Form::text('itenerary[altitude][]', $a['altitude'], ['class'=>'form-control itinerary__altitude', 'placeholder'=>'Altitude']) !!}
          </div>
        </div>
    </div>
    <button type="button" class="remove-row btn btn-danger" class="btn btn-danger" name="button">Remove</button>
</div>
<?php
   }
}else{
?>
<div class="itinerary">
    <div class="form-group">
        <div class="itinerary__short">
          <div class="d-flex">
            {!! Form::text('itenerary[day][]', null, ['class'=>'form-control itinerary__day', 'placeholder'=>'Day']) !!}
            {!! Form::text('itenerary[title][]', null, ['class'=>'form-control itinerary__title', 'placeholder'=>'Itinerary Title']) !!}
          </div>
        </div>
    </div>
    <div class="form-group">
       {!! Form::text('itenerary[mode][]', null, ['class'=>'form-control itinerary__mode', 'placeholder'=>'Mode of Travel']) !!}
    </div>
    <div class="form-group">
        <div class="itinerary__short">
          <div class="d-flex">
            {!! Form::text('itenerary[duration][]', null, ['class'=>'form-control itinerary__duration', 'placeholder'=>'Duration']) !!}
            {!! Form::text('itenerary[altitude][]', null, ['class'=>'form-control itinerary__altitude', 'placeholder'=>'Altitude']) !!}
          </div>
        </div>
    </div>
    <button type="button" class="remove-row btn btn-danger" class="btn btn-danger" name="button">Remove</button>
</div>
<?php
}
?>
<div class="empty-itinerary">
    <div class="form-group">
        <div class="itinerary__short">
          <div class="d-flex">
            {!! Form::text('itenerary[day][]', null, ['class'=>'form-control itinerary__day', 'placeholder'=>'Day']) !!}
            {!! Form::text('itenerary[title][]', null, ['class'=>'form-control itinerary__title', 'placeholder'=>'Itinerary Title']) !!}
          </div>
        </div>
    </div>
    <div class="form-group">
        {!! Form::text('itenerary[mode][]', null, ['class'=>'form-control itinerary__mode', 'placeholder'=>'Mode of Travel']) !!}
    </div>
    <div class="form-group">
        <div class="itinerary__short">
          <div class="d-flex">
            {!! Form::text('itenerary[duration][]', null, ['class'=>'form-control itinerary__duration', 'placeholder'=>'Duration']) !!}
            {!! Form::text('itenerary[altitude][]', null, ['class'=>'form-control itinerary__altitude', 'placeholder'=>'Altitude']) !!}
          </div>
        </div>
    </div>
    <button type="button" class="remove-row btn btn-danger" class="btn btn-danger" name="button">Remove</button>
</div>

@section('js')
@parent
  <script type="text/javascript">
    jQuery(document).ready(function( $ ){
      $('#add-row').on('click', function() {
        var row = $( '.empty-itinerary' ).clone(true);
        row.removeClass('empty-itinerary');
        row.insertBefore( '.empty-itinerary' );
        row.addClass( 'itinerary' );
        return false;
      });

      $( '.remove-row' ).on('click', function() {
        $(this).parents('.itinerary').remove();
        return false;
      });
    });
  </script>
@endsection
