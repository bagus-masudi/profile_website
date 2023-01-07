@extends('layouts.app')

@section('content')
<div class="modal-login">
    <div class="wrapper top-50 bg-light p-4 text-center">
        <div class="btn-switch d-flex">
            <div class="col-6">
                <a class="btn fw-bold">Sign In</a>
            </div>
            <p style="opacity: 40%;">|</p>
            <div class="col-6">
                <a class="btn" href="{{route('register')}}">Sign Up</a>
            </div>
        </div>
        <hr class="m-0" style="color: rgb(0, 0, 0);">
        <h4 class="mt-4">Login</h4>
        @if ($error['error'] == 'error')
            <p class="text-danger m-0">Email atau Password invalid</p>
        @endif
        <form action="" method="POST">
            @csrf
            <div class="mb-3 text-start">
                <label  class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required/>
            </div>
            <div class="mb-3 text-start">
                <label class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control"  required/>
            </div>
            <div class="d-grid pt-1 pb-1 mt-4 fs-1">
                <button type="submit" class="btn text-light fs-5">Login</button>
                @if ($error['error'] == 'error')
                    <span class="show-hide" style="margin-top: -33px" id="show-hide"><i class="bi bi-eye-slash" aria-hidden="true"></i></span>
                @else
                    <span class="show-hide" style="margin-top: -41px" id="show-hide"><i class="bi bi-eye-slash" aria-hidden="true"></i></span>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection