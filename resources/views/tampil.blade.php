<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ARTICLE's</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style_tampil.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="icon" href="{{ asset('assets/images/graduation-hat.png') }}">
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
        <div class="col"><b>{{ $artikel->judul }}</b></div>
    </div>
    <div class="content auto-height-div">
        <div class="col">
            <div class="d-flex py-4">
                <div class="preview-list w-100" style="margin-top: -15px">
                    <div class="preview-item p-0">
                        <div class="preview-thumbnail">
                            <img src="{{ asset('images/penulis/' . $artikel->penulis->foto_profil) }}"
                                class="rounded-circle" alt="">
                        </div>
                        <div class="preview-item-content d-flex flex-grow">
                            <div class="flex-grow">
                                <div class="d-flex d-md-block d-xl-flex justify-content-between"
                                    style="margin-top: 1px">
                                    <h3 class="preview-subject">
                                        {{ $artikel->penulis->nama_penulis }}
                                    </h3>
                                </div>
                            </div>
                            <div class="tanggal" style="margin-top: 4px" style="flex: end">{{ $artikel->tanggal_publikasi }}</div>
                        </div>

                        <button disabled type="button" class="btn btn-outline-secondary btn-icon-text"  style="margin-left: 77%">
                            {{ $artikel->kategori->nama_kategori }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col2">
            <img src="{{ asset('images/artikel/' . $artikel->cover) }}" class="right-img">
            <p>
                {!! nl2br(e($artikel->isi)) !!}
            </p>
        </div>
    </div>

    <footer>
        &copy; 2024 Web Artikel. All rights reserved.
    </footer>

</body>

</html>
