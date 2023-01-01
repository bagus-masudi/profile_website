@extends('layouts.app')

@section('content')
<div class="container">
    
    @foreach ($user as $users)
    <div class="profile">
        <div class="left">
            <div class="modal-profile">
                <div class="wrapper shadow bg-light p-4 text-center">
                    <div class="">
                        @if ($users->photo != null) 
                            <img class="rounded-circle" src="{{asset('images/photo')}}/{{$users->photo}}" alt="#" style="width: 240px; height: 240px;">
                        @else 
                            <img class="rounded-circle" src="{{asset('images/photo/User.png')}}" alt="#" style="width: 240px; height: 240px;">
                        @endif
                    </div>
                    <div class="text-center mt-3">
                        <h3 class="fw-bold" style="">{{$users->name}}</h3>
                        <h3 class="mt-3 text-secondary">{{$users->pekerjaan}}</h3>
                    </div>
                </div>
                <div class="btn-edit">
                    <button type="button" class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-pencil"></i></button>
                    <form action="{{ route('delete') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger ms-3"><i class="bi bi-trash"></i></button>
                    </form>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-secondary ms-3"><i class="bi bi-box-arrow-in-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="modal-biodata">
                <div class="wrapper shadow bg-light p-4 text-center">
                    <div class="text-start">
                        <div class="d-flex gap-5 mt-1">
                            <p class="fw-bold">Nama</p>
                            <p class="text-secondary" style="margin-left: 79px;">{{$users->name}}</p>
                        </div>
                        <hr>
                        <div class="d-flex gap-5" style="margin-top: 27px;">
                            <p class="fw-bold">Username</p>
                            <p class="text-secondary" style="margin-left: 41px;">{{$users->username}}</p>
                        </div>
                        <hr>
                        <div class="d-flex gap-5" style="margin-top: 27px;">
                            <p class="fw-bold">No. Hp</p>
                            <p class="text-secondary"  style="margin-left: 70px;">{{$users->no_hp}}</p>
                        </div>
                        <hr>
                        <div class="d-flex gap-5" style="margin-top: 27px;">
                            <p class="fw-bold">Alamat</p>
                            <p class="text-secondary" style="margin-left: 68px;">{{$users->alamat}}</p>
                        </div>
                        <hr>
                        <div class="d-flex gap-5" style="margin-top: 27px;">
                            <p class="fw-bold">Email</p>
                            <p class="text-secondary" style="margin-left: 83px;">{{$users->email}}</p>
                        </div>
                        <hr>
                        <div class="d-flex gap-5" style="margin-top: 27px;">
                            <p class="fw-bold">Tanggal Lahir</p>
                            <p class="text-secondary">{{$users->tgl_lhr}}</p>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Modal Edit-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('edit')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <label for="" class="form-label">Photo</label>
                    <div class="form-upload">
                            <input type="file" class="form-control" name="photo" accept="image/*"/>
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required value="{{ $users->name }}">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required value="{{ $users->username }}">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required value="{{ $users->pekerjaan }}">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label for="no_hp">No HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" required value="{{ $users->no_hp }}">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label for="tgl_lhr">Tanggal Lahir</label>
                        <input type="date" class="form-control w-50" id="tgl_lhr" name="tgl_lhr" required value="{{ $users->tgl_lhr }}">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required value="{{ $users->alamat }}">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required value="{{ $users->email }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection