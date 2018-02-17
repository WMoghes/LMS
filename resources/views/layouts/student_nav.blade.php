{{--<li><a href="{{ route('search') }}">Search</a></li>--}}
{{--<li><a href="{{ route('my_list') }}">List Books</a></li>--}}
{{--<li><a href="{{ route('edit_profile', Auth::user()->id) }}">My Profile</a></li>--}}

<li class="active"><a href="{{ route('search') }}"><span>Search</span></a></li>
<li><a href="{{ route('my_list') }}"><span>List Books</span></a></li>
<li><a href="{{ route('edit_profile', Auth::user()->id) }}"><span>My Profile</span></a></li>