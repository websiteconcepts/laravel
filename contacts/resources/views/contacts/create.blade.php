@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add Person</h1>
  <div>
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
                       
          <button type="submit" class="btn btn-primary-outline">Add contact</button>
      </form>
  </div>
</div>
</div>
@endsection