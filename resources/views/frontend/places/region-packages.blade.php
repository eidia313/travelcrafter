
    @forelse($regionPackages as $package)
        <li><a href="{{route('fe.singlePackage',$package->slug)}}">{{$package->title}}</a> </li>
    @empty
        <li>No Packages</li>
    @endforelse
