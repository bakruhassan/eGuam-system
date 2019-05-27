@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
{!! Form::open(['action' => 'guideController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">

        <div class="row">
            <div class="col">
                <label for="name">Guide Title</label>
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
                    <label for="category">Category</label>
                    <select class="form-control"name="category_id" >
                            <option value="">Select a category</option>
                        @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>

        <div class="row">
            <div class="col">
                <label for="attachment">Attachment</label>
                <div>
                    {{Form::file('file') }}
            </div>
            </div>

        </div>
      <br>
        <button name="submit" class="form-control btn btn-primary"type="submit">Add</button>

    </div>
</form>
</div>


@endsection