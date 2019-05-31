@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @if(Auth::check())
        <div class="col-md-12">
        

        <form action="/search" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q"
                    placeholder="Search Contacts"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
            <div class="card">
                <div class="card-header">All Contacts</div>
                <div style="width:40px; float:right; padding:20px"><a href="{{ route('contacts.create')}}" class="btn btn-primary">Add New</a></div>                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Company</td>
                        <td>Position</td>
                        <td>Email</td>

                        <td colspan = 2>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($details as $contact)
                        <tr>
                            <td>{{$contact->id}}</td>
                            <td>{{$contact->first_name}} {{$contact->last_name}}</td>
                            <td>{{$contact->company}}</td>
                            <td>{{$contact->position}}</td>
                            <td>{{$contact->email}}</td>
                            <td>
                                <a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <a href="{{ route('contacts.show',$contact->id)}}" class="btn btn-primary">View</a>
                            </td>
                            <td>
                                <form action="{{ route('contacts.destroy', $contact->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                </div>
            </div>
            @endif
        </div>
    @endif
    @if(Auth::guest())
        <a href="/login" class="btn btn-info"> Login >></a>
    @endif
    </div>
</div>
@endsection