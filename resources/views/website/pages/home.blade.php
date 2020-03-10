@extends('website.layouts.master')

@section('content')
    @php
        $array = ['arroz', 'feijão'];
    @endphp
    <example-component :some-prop='@json($array)'></example-component>
@endsection