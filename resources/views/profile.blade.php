@extends('layouts.app')

@section('content')
<div class="container">
    
    @foreach ($user as $users)
    <div class="profile">
        <div class="left">
            <div class="modal-profile">
                <div class="wrapper shadow p-4 text-center">
                    @if ($users->photo)
                        <div class="profile-img"><img alt="" src="{{asset('images/photo')}}/{{$users->photo}}"></div>
                    @else 
                    <div class="profile-img"><img alt="" src="{{asset('images/photo/User.png')}}"></div>
                    @endif    
                    <h2>{{$users->name}}</h2>
                    <p>{{$users->pekerjaan}}</p>
                    <div class="socials">
                        <a class="a1" href="{{$users->url_facebook}}">
                            <img src="{{asset('images/icons/facebook-f.png')}}" style="width: 16px" aria-placeholder="ssfv" alt="">
                        </a>
                        <a class="a2" href="{{$users->url_linkedin}}">
                            <img src="{{asset('images/icons/linkedin-in.png')}}" style="width: 19px; margin-top: -5px;" alt="">
                        </a>
                        <a class="a3" href="{{$users->url_github}}">
                            <img src="{{asset('images/icons/github-alt.png')}}" style="width: 20px; margin-top: -5px;" alt="">
                        </a>
                        <a class="a4" href="{{$users->url_instagram}}">
                            <img src="{{asset('images/icons/instagram.png')}}" style="color: #fff; width: 27px; margin-top: -5px;" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="btn-edit">
                <a class="btn btn-primary ms-3" data-bs-toggle="modal" href="#exampleModalBiodata"><i class="bi bi-pencil"></i></a>
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
                        @if ($users->about)
                            <p><?php echo htmlspecialchars_decode($users->about) ?></p>
                        @else 
                            <p style="height:400px">Isi Tentang Diri Anda</p>
                        @endif
                        <a class="text-warning animate position-absolute" style="transform: translate(80%, -10%); top: 90%; left: 70%; text-decoration:none;" href="#">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Modal Edit-->
    <div class="modal fade" id="exampleModalBiodata" tabindex="-1" aria-labelledby="exampleModalBiodataLabel" aria-hidden="true">
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
                        <input type="text" class="form-control d-none" id="biodata" name="biodata" value="biodata">
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <div>
                        <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalURL">URL Sosmed</a>
                        <a class="btn btn-primary ms-1" data-bs-toggle="modal" href="#exampleModalAbout">Tentang Saya</a>
                    </div>
                    <div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalAbout" tabindex="-1" aria-labelledby="exampleModalAboutLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('edit')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group mt-2 mb-2">
                        <label class="mb-2" for="name">Tentang Saya</label>
                        <textarea name="about" id="about" cols="3" rows="2" class="form-control">
                            <?php echo $users->about ?>
                        </textarea>
                    </div>
                    <input type="text" class="form-control d-none" id="name" name="name" value="{{ $users->name }}">
                    <input type="text" class="form-control d-none" id="username" name="username" required value="{{ $users->username }}">
                    <input type="email" class="form-control d-none" id="email" name="email" required value="{{ $users->email }}">
                    <input type="password" class="form-control d-none" id="password" name="password" required value="{{ $users->password }}">
                    <input type="text" class="form-control d-none" id="myabout" name="myabout" value="about">
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <div>
                        <a class="btn btn-primary ms-1" data-bs-toggle="modal" href="#exampleModalBiodata">Biodata</a>
                        <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalURL">URL Sosmed</a>
                    </div>
                    <div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                </div>
            </form>
        </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalURL" tabindex="-1" aria-labelledby="exampleModalURLLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('edit')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group mt-2 mb-2">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control" id="url_facebook" name="facebook" value="{{ $users->url_facebook }}">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label for="linkedin">Linkedin</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ $users->url_linkedin }}">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label for="github">Github</label>
                        <input type="text" class="form-control" id="github" name="github" value="{{ $users->url_github }}">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label for="instagram">Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $users->url_instagram }}">
                    </div>
                    <input type="text" class="form-control d-none" id="name" name="name" value="{{ $users->name }}">
                    <input type="text" class="form-control d-none" id="username" name="username" required value="{{ $users->username }}">
                    <input type="email" class="form-control d-none" id="email" name="email" required value="{{ $users->email }}">
                    <input type="password" class="form-control d-none" id="password" name="password" required value="{{ $users->password }}">
                    <input type="text" class="form-control d-none" id="url_sosmed" name="url_sosmed" value="url_sosmed">
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <div>
                        <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalAbout">Tentang Saya</a>
                        <a class="btn btn-primary ms-1" data-bs-toggle="modal" href="#exampleModalBiodata">Biodata</a>
                    </div>
                    <div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#about' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
$(document).ready(function(){
	$('.animate').click(function(){
	$('.right').toggleClass('animated');
	return false;
    });
});
</script>
@endsection