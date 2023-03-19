<!doctype html>
<html lang="en">

<head>
    <title>Pengaduan Masyarakat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="/assets3/css/style.css">

</head>

<body>
    <style>
        @media print {

            .form-group,
            .btn,
            .font-weight-bold {
                display: none;
            }
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <!-- <a class="navbar-brand" href="/dashboard">APP PENGADUAN</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>


            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav mr-auto">
                    <?php if (session()->get('level') == 'petugas') { ?>
                        <li class="nav-item ">
                            <a class="nav-link bg-danger " href="/petugas/dashboard" id="navbardrop">App Pengaduan</a>
                        </li>
                    <?php } ?>
                    <?php if (session()->get('level') == 'admin') { ?>
                        <li class="nav-item ">
                            <a class="nav-link bg-danger " href="/dashboard" id="navbardrop">App Pengaduan</a>
                        </li>
                    <?php } ?>
                    <!-- Dropdown -->
                    <?php if (session()->get('level') == 'admin') { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Master Data</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/petugas/masyarakat">Data Masyarakat</a>
                                <a class="dropdown-item" href="/petugas/user">Data Petugas</a>
                            </div>
                        </li>
                    <?php } ?>
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Pengaduan Masyarakat </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/verifikasi">Verifikasi & Validasi</a>
                            <a class="dropdown-item" href="/respon">Tanggapan</a>
                        </div>
                    </li>
                    <!-- Dropdown -->
                    <?php if (session()->get('level') == 'admin') { ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="/laporan/pengaduan" id="navbardrop">Laporan</a>
                        </li>
                    <?php } ?>
                    <li class=" nav-item">
                        <a class="nav-link" href="/logout" OnClick="return confirm('Anda Yakin Ingin Logout?')">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>