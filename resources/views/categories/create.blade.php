@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
{!! Form::open(['action' => 'categoriesController@store']) !!}
    <div class="form-group">

        <div class="row">
            <div class="col">
                <label for="name">Category Name</label>
                <input class="form-control"type="text" name="name">
            </div>
        </div>
      <br>
        <button name="submit" class="form-control btn btn-primary"type="submit">Add</button>

    </div>
</form>
</div>


@endsection