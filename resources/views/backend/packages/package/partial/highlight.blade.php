<div class="highlights">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::label('Best Season') !!}
                                {!! Form::text('best_season', null, ['class'=>'form-control', 'placeholder'=>'Best
                                Season To Travel'])
                                !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::label('Maximum Altitude') !!}
                                {!! Form::text('altitude', null, ['class'=>'form-control', 'placeholder'=>'Maximum
                                Altitude']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('Checklist Group') !!}
                        {!! Form::select('checklist_group_id', $checkListGroup, null, ['class'=> 'form-control']) !!}
                        @if($errors)
                        <span class="text-danger"><i>{{$errors->first('checklist_group_id')}}</i></span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('Trip Highlights') !!}
                        {!! Form::textarea('trip_highlights', null, ['class'=>'form-control editor',
                        'placeholder'=>'Trip
                        Highlights...']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Accomodation') !!}
                        {!! Form::textarea('accomodation', null, ['class'=>'form-control editor',
                        'placeholder'=>'Accomodation...']) !!}
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-secondary">Update</button>
                        <a href="{{route('package.index')}}" class="btn btn-danger" type="button">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
