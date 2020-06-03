@extends('backend.layouts.app')
@section('pageTitle', 'Create Group')
@section('content')

    @include('partials.messages')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <form method="post" action="{{route('groups.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Group Name" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    @foreach($categories as $category)
                                      <label>{{$category->name}}</label>
                                      <select  name="equipments[{{str_slug($category->name, '')}}][]" class="form-control js-example-basic-multiple" multiple>
                                      @forelse($equipments as $equipment)
                                        @if($equipment->category_id == $category->id)
                                          <option value="{{$equipment->name}}" {{ old('destination_id') == $equipment->id ? 'selected' : '' }}>{{$equipment->name}}</option>
                                        @endif
                                        @empty
                                            <option value="">Zero Equiments Available!</option>
                                      @endforelse
                                      </select>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary ">Submit</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('backend/js/select2.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
