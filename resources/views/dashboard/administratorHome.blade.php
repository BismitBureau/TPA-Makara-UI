@extends('layout/master')

@section('title', 'Homepage')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            TPA Makara UI
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<div class="container">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
          <img class="d-block w-100" src="{{asset('picture/image1crs.png')}}" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('picture/image2crs.jpg')}}" alt="Second slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="col-md-12">
    <h3 id="homeHead">
        Taman Pengembangan Anak Makara UI
    </h3>
    <p id="homePara">
        TPAM didirikan oleh Fakultas Psikologi, bekerjasama dengan Fakultas Kedokteran, Fakultas Kedokteran Gigi dan Fakultas Ilmu Keperawatan UI. Kegiatan di TPAM diterapkan melalui metode bermain sambil belajar untuk menstimulasi aspek fisik-motorik, kognitif, sosial-emosi dan kemandirian anak. TPAM bekerjasama dengan orangtua untuk bersama-sama mencapai tumbuh kembang anak yang optimal.
    </p>
  </div>

  <div class="col-md-12" id="homeVideo">
    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/acl3R_HxYuI" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>

  <div class="col-md">
    <h3 id="headerBerita">
        Berita TPAM
    </h3>
    <div class="row">
        <div id="" class="col-md-4"></div>
            <div id="garis" class="col-md-4"></div>
        <div id="" class="col-md-4"></div>
    </div>
    <div id="tmbhBrt">
      <a href="{{ route('admin.berita.create') }}">
        Tambah Berita +
        </a>
    </div>
    <div class="row" id="berita">
        @foreach($news as $new)
      <div class="col-4 col-md-4" id="beritaCont">
        <div id="isiBerita">
            <div id="pensilBrt">
                <a href="{{ route('admin.berita.edit', ['id' => $new->id]) }}">
                    <img src="{{asset('svg/pensilberita.svg')}}" alt="">
                </a>
            </div>
          <div>
            <img id="imgBerita" src="{{asset($new->gambar)}}" alt="bla">
          </div>
          <div>
            <h3 id="judulBerita">
              {{ $new->judul }}
            </h3>
            <p id="prgBerita">
              {{ $new->isi }}
            </p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
      <div id="paginate">
        <div>
          {{ $news->links() }}
        </div>
      </div>
  </div>
  <div id="prfsCont">
    <div class="row" id="prfsTpam">
      <div class="col-md-6 ">
        <img src="{{ asset('picture/fasilitas1.jpg') }}" alt="prog" class="">
      </div>
      <div class="col-md-6 " id="prfsDesc">
        <div id="imgCont">
          <img src="{{asset('svg/graduation-cap.svg')}}" alt="">
        </div>
        <h3>Program TPAM</h3>
        <p>
          Program dibuat menggunakan pendekatan tematik pada setiap caturwulannya, misalnya kebun binatang, transportasi, buah-buahan dan sayur-sayuran. Aspek perkembangan anak yang distimulasi adalah motorik kasar, motorik halus, kognitif, sosial-emosi.
        </p>
      </div>
    </div>

    <div class="row" id="prfsTpam">

      <div class="col-md-6">
        <img src="{{asset('picture/program1.jpg')}}" alt="fasil">
      </div>
      <div class="col-md-6  order-first" id="prfsDesc">
        <div id="imgCont">
          <img src="{{asset('svg/sand-castle.svg')}}" alt="">
        </div>
        <h3>Fasilitas TPAM</h3>
        <p>TPA Makara dilengkapi dengan berbagai fasilitas bermain dan penunjang kegiatan belajar anak yang dapat mendukung tercapainya perkembangan motorik, kognitif, dan sosial emosi anak. Fasilitas yang ada disesuaikan dengan kebutuhan kelompok usia anak dan didesain seaman mungkin bagi putra-putri tercinta.</p>
      </div>
    </div>
  </div>

  <div id="lokasiCont">
    <h3 id="headerLokasi">
        Lokasi TPAM
    </h3>
    <div class="row">
        <div id="" class="col-md-4"></div>
            <div id="garis" class="col-md-4"></div>
        <div id="" class="col-md-4"></div>
    </div>

  </div>
  <div id="tv" class="jamLoc" >

    <div class="row" id="jamOps">
      <div id="logoJam" class="col-md-3 col-3">
        <img src="{{asset('svg/clock.svg')}}" alt="jam">
      </div>
      <div class="col-md col">
        <h3 class="title3">
          Jam Operasional
        </h3>
        <p  class="almlocp">
          Senin-jum'at : 08.00-16.30 Hrs
        </p>
      </div>
    </div>

    <div class="row" id="almtTpam">
      <div id="logoAlmt" class="col-md-3 col-3">
        <img src="{{asset('svg/maps.svg')}}" alt="almt">
      </div>
      <div class="col-md col">
        <h3 class="title3">
          Alamat TPAM
        </h3>
        <p class="almlocp">
          Gedung TPA Makara Fakultas Psikologi Universitas Indonesia
          Kampus Depok - Jawa Barat
          Telp: 021-778881082
          Whatsapp kantor: 0857-7170-6484
          Email: tpamakara@gmail.com
        </p>
      </div>
    </div>

  </div>

  <div class="pigeon">
    <h3 id="headerLokasi">
          Supported By
    </h3>
    <div class="row">
        <div id="" class="col-md-4"></div>
            <div id="garis" class="col-md-4"></div>
        <div id="" class="col-md-4"></div>
    </div>
    <div id="imgCont">
      <img src="{{asset('picture/pigeon-logo.png')}}" alt="">
    </div>
  </div>

  <div class="row" id="sosmed">
    <div>
      <a href="https://www.facebook.com/tpa.makara"><img src="{{asset('svg/facebook.svg')}}" alt="" ></a>
      <a href="https://www.instagram.com/tpamakara/"><img src="{{asset('svg/instagram.svg')}}" alt="" ></a>
      <a href="https://youtu.be/acl3R_HxYuI"><img src="{{asset('svg/youtube.svg')}}" alt="" ></a>
    </div>
  </div>
</div>



@endsection

@section('extra-js')
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection
