@extends('layouts.app')
@section('content')
<br>
<div class="container">
	<div class="row">
       
        <ul>
<h6>Case Info</h6>
        <li>Name: {{$kes->name}}</li>
        <li>Expenses: {{$kes->expenses}}RM</li>
        <li>Category: {{$kes->category['name']}}</li>
        </ul>
</div>
    <div class="row">
        <ul>
<h6>Customer Info</h6>
        <li>Name: {{$kes->customer['name']}}</li>
        <li>Address: {{$kes->customer['address']}}</li>
        <li>Phone: {{$kes->customer['phone']}}</li>
        <li>IC: {{$kes->customer['ic']}}</li>
        <li>birthdate: {{$kes->customer['birthdate']}}</li>
        </ul>

    </div>
      
        <hr>
	<div class="row">

{!! Form::open(['action' => ['kesController@destroy', $kes->id], 'method' => 'DELETE']) !!}
	    		<button type="submit" class="btn btn-danger">DELETE</button>
	    		{!! Form::close() !!}
	    	</div>
</div>
@endsection