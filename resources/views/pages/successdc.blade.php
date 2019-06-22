@extends('layout/master')

@section('title', 'TPA Makara UI')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
<div class="d-flex justify-content-center success">
    <img src="{{asset('svg/success.svg')}}" alt="">
</div>
    <h3 class="title-congratulations">Congratulations!</h3>
    <h4 class="subtitle-congratulations">You have completed to create the connecting’s book.</h4>

@endsection

@section('extra-js')
@endsection
