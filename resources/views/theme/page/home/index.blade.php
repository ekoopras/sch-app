@extends('theme.layout.app')

@section('title', 'Beranda')

@section('content')

    @include('theme.page.home.hero')
    @include('theme.page.home.pengumuman')
    @include('theme.page.home.statistic')
    @include('theme.page.home.sambutan')
    @include('theme.page.home.prestasi')
    {{-- @include('theme.page.home.program-unggul')
    @include('theme.page.home.fasilitas') --}}
    @include('theme.page.home.blog-post')
    @include('theme.page.home.category')
    {{-- @include('theme.page.home.bergabung') --}}

@endsection
