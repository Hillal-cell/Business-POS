
@extends('layouts.navigation')

@section('content')




<div class="container">
    <audio id="sound" src="{{ asset('sound/pop.mp3') }}"></audio>
<div class="row">
<div class="col-md-8">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Cart</h5>

          <div class="modal-body">
            <form action="{{ route('cart.store')}}" method='post'>
              <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

              <div class="row">
                <div class="form-group col-md-4">
                    <label for="exampleDataList" class="form-label">Products</label>
                    <select class="form-control" name="product_id" id="example-getting-started" required>
                        <option selected disabled value=''>Choose Product</option>
                       @foreach($product as $products)
                       <option value="{{ $products->id}}">{{ $products->product_name}}
                    </option>
                       <div id="editor-container" class="mb-1"></div>
                       @endforeach
                       </select>
                  </div>


              <div class="form-group col-md-4">
                  <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Quantity</label>
                  <input type="number" class="form-control" id="" name="qty" value="1" required>
              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add to Cart</button>
          </div>
            </form>
          </div>


          <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>



                    <th style="text-align:center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $carts)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$carts->cart?$carts->cart->product_name:"-"}}</td>
                <td>{{$carts->qty}}</td>
                <td>{{$carts->selling_priceid}}</td>
                <td>
                    <div class="center">
                 <form action="{{route('cart.destroy', $carts->id)}}" method="post">
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

        <a href="#" class="btn btn-primary">Total :: {{$total}} shs
        </a>
        </div>
      </div>


</div>


</div>
<div class="form-group col-md-4">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Sale Product</h5>
          <div class="modal-body">
            <form action="{{ route('sale.store')}}" method='post'>
              <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />



              <div class="form-group">
                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Amount Paid</label>
                <input type="number" class="form-control" id="change" name="paid" onkeyup="mult(this.value);" required>
            </div>



            <div class="form-group">
                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Change</label>
                <input type="text" class="form-control" name="total" id="changetotal" readonly value="">
            </div>






              <div class="form-group">
                  <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Discount (Optional)</label>
                  <input type="number" class="form-control"  name="discount">
              </div>


              <div class="form-group">
                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Customer Name (Optional)</label>
                <input type="text" class="form-control" name="customer_name">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Customer Contact (Optional)</label>
                <input type="text" class="form-control" name="customer_contact">
            </div>




              <div class="form-group">
                  <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Date</label>
                  <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>"  name="date" required>
              </div>


                <div class="form-group">
                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Total</label>
                <input type="text" class="form-control" name="product_total" readonly value="{{$total}}">
            </div>


              <div class="modal-footer">
            <button type="reset" class="btn btn-secondary" data-dismiss="modal"  value="Reset" onclick="clearText()">Reset</button>
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
