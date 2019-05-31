@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a contact</h1>

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
        <form method="post" action="{{ route('contacts.update', $contact->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" name="first_name" value={{ $contact->first_name }} />
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" value={{ $contact->last_name }} />
            </div>

            <div class="form-group">
              <label for="dob">Date of Birth:</label>
              <input type="date" class="form-control" name="dob" value={{ $contact->dob }}/>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value={{ $contact->email }} />
            </div>
            <div class="form-group">
                <label for="city">Company:</label>
                <input type="text" class="form-control" name="company" value={{ $contact->company }} />
            </div>
            <div class="form-group">
                <label for="country">Position:</label>
                <input type="text" class="form-control" name="position" value={{ $contact->position }} />
            </div>
            <div class="form-group">
                <label for="job_title">Mobile Phone:</label>
                <input type="text" class="form-control" name="phone_mobile" value={{ $contact->phone_mobile }} />
            </div>
            <div class="form-group">
                <label for="job_title">Work Phone:</label>
                <input type="text" class="form-control" name="phone_work" value={{ $contact->phone_work }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection