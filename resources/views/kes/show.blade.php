@extends('layouts.app')
@section('content')
<br>
<div class="container">
	<div class="row">
       
        <ul>
<h3>Case Info</h3>
        <li>Name: {{$kes->name}}</li>
        <li>Expenses: {{$kes->expenses}}RM</li>
        <li>Category: {{$kes->category['name']}}</li>
        </ul>
</div>
<hr>
    <div class="row">
        <ul>
<h3>Customer Info</h3>
        <li>Name: {{$kes->customer['name']}}</li>
        <li>Address: {{$kes->customer['address']}}</li>
        <li>Phone: {{$kes->customer['phone']}}</li>
        <li>IC: {{$kes->customer['ic']}}</li>
        <li>birthdate: {{$kes->customer['birthdate']}}</li>
        </ul>

    </div>
      
        <hr>
    <div class="row">
        <a href="/kes/{{$kes->id}}/evidences" class="btn btn-primary">See evidences for this case</a>
    </div>
    <div class="row">

            {!! Form::open(['action' => ['kesController@destroy', $kes->id], 'method' => 'DELETE']) !!}
	    		<button type="submit" class="btn btn-danger">DELETE</button>
	    		{!! Form::close() !!}
	    	</div>
</div>
@endsection