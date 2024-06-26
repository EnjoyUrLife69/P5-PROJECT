<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>P5 | Tables </title>
    <link rel="icon" href="{{ asset('assets/images/graduation-hat.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        {{-- SIDEBAR --}}
        @include('layouts.sidebar')

        {{-- NAVBAR --}}
        <div class="container-fluid page-body-wrapper">
            @include('layouts.navbar')

            {{-- TABEL --}}
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Data Penulis </h3>
                    </div>
                    @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="card-title">Tabel Penulis</h4>
                                        <a href="{{ route('penulis.create') }}" class="btn btn-primary">+ Add Data</a>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th><b>
                                                            <h5>No</h5>
                                                        </b></th>
                                                    <th><b>
                                                            <h5>Nama Penulis</h5>
                                                        </b></th>
                                                    <th><b>
                                                            <h5>Email</h5>
                                                        </b></th>
                                                    <th><b>
                                                            <h5>Foto Profil</h5>
                                                        </b></th>
                                                    <th><b>
                                                            <h5>Action</h5>
                                                        </b></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no=1; @endphp
                                                @foreach ($penulis as $data)
                                                    <tr class="odd gradeX">
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $data->nama_penulis }}</td>
                                                        <td>{{ $data->email }}</td>
                                                        <td>
                                                            <img src="{{asset('images/penulis/' . $data->foto_profil) }}" width="100">    
                                                        </td>
                                                        <form action="{{ route('penulis.destroy', $data->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <td>
                                                                <a href="{{ route('penulis.edit', $data->id) }}"
                                                                    class="btn  btn-success">Edit</a>
                                                                <a href="{{ route('penulis.show', $data->id) }}"
                                                                    class="btn  btn-warning">Detail</a>
                                                                <button class="btn  btn-danger" type="submit"
                                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                                    Delete
                                                                </button>
                                                            </td>
                                                        </form>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
</body>

</html>
