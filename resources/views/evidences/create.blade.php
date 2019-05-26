@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
{!! Form::open(['action' => 'evidencesController@store']) !!}
    <div class="form-group">

        <div class="row">
            <div class="col">
                <label for="name">Evidence Name</label>
                <input class="form-control"type="text" name="name">
            </div>
        </div>
        <div class="row">
                <div class="col">
                    <label for="desc">body</label>
                    <input class="form-control"type="text" id="article-ckeditor"name="desc">
                </div>
            </div>
            <div class="row">
                    <div class="col">
                        <label for="status">Status</label>
                        <select class="form-control"name="status" >
                               
                                <option value="open">Open</option>
                                <option value="closed">Closed</option>
                                </select>
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
                                <label for="customer">Customer</label>
                                <select class="form-control"name="customer_id">
                                        <option value="">Select a customer</option>
                                    @foreach($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
<br>
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <button name="submit" class="form-control btn btn-primary"type="submit">Add</button>

    </div>
</form>
</div>
@endsection