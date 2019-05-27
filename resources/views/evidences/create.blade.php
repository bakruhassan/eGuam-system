@extends('layouts.app')
@section('content')
{!! Form::open(['action' => 'evidencesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">

        <div class="row">
            <div class="col">
                <label for="name">Evidence Name</label>
                <input class="form-control"type="text" name="name">
            </div>
        </div>
        <div class="row">
                <div class="col">
                    <label for="desc">Description</label>

{{Form::textarea('desc', '', ['id' => 'desc', 'class' => 'form-control', 'placeholder' => 'desc'])}}
                </div>
            </div>
                <div class="row">
                <div class="col">
                    <label for="kes">Case</label>
                    <select class="form-control"name="kes_id" >
                            <option value="">Select a case</option>
                        @foreach($keskes as $kes)
                                <option value="{{$kes->id}}">{{$kes->id}} - {{$kes->name}} - {{$kes->customer['name']}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <br>
                <div class="row">
                <div class="col">
                    <label for="file">Zip file</label>
                    {{Form::file('file') }}
                        </div>
                    </div>

<br>
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <button name="submit" class="form-control btn btn-primary"type="submit">Add</button>

    </div>
</form>
@endsection