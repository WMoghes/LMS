@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Book</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="post" action="{{ route('update_book') }}">
                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                        <label for="code" class="col-md-4 control-label">Book Code</label>

                        <div class="col-md-6">
                            <input id="code" type="text" class="form-control" name="code" value="{{ CheckVariables($book->code) }}">

                            @if ($errors->has('code'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title" class="col-md-4 control-label">Book Title</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" value="{{ CheckVariables($book->title) }}">

                            @if ($errors->has('title'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('author_name') ? ' has-error' : '' }}">
                        <label for="author_name" class="col-md-4 control-label">Author Name</label>

                        <div class="col-md-6">
                            @if (isset($authors) && count($authors))
                                <select class="form-control" id="author_name" name="author_name">
                                    @foreach($authors as $author)
                                        <option {{ CheckVariables($book->author_id) == $author->author_id ? 'selected' : null }}
                                                value="{{ $author->id }}">
                                            {{ $author->author_name }}
                                        </option>
                                    @endforeach
                                </select>
                            @endif

                            @if ($errors->has('author_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('author_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('category_name') ? ' has-error' : '' }}">
                        <label for="category_name" class="col-md-4 control-label">Category Name</label>

                        <div class="col-md-6">
                            @if (isset($categories) && count($categories))
                                <select class="form-control" id="category_name" name="category_name">
                                    @foreach($categories as $category)
                                        <option {{ CheckVariables($book->category_id) == $category->id ? 'selected' : null }}
                                                value="{{ $category->id }}">
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            @endif

                            @if ($errors->has('category_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('category_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label for="price" class="col-md-4 control-label">Book Price</label>

                        <div class="col-md-6">
                            <input id="price" type="text" class="form-control" name="price" value="{{ CheckVariables($book->price) }}">

                            @if ($errors->has('price'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                        <label for="quantity" class="col-md-4 control-label">Quantity</label>

                        <div class="col-md-6">
                            <input id="quantity" type="text" class="form-control" name="quantity" value="{{ CheckVariables($book->quantity) }}">

                            @if ($errors->has('quantity'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('edition') ? ' has-error' : '' }}">
                        <label for="edition" class="col-md-4 control-label">Edition</label>

                        <div class="col-md-6">
                            <input id="edition" type="text" class="form-control" name="edition" value="{{ CheckVariables($book->edition) }}">

                            @if ($errors->has('edition'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('edition') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('publication') ? ' has-error' : '' }}">
                        <label for="publication" class="col-md-4 control-label">Publication</label>

                        <div class="col-md-6">
                            <input id="publication" type="text" class="form-control" name="publication"
                                   value="{{ CheckVariables($book->publication) }}">

                            @if ($errors->has('publication'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('publication') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        <label for="quantity" class="col-md-4 control-label">Status</label>

                        <div class="col-md-6">
                            <input id="status" type="text" class="form-control" name="status"
                                   value="{{ CheckVariables($book->status) }}">

                            @if ($errors->has('status'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-4">
                            <img id="book_image"
                                 src="{{ CheckVariables($book->image_name) ? getImage($book->image_name) : getDefaultImage() }}"
                                 alt="Your-image" height="300"
                                 width="300" class="img-responsive">
                        </div>
                        <div class="col-md-4">
                            <label class="btn btn-primary">
                                Upload Your Image <input type="file" id="imageUpload" name="book_image" style="display: none">
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn"></i> Update Info
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('imageUpload').onchange = function (event) {
            'use strict';
            var reader = new FileReader();
            reader.onload = function () {
                var dataURL = reader.result;
                document.getElementById('book_image').src = dataURL;
            };
            console.log(event.target.files[0]);
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endsection
