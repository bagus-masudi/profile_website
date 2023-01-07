@extends('layouts.app')

@section('content')
<div class="container">
    
    @foreach ($user as $users)
    <div class="profile">
        <div class="left">
            <div class="modal-profile">
                <div class="wrapper shadow p-4 text-center">
                    <div class="profile-img"><img alt="" src="{{asset('images/photo/photo.jpg')}}"></div>
                    <h2>{{$users->name}}</h2>
                    <p>{{$users->pekerjaan}}</p>
                    <div class="socials">
                        <div class="a1">
                            <img src="{{asset('images/icons/facebook-f.png')}}" style="width: 16px" aria-placeholder="ssfv" alt="">
                        </div>
                        <div class="a2">
                            <img src="{{asset('images/icons/linkedin-in.png')}}" style="width: 19px;" alt="">
                        </div>
                        <div class="a3">
                            <img src="{{asset('images/icons/github-alt.png')}}" style="width: 20px;" alt="">
                        </div>
                        <div class="a4">
                            <img src="{{asset('images/icons/google-plus-g.png')}}" style="width: 27px;" alt="">
                        </div>
                    </div>
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
        <div class="right">
            <div class="modal-biodata">
                <div class="wrapper shadow text-center">
                    <div class="text-start" style="color: #ffffffdb">
                        <div class="d-flex gap-5 mt-1">
                            <h2 class="col-3" style="font-size: 23px">Nama</h2>
                            <p>{{$users->name}}</p>
                        </div>
                        <hr>
                        <div class="d-flex gap-5" style="margin-top: 27px;">
                            <h2 class="col-3" style="font-size: 23px">Username</h2>
                            <p>{{$users->username}}</p>
                        </div>
                        <hr>
                        <div class="d-flex gap-5" style="margin-top: 27px;">
                            <h2 class="col-3" style="font-size: 23px">No. Hp</h2>
                            <p>{{$users->no_hp}}</p>
                        </div>
                        <hr>
                        <div class="d-flex gap-5" style="margin-top: 27px;">
                            <h2 class="col-3" style="font-size: 23px">Alamat</h2>
                            <p>{{$users->alamat}}</p>
                        </div>
                        <hr>
                        <div class="d-flex gap-5" style="margin-top: 27px;">
                            <h2 class="col-3" style="font-size: 23px">Email</h2>
                            <p>{{$users->email}}</p>
                        </div>
                        <hr>
                        <div class="d-flex gap-5" style="margin-top: 27px;">
                            <h2 class="col-3" style="font-size: 23px">Tanggal Lahir</h2>
                            <p ><?php
                                $date=date_create($users->tgl_lhr);
                                echo date_format($date,"d M Y");
                                ?></p>
                        </div>
                        <hr>
                        <div class="text-end">
                            <a class="text-warning animate" style="text-decoration: none" href="#">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-about">
                <div class="wrapper shadow">
                    <div class="text-start" style="color: #ffffffdb">
                        <h2 class="text-center mb-4">Tentang Saya</h2>
                        <p style="height:400px">Saya adalah entusias teknologi</p>
                        <a class="text-warning animate" style="text-decoration: none; margin-top: 1" href="#">Back</a>
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
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
<script>
$(document).ready(function(){
	$('.animate').click(function(){
	$('.right').toggleClass('animated');
	return false;
    });
});
</script>
@endsection