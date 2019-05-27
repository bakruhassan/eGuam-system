@extends('layouts.app')
@section('content')

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
            <th>#</th>
            <th>title</th>
            <th>category</th>
        @if(Auth::user()->role == 'admin')
            <th>action</th>
            @endif
            <th>date</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
    @foreach ($guides as $guide)
        <tr>
            <td>{{$i}}</td>
            <td><a href="/guide/{{$guide->id}}">{{$guide->name}}</a></td>
            <td>{{$guide->category['name']}}</td>
        @if(Auth::user()->role == 'admin')
            <td>{!! Form::open(['action' => ['guideController@destroy', $guide->id], 'method' => 'DELETE']) !!}
                <button type="submit" class="btn btn-danger">DELETE</button>
                {!! Form::close() !!}

                <a href="/guide/{{$guide->id}}/edit" class="btn btn-warning">EDIT</a>
                <?php $i++; ?>

            </td>
            @endif
            <td>{{$guide->created_at}}</td>
        </tr>
    @endforeach
</tbody>
    </table>
</div>
        @if(Auth::user()->role == 'admin')
    <a href="/guide/create/" class="btn btn-info">Add a guide</a>
    @endif


@endsection