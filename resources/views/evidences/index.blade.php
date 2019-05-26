@extends('layouts.app')
@section('content')

<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
			<th>#</th>
			<th>name</th>
			<th>case</th>
			<th>category</th>
			<th>action</th>
			<th>date</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
	@foreach ($evidences as $evidence)
	    <tr>
	    	<td>{{$i}}</td>
	    	<td><a href="/evidences/{{$evidence->id}}">{{$evidence->name}}</a></td>
	    	<td>{{$evidence->kes['name']}}</td>
	    	<td>{{$evidence->kes->category['name']}}</td>
	    	<td>{!! Form::open(['action' => ['evidencesController@destroy', $evidence->id], 'method' => 'DELETE']) !!}
	    		<button type="submit" class="btn btn-danger">DELETE</button>
	    		{!! Form::close() !!}

	    		<a href="/evidences/{{$evidence->id}}/edit" class="btn btn-warning">EDIT</a>
	    		<?php $i++; ?>

	    	</td>
	    	<td>{{$evidence->created_at}}</td>
	    </tr>
	@endforeach
</tbody>
	</table>
</div>
    <a href="/evidences/create/" class="btn btn-info">Add an evidence</a>


@endsection