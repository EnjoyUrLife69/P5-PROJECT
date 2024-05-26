<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>P5 | Dashboard </title>
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

            {{-- FORM --}}
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Detail Data Kategori</h4>
                                    @csrf
                                    <table>
                                        <tr>
                                            <td>Nama Kategori &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td>: &nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td>{{ $kategori->nama_kategori}}</td>
                                        </tr><br>
                                        <tr>
                                            <td>Deskripsi</td>
                                            <td>:</td>
                                            <td>{{ $kategori->deskripsi}}</td>
                                        </tr>
                                    </table><br>
                                    <a href="{{url ('kategori')}}" class="btn btn-dark">Back</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                            bootstrapdash.com 2020</span>

                    </div>
                </footer>
                <!-- partial -->
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
