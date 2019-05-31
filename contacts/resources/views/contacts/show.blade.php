@extends('base')

@section('main')
    <div class="row">
    <div class="col-sm-12">

    <h1 class="display-5">Contact Details</h1>
    
   
    <div class="form-group">
        <strong>Name:</strong>
        {{ $contact->first_name }} {{ $contact->last_name }}
    </div>
        

    <a class="btn btn-primary" href="{{ route('contacts.index') }}"> Back</a>
    </div>
    </div>
    @endsection
