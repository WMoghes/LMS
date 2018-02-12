@if (isset($show))
    <a href="{{ $show }}" class="btn btn-info">Show</a>
@endif

<a href="{{ $edit }}" class="btn btn-primary">Edit</a>
<a href="{{ $remove }}" class="btn btn-danger">Remove</a>

@if (isset($makeAdmin))
    <a href="{{ $makeAdmin }}" class="btn btn-info">Make Admin</a>
@endif