@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading"></div>
                    @if(Auth::check())
                      <a href="/contacts">All Contacts</a>
                    @endif
            </div>
            @if(Auth::guest())
              <a href="/login" class="btn btn-info"> Login >></a>
            @endif
        </div>
    </div>
</div>
@endsection