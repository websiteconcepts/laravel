@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading"></div>
                    @if(Auth::check())
                    <h2>Contact Details</h2>
                    
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $contact->first_name }} {{ $contact->last_name }}
                    </div>
                    <div class="form-group">
                        <strong>Company:</strong>
                        {{ $contact->company }} 
                    </div>
                    <div class="form-group">
                        <strong>Position:</strong>
                        {{ $contact->position }} 
                    </div>
                    <div class="form-group">
                        <strong>Date of Birth:</strong>
                        {{ $contact->dob }} 
                    </div>
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $contact->email }} 
                    </div>
                    <div class="form-group">
                        <strong>Mobile Phone:</strong>
                        {{ $contact->phone_mobile }} 
                    </div>
                    <div class="form-group">
                        <strong>Work Phone:</strong>
                        {{ $contact->phone_work }} 
                    </div>
                    <div style="padding:10px; width:300px"> 

                    <h2>Addresses</h2>
                    @if ($contact->addresses->count() > 0)
                    @foreach ($contact->addresses as $address)

                        <div style="border-bottom:1px solid gray"> 
                        <p> {{ $address->street_address }}</p>
                        <p> {{ $address->suburb }}</p>
                        <p> {{ $address->pincode }}</p>
                        </div>

                    @endforeach
                    </div>
                    @else
                    <p>
                    No Address added. 
                   
                    </p>  
                    @endif


                    @endif
            </div>
            @if(Auth::guest())
              <a href="/login" class="btn btn-info"> Login >></a>
            @endif
        </div>
    </div>
</div>
@endsection

