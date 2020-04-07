@extends('crudbooster::admin_template')


@section('content')

<div class="container-fluid col-md-12 border border-warning ">
    
    <form method='post' class='calc' action='{{ CRUDBooster::mainpath('add-save') }}'>
         {{ csrf_field() }}

        <div class="form-row col-md-12 "> 
            <div class="col-md-6">
                <label>To Branch (Delivery)</label>

                <select class="form-control" id="tobranch" name="tobranch" required>
                    <option value=""> Our Branches </option>
                    @foreach($cms_users as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label>From Branch (Booking)</label>                           
                <select class="form-control" id="frombranch" name="frombranch" required>
                @foreach($users as $c)
                    <option value="{{ $c->name }}">{{ $c->name }}</option>
                    @endforeach
                    </select>
               </div>
        </div>

        <div class="form-group-row col-md-12">
            <div class="col-md-3 mb-4">
                <label> To Party Contact Number</label>
                <input type="text" class="form-control" name="topartyno" id="topartyno" placeholder="Enter the Mobile Number"
                    required>
                <div class="invalid-feedback">
                    <i>Dont Book Anything Without Number</i>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <label for="">To Party Name</label>
                <input type="text" class="form-control" name="toname" placeholder="Enter Party Name" required>

            </div>
            <div class="col-md-3 mb-4">
                <label for="">From Party Contact Number</label>
                <input type="text" class="form-control" name="from_contact" id="" placeholder="Enter the Mobile Number"
                    required>
                <div class="invalid-feedback">
                    <i>Dont Book Anything Without Number</i>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <label for="validationCustom05">From Party Name</label>
                <input type="text" class="form-control" name="from_name"   id="" placeholder="Enter Party Name" required>
                <div class="invalid-feedback">

                </div>
            </div>
        </div>

        <div class="form-group col-md-12">
            <div class="col-md-3 mb-3">
                <input type="text" class="form-control" name="togst" id=" " placeholder="To Party GST Number">

            </div>
            <div class="col-md-3 mb-3">
                <input type="text" class="form-control" name="ewaybill" id=" " placeholder="To Party eway bill">
                <div class="invalid-feedback">
                    Above Rs.50,000 Value Products must
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <input type="text" class="form-control" name="fromgst" id=" " placeholder="From Party GST Number">

            </div>
        </div>
        <div class="form-group col-md-12">
            <div class="col-md-2">
                <label for="validationCustom03">Luggage Details</label>
                <input type="text" class="form-control" name="Luggage_details" id="" placeholder="Details about Parcel"
                    required>

            </div>
            <div class="col-md-1">
                <label for=" ">Qunatity</label>
                <input id="total_Qut" onkeyup="val()" type="number" name="total_Qut" class="form-control"   >
                <div class="invalid-feedback">

                </div>
            </div>
            <div class="col-md-1">
                <label for=" ">Rate/Unit</label>
                <input id="rate" onkeyup="val()" type="number" class="form-control" name="rate" required>
                <div class="invalid-feedback">

                </div>
            </div>
            <div class="col-md-2">
                <label for=""> Door Step </label></br>
                <select class="form-control" name="door_serv" id=" ">
                    <option value="Office">Office</option>
                    <option value="Pickup">Pickup</option>
                    <option value="Delivery">Delivery</option>
                    <option value="PND">P N D</option>
                </select>
                <div class="invalid-feedback">

                </div>
            </div>
            <div class="col-md-1">
                <label for=" ">Charge</label>
                <input type="text" class="form-control" name="door_pay" id="door_pay2" placeholder="Door Service" >
                <div class="invalid-feedback">
                    (Additional)
                </div>
            </div>
            <div class="col-md-1">
                <label>Loading</label>
                <input type="text" class="form-control" name="load" id="load" placeholder=" " >
                <div class="invalid-feedback">
                    
                </div>
            </div>
            <div class="col-md-2">
                <label>TOTAL</label>
                <h1 id="sub_tot"> </h1> 
                <input name="sub_tot" id="sub_tot" type="number" class="form-control">
                <div class="invalid-feedback">
                    Without GST Prize
                </div>
            </div>
            <div class="col-md-2">
                <label for="validationCustom05">Remarks</label>
                <input type="text" class="form-control" name="sugg" id=" " placeholder="Any Information" >
                <div class="invalid-feedback">
                    Note
                </div>
            </div>

        </div>

        <div class="form-group col-md-12">
            <div class="col-md-2">
                <label for=""> Payment Mode</label></br>                                     
                <select class="form-control" name="payment_mode" id=" ">
                    <option value="Topay">ToPay</option>
                    <option value="Paid">Paid</option>
                    <option value="Credit">Credit</option>
                
                </select>

            </div>
            <div class="col-md-2">
                <label for="validationCustom04"> GST Tax</label>
                <input type="text" class="form-control" name="sg"id="sg1" placeholder="SGST: 2.5%" required>
                <input type="text" class="form-control" name="cg" id="cg1" placeholder="CGST: 2.5%" required></br>

                <input type="text" class="form-control" name="togstamount" id="totgst" placeholder="IGST/GST: 5%" required>
                <div class="invalid-feedback">

                </div>
            </div>
            <div class="col-md-2 ">
                <label for="validationCustom03"> Total Net Payment</label>
                <input type="text" class="form-control" name="netpay" id="validationCustom03" placeholder="TOTAL" required>

            </div>
            <div class="col-md-2 ">
                <label for="validationCustom03">Old Recipt</label>
                <input type="text" class="form-control" id="validationCustom03" placeholder="Number" required>

            </div>
            <div class="col-md-2 ">
                <label for="validationCustom03">Issue Date</label>
                <input type="text" class="form-control" id="validationCustom03" placeholder="" required>

            </div>
            <div class="col-md-4">
                </br>
                <button type="submit" class="btn btn-primary mb-2">Book</button>
                <button type="Reset" class="btn btn-warning mb-2">Reset</button>
            </div>

        </div>
    </form>

</div>

@endsection

@push('script')
<script src="{{ asset('js/calc.js')}}"></script>
@endpush
 
  


