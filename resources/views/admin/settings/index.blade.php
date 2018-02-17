@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Settings Info</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="post" action="{{ route('update_settings') }}">
                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-group{{ $errors->has('delay_cost') ? ' has-error' : '' }}">
                            <label for="delay_cost" class="col-md-4 control-label">Delay Cost</label>

                            <div class="col-md-6">
                                <input id="delay_cost" type="text" class="form-control" name="delay_cost" value="{{ $settings->delay_cost }}"
                                       required>

                                @if ($errors->has('delay_cost'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('delay_cost') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('limit_borrowing') ? ' has-error' : '' }}">
                            <label for="limit_borrowing" class="col-md-4 control-label">Limit Borrowing</label>

                            <div class="col-md-6">
                                <input id="limit_borrowing" type="text" class="form-control" name="limit_borrowing"
                                       value="{{ $settings->limit_borrowing }}" required>

                                @if ($errors->has('limit_borrowing'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('limit_borrowing') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn"></i> Update Settings
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
