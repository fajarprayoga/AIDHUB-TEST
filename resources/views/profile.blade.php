@extends('layouts.index')
@section('content')
    <section class="page-profile">
        <div class="container">
            <div class="col-md-8 card-profile">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset( 'uploads/files/' .Auth::user()->photo)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">My Profile {{Auth::user()->username}}</h5>
                      <p class="card-text">{{Auth::user()->first_name}}</p>
                      <p class="card-text">{{Auth::user()->last_name}}</p>
                      <p class="card-text">{{Auth::user()->address}}</p>
                      <p class="card-text">{{Auth::user()->phone_number}}</p>
                      {{-- <a href="#" class="btn btn-primary">Logout</a> --}}
                      <form action="{{route('logout')}}" method="POST" >
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger" >Logout</button>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
    </section>
@endsection
