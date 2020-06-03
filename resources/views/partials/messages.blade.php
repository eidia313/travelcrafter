@if(count($errors)>0)

    <div class="alert alert-danger" role="alert" style="width: 100%; height: 100%;">
        <strong>Errors:</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@endif

@if(session('success'))

    <div class="alert alert-success" style="width: 100%; height:55px;">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session('danger'))

    <div class="alert alert-danger" style="width: 100%; height: 100%;">
        {{session('danger')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<!-- @if($errors->has('title'))
    <div class="invalid-feedback">
        {{ $errors->first('title') }}
            </div>
        @endif -->