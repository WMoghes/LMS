@if (isset($show))
    <a href="{{ $show }}" class="btn btn-info">Show</a>
@endif

@if (isset($edit))
    <a href="{{ $edit }}" class="btn btn-primary">Edit</a>
@endif

<a href="{{ $remove }}" class="btn btn-danger">Remove</a>

@if (isset($makeAdmin))
    <a href="{{ $makeAdmin }}" class="btn btn-info">Make Admin</a>
@endif

@if (isset($removeAdmin))
    <a href="{{ $removeAdmin }}" class="btn btn-info">Remove Admin</a>
@endif