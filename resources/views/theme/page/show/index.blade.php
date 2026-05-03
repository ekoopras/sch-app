@extends('theme.layout.app')

@section('title', $page->title)

@section('content')

    @include('theme.page.show.hero')
    @include('theme.page.show.content')

@endsection
