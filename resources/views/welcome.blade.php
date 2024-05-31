<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ARTICLE's</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style_welcome.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body>
    <div class="nav">
        <nav>
            <img class="logo" src="{{ asset('assets/images/artikel.png') }}" alt="logo">
            @auth
                <a href="{{ url('/home') }}"><button>Dashboard</button></a>
            @else
            @endauth
        </nav>
    </div>
    <div class="container">
        <div class="col"><b>WELCOME TO ARTICLE'S</b></div>
        <div class="container2">
            <div class="col2">Temukan Berbagai Artikel Menarik dan Inspiratif ,
                <br> Jelajahi berbagai artikel kami yang mencakup beragam topik, dari teknologi hingga gaya
                hidup,
                dari kesehatan hingga hiburan. <br><br><a href="#artikel"><button>Mulai Membaca Artikel</button></a></div>
        </div>
    </div>
    <div class="content auto auto-height-div" id="artikel">
        <div class="col">TEMUKAN ARTIKEL </div>
        <div class="col2">
            <div class="col3">
                <div class="row">
                    @foreach ($artikel as $data)
                        <div class="col-md-6 col-xl-4 grid-margin ">
                            <a href="{{url('tampil', $data->id)}}">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $data->judul }}</h4>
                                        <div class="item">
                                            <img src="{{ asset('images/artikel/' . $data->cover) }}" alt="">
                                        </div>
                                        <div class="d-flex py-4">
                                            <div class="preview-list w-100">
                                                <div class="preview-item p-0">
                                                    <div class="preview-thumbnail">
                                                        <img src="{{ asset('images/penulis/' . $data->penulis->foto_profil) }}"
                                                            class="rounded-circle" alt="">
                                                    </div>
                                                    <div class="preview-item-content d-flex flex-grow">
                                                        <div class="flex-grow">
                                                            <div
                                                                class="d-flex d-md-block d-xl-flex justify-content-between">
                                                                <h6 class="preview-subject ">
                                                                    {{ $data->penulis->nama_penulis }}</h6>
                                                                <p class="text-muted text-small">
                                                                    {{ $data->tanggal_publikasi }}</p>
                                                            </div>
                                                            <p class="text-muted">{{ $data->deskripsi }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button disabled type="button" class="btn btn-outline-secondary btn-icon-text">
                                            {{ $data->kategori->nama_kategori }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <footer>
        &copy; 2024 Web Artikel. All rights reserved.
    </footer>
    

</body>

</html>
