@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
{!! Form::open(['action' => 'GuideController@store']) !!}
    <div class="form-group">

        <div class="row">
            <div class="col">
                <label for="name">Guide Title</label>
                <input class="form-control"type="text" name="name">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="category">Category</label>
                <input class="form-control"type="text" name="category">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="description">Description</label>
                <input class="form-control"type="text" name="description">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="attachment">Attachment</label>
                <div>
                <input type="file" name="attachments">
            </div>
            </div>

        </div>
      <br>
        <button name="submit" class="form-control btn btn-primary"type="submit">Add</button>

    </div>
</form>
</div>


@endsection