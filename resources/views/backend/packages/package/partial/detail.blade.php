<div class="form-group" >
  {!! Form::label('Title') !!}
  {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Enter Title...']) !!}
</div>
<div class="form-group" >
  {!! Form::label('Description') !!}
  {!! Form::textarea('description', null, ['class'=>'form-control editor', 'placeholder'=>'Package Introduction...']) !!}
</div>
<div class="form-group">
    {!! Form::label('Activity') !!}
    {!! Form::select('activity_id', $activity, null, ['class'=> 'form-control']) !!}
    @if($errors)
    <span class="text-danger"><i>{{$errors->first('activity_id')}}</i></span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('Difficulty') !!}
    {!! Form::select('difficulty_id', $difficulty, null, ['class'=> 'form-control']) !!}
    @if($errors)
    <span class="text-danger"><i>{{$errors->first('difficulty_id')}}</i></span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('Region') !!}
    {!! Form::select('region_id', $region, null, ['class'=> 'form-control']) !!}
    @if($errors)
    <span class="text-danger"><i>{{$errors->first('region_id')}}</i></span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('Destination') !!}
    {!! Form::select('country_id', $country, null, ['class'=> 'form-control']) !!}
    @if($errors)
    <span class="text-danger"><i>{{$errors->first('country_id')}}</i></span>
    @endif
</div>
<div class="form-group">
  <?php $name = Route::currentRouteName();?>
  @if($name == 'package.edit')
    @if($package->cover_image)
    <div class="cover_image">
      <img id="show_cover_image" src="{{URL::to('/storage/images/'.$package->cover_image)}}" alt="{{$package->title}}" width="200">
    </div>
    @endif
  @endif

  {!! Form::label('Cover Image') !!}
  {!! Form::file('cover_image', ['id' => 'cover_image'], null ) !!}

  @if($name == 'package.edit')
  @section('js')
    @parent
    <script type="text/javascript">

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        console.log(reader);
        reader.onload = function(e) {
          $('#show_cover_image').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
      }

      $("#cover_image").change(function() {
        readURL(this);
      });
    </script>
  @endsection
  @endif
</div>
<div class="form-group">
    {!! Form::label('Best Selling') !!}
    {!! Form::checkbox('isBestSelling', null) !!}
</div>
<div class="form-group">
    {!! Form::label('Status') !!}
    {!! Form::select('status', $status, null, ['class'=> 'form-control']) !!}
</div>
