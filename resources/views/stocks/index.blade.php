
@extends('layouts.navigation')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-8">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Added Stock</h5>

          <div class="modal-body">
            <form action="" method='post'>
              <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="row">
            </form>
          </div>


          <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Buying Price</th>



                    <th style="text-align:center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stock as $stocks)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$stocks->stockproduct->product_name}}</td>
                <td>{{$stocks->qty}}</td>
                <td>{{$stocks->buying_price}}</td>
                <td>
                    <div class="center">
                 <form action="{{route('stockcart.destroy', $stocks->id)}}" method="post">
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



        <form action="{{ route('stock.store')}}" method='post'>
            <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

           <div class="row" style="margin-top: 30px;">
            <div class="form-group col-md-6">
                <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="" name="date" required>
            </div>

        <div class="col-md-6" style="">
            <button type="submit" class="btn btn-sm btn-primary" id="">Submit</button>
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
          <h5 class="card-title">Adding Stock</h5>
          <div class="modal-body">
            <form action="{{ route('stockcart.store')}}" method='post'>
              <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

              <div class="form-group">
                <label for="exampleDataList" class="form-label">Products</label>
                <select class="form-control" name="product_id" id="source-field" required>
                    <option selected disabled value=''>Choose Product</option>
                   @foreach($product as $products)
                   <option value="{{ $products->id}}">{{ $products->product_name}}
                </option>
                   <div id="editor-container" class="mb-1"></div>
                   @endforeach
                   </select>
              </div>


              <div class="form-group">
                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Buying Price</label>
                <input type="text" readonly class="form-control" id="sub_category" name="buying_price" required>
            </div>


            <div class="form-group">
                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Available Quantity</label>
                <input type="text" readonly class="form-control" id="sub_avail" name="qty" required>
            </div>


              <div class="form-group">
                  <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Quantity</label>
                  <input type="number" class="form-control" id="sub_qty" name="qty_id" required>
              </div>



              <div class="form-group">
                  <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Date</label>
                  <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="" name="date" required>
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
    //Fetching buying price from products table
    document.getElementById('source-field').addEventListener('change', function() {
    var sourceField = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/getSubCatAgainstMainCatEdit/' + sourceField, true);
    xhr.onload = function() {
        if (this.status === 200) {
            var data = JSON.parse(this.responseText);
            document.getElementById('sub_category').value = data;
        }
    };
    xhr.send();
});


document.getElementById('source-field').addEventListener('change', function() {
    var sourceField = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/quantityavailable/' + sourceField, true);
    xhr.onload = function() {
        if (this.status === 200) {
            var datas = JSON.parse(this.responseText);
            document.getElementById('sub_avail').value = datas;
        }
    };
    xhr.send();
});
</script>
 @endsection
