@extends('layouts.app')
@section('content')
@foreach ($customers as $customer)
    {{$customer->id}}
@endforeach

@endsection