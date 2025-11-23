
@extends('layouts.navigation')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-8">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Products </h5>

          <div class="modal-body">
            <form action="{{ route('stock.store')}}" method='post'>
              <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="row">
            </form>
          </div>


          <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Product Names</th>
                    <th>Quantity</th>
                    <th>Buying Price</th>



                    <th style="text-align:center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $stocks)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$stocks->purchasecart->core_product}}</td>
                <td>{{$stocks->qty}}</td>
                <td>{{$stocks->buyingunit}}</td>
                <td>
                    <div class="center">
                 <form action="{{route('purchasecart.destroy', $stocks->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger"  onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                    </form>
                        </div>
                </td>
            </tr>

            @endforeach
            </tbody>

        </table>



        <form action="{{ route('purchase.store')}}" method='post'>
            <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

           <div class="row" style="margin-top: 30px;">
            <div class="form-group col-md-6">
                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Date</label>
                <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="" name="date" required>
            </div>


            <div class="form-group col-md-6">
                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Paid</label>
                <input type="text" class="form-control" id="" name="total" value="{{$total}}">
            </div>

            <div class="form-group col-md-6">
                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Supplier</label>
                <input type="text" class="form-control" id="" name="supplier_name">
            </div>

            <div class="form-group col-md-6">
                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Supplier Contact</label>
                <input type="text" class="form-control" id="" name="supplier_contact">
            </div>

            <div class="form-group col-md-6">
                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Discount</label>
                <input type="text" class="form-control" id="" name="discount">
            </div>

            <h2>Total:{{$total}} </h2>

        <div class="col-md-6" style="">
            <button type="submit" class="btn btn-sm btn-primary" id="">Submits</button>
        </div>
        </div>
          </form>


        </div>
      </div>


</div>


</div>
<div class="form-group col-md-4">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Adding Purchase</h5>
          <div class="modal-body">
            <form action="{{ route('purchasecart.store')}}" method='post'>
              <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

              <div class="form-group">
                <label for="exampleDataList" class="form-label">Products Here</label>
                <select class="form-control" name="coreproduct_id" id="" required>
                    <option selected disabled value=''>Choose Product</option>
                   @foreach($product as $products)
                   <option value="{{ $products->id}}">{{ $products->core_product}}
                </option>
                   <div id="editor-container" class="mb-1"></div>
                   @endforeach
                   </select>
              </div>

              <div class="form-group">
                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Quantity</label>
                <input type="number"  class="form-control" id="sub_category" name="qty" required>
            </div>


              <div class="form-group">
                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Buying Price</label>
                <input type="text"  class="form-control" id="" name="buyingunit" required>
            </div>



            <div class="form-group">
                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Batch Number</label>
                <input type="text"  class="form-control" id="sub_avail" name="batchno" required>
            </div>


              <div class="form-group">
                  <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Expiry Date</label>
                  <input type="date" class="form-control" id="" name="expirydate" required>
              </div>







              <div class="modal-footer">
            <button type="reset" class="btn btn-secondary" data-dismiss="modal"  value="Reset" onclick="clearText()">Close</button>
            <button type="submit" class="btn btn-primary" id="btn">Submit</button>
          </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>


<script>
    function mult(value){
        var x,y;
        x=value-{{$total}};

        document.getElementById('changetotal').value=x;

    }

var sound = document.getElementById("sound");
var button = document.querySelector("#btn");
button.addEventListener("click", function() {
   sound.play();
});
</script>
 @endsection
