@extends('layouts.index')
@section('content')
    <section class="my-4" >
        <div class="container">
            <div class="col-md-8">
                <h1>Register</h1>
                 {{-- show success message --}}
                 @if ($message = Session::get('success'))
                 <div class="alert alert-success">
                     <p>{{ $message }}</p>
                 </div>
                 @endif
                 {{-- show error message --}}
                 @if ($message = Session::get('error'))
                 <div class="alert alert-error">
                     <p>{{ $message }}</p>
                 </div>
                 @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{route('register_process')}}" enctype="multipart/form-data" >
                    @csrf
                    <div class="mb-3">
                      <label for="username" class="form-label">Username</label>
                      <input required name="username" type="text" class="form-control" id="username">
                    </div>
                    <div class="mb-3">
                      <label for="first_name" class="form-label">First name</label>
                      <input required name="first_name" type="text" class="form-control" id="first_name">
                    </div>
                    <div class="mb-3">
                      <label for="last_name" class="form-label">Last name</label>
                      <input required name="last_name" type="text" class="form-control" id="last_name">
                    </div>
                    <div class="mb-3">
                      <label for="phone_number" class="form-label">Phone</label>
                      <input required name="phone_number" type="number" class="form-control" id="username">
                    </div>
                    <div class="mb-3">
                      <label for="address" class="form-label">Address</label>
                      <textarea name="address" id="address" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input required name="password" type="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                      <label for="confirm_password" class="form-label">Confirm password</label>
                      <input required name="confirm_password" type="password" class="form-control" id="confirm_password">
                    </div>
                    <div class="mb-3">
                      <label for="Photo" class="form-label">Photo</label>
                      <input required name="photo" type="file" class="form-control" id="photo">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                    <a href="{{route('login')}}" class="btn btn-success">Login</a>
                  </form>
            </div>
        </div>
    </section>
@endsection
