@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
{!! Form::open(['action' => ['kesController@update', $kes->id]]) !!}
    <div class="form-group">

        <div class="row">
            <div class="col">
                <label for="name">Case Name</label>
                <input class="form-control"type="text" name="name" value="{{$kes->name}}">
            </div>
        </div>
        <div class="row">
                <div class="col">
                    <label for="expenses">Expenses (RM)</label>
                    <input class="form-control"type="number" name="expenses"value="{{$kes->expenses}}">
                </div>
            </div>
            <div class="row">
                    <div class="col">
                        <label for="status">{{$kes->status}}Status</label>
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
                            <option value="{{$kes->category['id']}}">{{$kes->category['name']}} - Select a category</option>
                        @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-8">
                                <label for="customer">Customer</label>
                                <select class="form-control"name="customer_id">
                                        <option value="{{$kes->customer['id']}}">{{$kes->customer['name']}} - Select a customer</option>
                                    @foreach($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="col-4">
                                        <br>

                                       <button input="button" class="btn btn-info" id="btnshowmodal" onclick="popup();return false;" runat="server">Add a new customer</button>
                                    </div>
                                </div>
<br>
		{{Form::hidden('_method', 'PUT')}}
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <button name="submit" class="form-control btn btn-primary"type="submit">Update</button>

    </div>
</form>
</div>

<!-- Modal -->
<div id="myModal" class="modal" role="dialog">
        <div class="modal-dialog">
      
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Create Customer</h4>
            </div>
            <div class="modal-body">
              @include('inc.modal.createCustomer')
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
      
        </div>
      </div>
      <script>function popup() {
            $('[id*="myModal"]').modal('show');
          }</script>
@endsection