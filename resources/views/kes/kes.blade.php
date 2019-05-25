@extends('layouts.app')
@section('content')
<div class="container">
       
        <ul>
                @foreach ($keskes as $kes)
        
        <li>Case Name: {{$kes->name}}</li>
        <li>Expenses: {{$kes->expenses}}RM</li>
        <li>Category: {{$kes->category_id}}</li>
        <hr>
                @endforeach
        </ul>
      

    <a href="/kes/create/" class="btn btn-info">Add Case</a>
</div>


@endsection