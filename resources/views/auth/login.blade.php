@extends('layouts.authapp')

@section('content')
<div class="container">
    <div class="row" style="margin-top: 80px;">
        <div class="col-lg-12 col-sm-12">
            <h2 class="text-center text-uppercase">
                Welcome to employee cms
            </h2>
        </div>
    </div>
    <div class="row g-0 justify-content-center">
        <div class="col-lg-5 col-12">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Admin Login</h3></div>
                <div class="card-body">
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" required/>
                            <label for="inputEmail">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" required/>
                            <label for="inputPassword">Password</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                            <input type="submit" class="btn btn-primary" value="Login">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; 2022</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-12">
            <div class="card shadow-lg border-0 mt-5">
                <img src="{{asset('assets/img/coverimage.jpg')}}" alt="cover" height="400">
            </div>
        </div>
    </div>
</div>
@endsection
