@extends('layouts.app')
@section('content')
<br>
<div class="container">
	<div class="row">
       
        <ul>
<h3>Evidence Info</h3>
        <li>Name: {{$evidence->name}}</li>
        <li>Desc: <div class="container"><?= $evidence->desc ?></div></li>
       @if($evidence->file != "" and $evidence->file != "N/A") 
        <li>Attachments: <a href="/storage/evidences/{{$evidence->file}}">{{$evidence->file}}</a></li>
        @endif
        </ul>
</div>
<hr>
	<div class="row">
       
        <ul>
<h3>Case Info</h3>
        <li>Name: {{$evidence->kes['name']}}</li>
        <li>Expenses: {{$evidence->kes->expenses}}RM</li>
        <li>Category: {{$evidence->kes->category['name']}}</li>
        </ul>
</div>
<hr>
    <div class="row">

        <ul>
<h3>Customer Info</h3>
        <li>Name: {{$evidence->kes->customer['name']}}</li>
        <li>Address: {{$evidence->kes->customer['address']}}</li>
        <li>Phone: {{$evidence->kes->customer['phone']}}</li>
        <li>IC: {{$evidence->kes->customer['ic']}}</li>
        <li>birthdate: {{$evidence->kes->customer['birthdate']}}</li>
        </ul>

    </div>
      
        <hr>
	<div class="row">

{!! Form::open(['action' => ['evidencesController@destroy', $evidence->id], 'method' => 'DELETE']) !!}
	    		<button type="submit" class="btn btn-danger">DELETE</button>
	    		{!! Form::close() !!}
	    	</div>
</div>
@endsection