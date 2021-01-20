@extends('user.layouts.app')

@section('content')
    @include('user.home.slider')
    @include('user.home.category')
    @include('user.home.product_recommender')
    @include('user.home.products')
    @include('user.home.product_rate')
@endsection
