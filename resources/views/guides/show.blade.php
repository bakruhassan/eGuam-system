@extends('layouts.app')
@section('content')
<br>
<div class="container">
	<div class="row">
       
        <ul>
<h3>Guide </h3>
        <li>Name: {{$guide->name}}</li>
        <li>Desc: <div class="container"><?= $guide->desc ?></div></li>
       @if($guide->file != "" and $guide->file != "N/A") 
        <li>Attachments: <a href="/storage/guides/{{$guide->file}}">{{$guide->file}}</a></li>
        @endif
        </ul>
</div>
        <hr>
    @if(Auth::user()->role == 'admin')

	<div class="row">

{!! Form::open(['action' => ['guideController@destroy', $guide->id], 'method' => 'DELETE']) !!}
	    		<button type="submit" class="btn btn-danger">DELETE</button>
	    		{!! Form::close() !!}
	    	</div>
	    		<a href="/evidences/{{$guide->id}}/edit" class="btn btn-warning">EDIT</a>
	    		@endif
</div>
@endsection