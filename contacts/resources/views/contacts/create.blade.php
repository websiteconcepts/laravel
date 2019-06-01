@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">Add New Contact</div>
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
                            <label for="first_name">First Name: *</label>
                            <input type="text" class="form-control" name="first_name"/>
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name: *</label>
                            <input type="text" class="form-control" name="last_name"/>
                        </div>

                        <div class="form-group">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" class="form-control" name="dob"/>
                        </div>

                        <div class="form-group">
                            <label for="company">Company: *</label>
                            <input type="text" class="form-control" name="company"/>
                        </div>

                        <div class="form-group">
                            <label for="position">Position: *</label>
                            <input type="text" class="form-control" name="position"/>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email"/>
                        </div>
                        <div class="form-group">
                            <label for="phone_mobile">Mobile Phone:</label>
                            <input type="text" class="form-control" name="phone_mobile"/>
                        </div>
                        <div class="form-group">
                            <label for="phone_work">Work Phone:</label>
                            <input type="text" class="form-control" name="phone_work"/>
                        </div>


                        <h3>Address</h3>
                        <div class="form-group">    
                            <label for="type">Address Type: *</label> <br />
                            <input type="radio" name="type" value="work" checked = "checked"> Work<br>
                            <input type="radio" name="type" value="postal"> Postal<br>
                        </div>

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

                    

                                    
                        <button type="submit" class="btn btn-primary-outline">Add contact</button>
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