@extends('layouts.app')
@section('content')
{!! Form::open(['action' => 'invoicesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">

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

<br>
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <button name="submit" class="form-control btn btn-primary"type="submit">Generate Invoice</button>

    </div>
</form>
@endsection