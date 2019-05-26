@extends('layouts.app')
@section('content')

<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
			<th>#</th>
			<th>name</th>
			<th>expenses</th>
			<th>status</th>
			<th>action</th>
			<th>date</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
	@foreach ($keskes as $kes)
	    <tr>
	    	<td>{{$i}}</td>
	    	<td><a href="/kes/{{$kes->id}}">{{$kes->name}}</a></td>
	    	<td>{{$kes->expenses}} RM</td>
	    	<td>{{$kes->status}}</td>
	    	<td>{!! Form::open(['action' => ['kesController@destroy', $kes->id], 'method' => 'DELETE']) !!}
	    		<button type="submit" class="btn btn-danger">DELETE</button>
	    		{!! Form::close() !!}
	    		<?php $i++; ?>

	    	</td>
	    	<td>{{$kes->created_at}}</td>
	    </tr>
	@endforeach
</tbody>
	</table>
</div>
<div class="container">
       
        <ul>
        
        <li>Case Name: {{$kes->name}}</li>
        <li>Expenses: {{$kes->expenses}}RM</li>
        <li>Category: {{$kes->category_id}}</li>
        </ul>
      
        <hr>

    <a href="/kes/create/" class="btn btn-info">Add Case</a>
</div>


@endsection