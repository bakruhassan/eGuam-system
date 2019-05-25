
{!! Form::open(['action' => 'customersController@store']) !!}
    <div class="form-group">

        <div class="row">
            <div class="col">
                <label for="name">Customer Name</label>
                <input class="form-control"type="text" name="name">
            </div>
        </div>
        <div class="row">
                <div class="col">
                    <label for="address">Address</label>
                    <input class="form-control"type="text" name="address">
                </div>
            </div>
            <div class="row">
                    <div class="col">
                        <label for="phone">Phone Number</label>
                        <input class="form-control"type="number" name="phone">
                    </div>
                </div>
            <div class="row">
                    <div class="col">
                        <label for="ic">IC Number</label>
                        <input class="form-control"type="text" name="ic">
                    </div>
                </div>

                
                    <div class="row">
                            <div class="col-8">
                                <label for="birthdate">Birthdate</label>
                               <input class="form-control"type="date" name="birthdate">
                                </div>
                            </div>
<br>
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <button name="submit" class="form-control btn btn-primary"type="submit">Add</button>

    </div>
</form>
