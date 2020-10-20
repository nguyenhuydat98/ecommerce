@extends('user.layouts.app')

@section('content')
    @include('user.elements.preload')
    @include('user.home.slider')
    @include('user.home.category')
    @include('user.home.products')
@endsection
