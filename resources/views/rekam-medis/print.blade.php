<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('dist/img/logo/logo4.png') }}" rel="icon">
    <title>Print Rekam Medis</title>
    <link href="{{ URL::asset('dist\vendor\bootstrap\css\bootstrap.min.css'); }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('dist\css\ruang-admin.min.css'); }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://kit.fontawesome.com/212d3d2392.js" crossorigin="anonymous"></script>

</head>


<body id="page-top">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- Container-->
                <div class="container mt-5">

                    <!-- Content -->

                    <div class="container">
                        <div class="d-flex justify-content-end">
                            <button id="printPageButton" onclick="window.print()" class="btn btn-success mb-3"><i class="fa-solid fa-print"></i> Cetak</button>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header text-center mt-3">
                                        @empty($data_sakit)
                                            Detail Rekam Medis Pasien <b style="color: black"></b>
                                        @else
                                            Detail Rekam Medis Pasien <br><b
                                                style="color: black">{{ $data_sakit->pasien->nama_pasien }}</b>
                                        @endempty
                                    </div>
                                    <div class="card-body">
                                        @empty($detail)
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>ID Riwayat Sakit</th>
                                                        <th>Keluhan</th>
                                                        <th>Tindakan</th>
                                                        <th>Status Pasien</th>
                                                        <th>Nama Petugas</th>
                                                        <th>Tanggal</th>
                                                        <th>Jam</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <div class="text-center mt-3">
                                                <span>Rekam Medis Belum Tersedia</span>
                                            </div>
                                        @else
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>ID Riwayat Sakit</th>
                                                        <th>Keluhan</th>
                                                        <th>Tindakan</th>
                                                        <th>Status Pasien</th>
                                                        <th>Nama Petugas</th>
                                                        <th>Tanggal</th>
                                                        <th>Jam</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($detail as $row)
                                                        <tr class="text-center">
                                                            <td>{{ $row->id }}</td>
                                                            <td>{{ $row->keluhan }}</td>
                                                            <td>{{ $row->tindakan }}</td>
                                                            <td>
                                                                @if ($row->status_pasien == 'Rawat')
                                                                    <span class="badge bg-warning"
                                                                        style="color: white">Rawat</span>
                                                                @else
                                                                    <span class="badge bg-primary"
                                                                        style="color: white">Rawat Jalan</span>
                                                                @endif
                                                            </td>
                                                            <td>{{ $row->petugas->nama_petugas }}</td>
                                                            <td>{{ $row->created_at->format('d/m/Y') }}</td>
                                                            <td>{{ $row->created_at->format('H:m:s') }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endempty
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- EndContent -->

                </div>
                <!---Container Fluid-->
            </div>
            <!-- Footer -->
            <footer class="mt-4 bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="my-auto text-center copyright">
                        <span>copyright &copy; UKS -
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                        </span>
                    </div>
                </div>
            </footer>
            <!-- Footer -->
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="rounded scroll-to-top" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="https://indrijunanda.github.io/RuangAdmin/vendor/jquery/jquery.min.js"></script>
    <script src="https://indrijunanda.github.io/RuangAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://indrijunanda.github.io/RuangAdmin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://indrijunanda.github.io/RuangAdmin/js/ruang-admin.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
        integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
    @yield('chart')
</body>

</html>
