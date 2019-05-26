@extends('layouts.app')
@section('content')
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
			<th>#</th>
			<th>name</th>
			<th>action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
	@foreach ($categories as $category)
	    <tr>
	    	<td>{{$i}}</td>
	    	<td>{{$category->name}}</td>
	    	<td>{!! Form::open(['action' => ['categoriesController@destroy', $category->id], 'method' => 'DELETE']) !!}
	    		<button type="submit" class="btn btn-danger">DELETE</button>
	    		{!! Form::close() !!}
	    		<?php $i++; ?>

	    	</td>
	    </tr>
	@endforeach
</tbody>
	</table>
</div>
<hr>
<a href="/categories/create" class="btn btn-primary">ADD</a>
@endsection