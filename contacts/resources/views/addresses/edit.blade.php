@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading"></div>
                <h2>Update Address</h2>
                    @if(Auth::check())
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <br /> 
                    @endif
                    <form method="post" action="{{ route('addresses.update', $address->id) }}">
                        @method('PATCH') 
                        @csrf
                        <div class="form-group">    
                            <label for="type">Address Type: *</label> <br />
                            <input type="radio" name="type" value="work" checked="checked"> Work<br>
                            <input type="radio" name="type" value="postal"> Postal<br>
                        </div>
                        <div class="form-group">
                            <label for="street_address">Street Address</label>
                            <input type="text" class="form-control" name="street_address" value='{{ $address->street_address }}' />
                        </div>
                        <div class="form-group">
                            <label for="suburb">Suburb</label>
                            <input type="text" class="form-control" name="suburb" value='{{ $address->suburb }}' />
                        </div>
                        <div class="form-group">
                            <label for="pincode">Post Code</label>
                            <input type="text" class="form-control" name="pincode" value='{{ $address->pincode }}' />
                        </div>


                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    @endif
            </div>
            @if(Auth::guest())
              <a href="/login" class="btn btn-info"> Login >></a>
            @endif
        </div>
    </div>
</div>
@endsection
