@extends('layout/master')

@section('title', 'List Student ' . $class . ' - GURU')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <h1 class = "daftarsiswa-title underliner">
            Daftar Siswa {{$class}}
        </h1>
    </div>
    <!-- Search form -->
    <form action="">
        <input onkeyup="searchFunction()" id = "userInput" class="form-control search-siswa" type="search" placeholder="Cari Siswa {{ $class }}">
    </form>

    <div class="d-flex selectstudent-feature justify-content-between">
        <button type="button" class="btn announcement">Pengumuman</button>
        <button type="button" class="btn btn-success schedule">Jadwal</button>
    </div>


    <div class="container">
        <?php $i=1; ?>
        <div class="row justify-content-around">
        @foreach($students as $student)
            @if(($i - 1) % 3 == 0)
            @endif
                <div class="col-4 siswa">
                @if($route == 'dayCareDailyBook')
                    <a href="{{ route('dailyBook.dc.month', ['student_id' => $student->id]) }}">
                @elseif($route == 'kelompokBermainDailyBook')
                    <a href="{{ route('dailyBook.kb.month', ['student_id' => $student->id]) }}">
                @elseif($route == 'dayCareProfile')
                    <a href="{{ route('profile.edit.details', ['student_id' => $student->id]) }}">
                @elseif($route == 'kelompokBermainProfile')
                    <a href="{{ route('profile.edit.details', ['student_id' => $student->id]) }}">
                @endif
                @if($student->jenis_kelamin == 'laki-laki')
                        <img src="{{ asset('picture/laki.png') }}" alt="" class= "photosiswa">
                @else
                        <img src="{{ asset('picture/perempuan.png') }}" alt="" class= "photosiswa">
                @endif
                        <p class="namasiswa">{{ $student->nama_lengkap }}</p>
                    </a>
                </div>
            @if(($i) % 3 == 0)
            @endif
            <?php $i += 1; ?>
            @endforeach
        </div>
        </div>

@endsection

@section('extra-js')

<script>
    function searchFunction() {
        // Declare variables
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById('userInput');
        filter = input.value.toUpperCase();
        siswaselect = document.getElementsByClassName("siswa");

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < siswaselect.length; i++) {
            a = siswaselect[i].getElementsByTagName("p")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                siswaselect[i].style.display = "";
            } else {
                siswaselect[i].style.display = "none";
            }
        }
    }
</script>

@endsection
