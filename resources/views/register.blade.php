@extends('layouts.app')

@section('content')
    <div class="modal-login">
        <div class="wrapper bg-light p-4 text-center">
            <div class="btn-switch d-flex">
                <div class="col-6">
                    <a class="btn" href="{{route('login')}}">Sign In</a>
                </div>
                <p style="opacity: 60%;">|</p>
                <div class="col-6">
                    <a class="btn fw-bold" >Sign Up</a>
                </div>
            </div>
            <hr class="m-0" style=" margin-top: 0px;">
            <h4 class="mt-4">Register</h4>
            @if ($error['error'] == 'error')
                <p class="text-danger m-0">Username  atau Email sudah terdaftar</p>
            @endif
            <!-- <p>Belum daftar?<a href="#">Register</a></p> -->
            <form method="POST">
                @csrf
                <div class="mb-3 text-start">
                  <label  class="form-label">Nama</label>
                  <input type="text" name="name" class="form-control" required/>
                </div>
                <div class="mb-3 text-start">
                  <label  class="form-label">Username</label>
                  <input type="text" name="username" class="form-control" required/>
                </div>
                <div class="mb-3 text-start">
                    <label  class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required/>
                </div>
                <div class="mb-3 text-start">
                    <label class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control"  required/>
                    @if ($error['error'] == 'error')
                        <span class="show-hide mt-1" id="show-hide"><i class="bi bi-eye-slash" aria-hidden="true"></i></span>
                    @else
                        <span class="show-hide" id="show-hide"><i class="bi bi-eye-slash" aria-hidden="true"></i></span>
                    @endif
                </div>
                <div class="d-grid pt-1 pb-1 mt-4 fs-1">
                  <button type="submit" class="btn text-light" style="font-size: 18px;">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection