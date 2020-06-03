@extends('backend.layouts.app')
@section('pageTitle', 'Edit Group')
@section('content')
    @include('partials.messages')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{route('groups.update',$group->id)}}">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{$group->name}}" class="form-control" placeholder="Group Name" required>
                                </div>
                            </div>
                        </div>
                        <?php
                             $equips = $group->equipments;
                             $array = decodeJsonObjectAsArray($equips);
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    @foreach($categories as $category)
                                      <label>{{$category->name}}</label>
                                      <select  name="equipments[{{str_slug($category->name, '')}}][]" class="form-control js-example-basic-multiple" multiple>
                                      @forelse($equipments as $equipment)
                                        @if($equipment->category_id == $category->id)
                                        @if(array_key_exists(str_slug($category->name, ''), $array))
                                          <option value="{{$equipment->name}}" {{in_array($equipment->name , $array[str_slug($category->name, '')]) ? 'selected': ''}}>{{$equipment->name}}</option>
                                        @else
                                        <option value="{{$equipment->name}}" >{{$equipment->name}}</option>

                                        @endif
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
                                    <button type="submit" class="btn btn-primary ">Update</button>
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
