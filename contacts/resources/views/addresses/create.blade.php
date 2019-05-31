@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading"></div>
                <h2>Add New Address</h2>
                    @if(Auth::check())
                    @if ($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </div><br />
                    @endif
                    <form method="post" action="{{ route('contacts.store') }}">
                        @csrf
                        <div class="form-group">    
                            <label for="street_address">Street Address: *</label>
                            <input type="text" class="form-control" name="street_address"/>
                        </div>

                        <div class="form-group">    
                            <label for="suburt">Suburb: *</label>
                            <input type="text" class="form-control" name="suburb"/>
                        </div>

                        <div class="form-group">    
                            <label for="pincode">Post Code: *</label>
                            <input type="text" class="form-control" name="pincode"/>
                        </div>

                        <div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">
                                <label for="contact_id" class="col-md-4 control-label">Contact</label>

                                <div class="col-md-6">
                                    <select name="contact_id" class="form-control" required>
                                        @foreach ($contacts as $contact)
                                            <option value="{{ $contact->id }}">{{ $contact->first_name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('contact_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('contact_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                                    
                        <button type="submit" class="btn btn-primary-outline">Add Address</button>
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