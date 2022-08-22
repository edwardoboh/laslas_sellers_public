@extends('layouts.default')
@section('meta')
    <meta property="og:image" content="{{ asset('assets/media/logos/logo2_dark.png') }}">
@endsection

@section('styles')
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

@endsection

@section('script')
    <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
@endsection
