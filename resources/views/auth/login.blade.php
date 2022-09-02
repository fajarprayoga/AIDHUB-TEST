@extends('layouts.index')
@section('content')
    <section class="page-login" >
        <div class="container">
            <div class="col-md-8">
                <h1>Login User</h1>
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
                <form method="POST" action="{{route('login_process')}}" >
                    @csrf
                    <div class="mb-3">
                      <label for="username" class="form-label">Username</label>
                      <input name="username"  type="text" class="form-control" id="username">
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input name="password"  type="password" class="form-control" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="{{route('register')}}" class="btn btn-success">Register</a>
                  </form>
            </div>
        </div>
    </section>
@endsection
