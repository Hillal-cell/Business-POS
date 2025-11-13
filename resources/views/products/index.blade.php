
@extends('layouts.navigation')

@section('content')

<script src="{{ asset('js\jquery.js')}}"></script>
<script>
    function clearText()
{
    document.getElementById('product_name').value = "";
    document.getElementById('productcategory').value = "";
    document.getElementById('sellingprice').value = "";
    document.getElementById('example').value = "";
    document.getElementById('buyingprice').value = "";
    document.getElementById('productcode').value = "";
    document.getElementById('quantity').value = "";
    document.getElementById('alert_stock').value = "";
    document.getElementById('product_res_message').innerHTML = "";
}


$(document).ready(function() {
   const locationValidation = document.querySelector('#product_name');
   locationValidation.addEventListener('keyup', e => {
    var token = document.getElementById('token').value

    // Let the backend do all the validation magic on blur
    $.ajax({
      type: 'post',
      url: '/validateproduct',
      _token: token,
      data: {
        "_token": "{{ csrf_token() }}",
        'name': locationValidation.value,
      },
      success: function(data) {
        console.log(data);
      if(data == 'exists'){

      document.getElementById('product_res_message').style.display = 'block'
      document.getElementById('btn').disabled = true
      }else{
        document.getElementById('product_res_message').style.display = 'none'
        document.getElementById('btn').disabled = false
      }
      },
      error: function(error) {
        console.log(error);
      }
      });
      }
      );
      }
      );
</script>


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Products Table</h4>
                <a href="{{ route('exportproduct')}}" class="btn btn-success" style="float: right;margin-right:10px;"><i class="fa fa-download">Excel</i></a>

                <div class="row">
                    <form action="{{ route('filterproduct') }}" method="POST">
                        @csrf
                    <div class="col-md-6">

                        <select  class="form-select js-choice" id="select-value" size="1" name="select" id="select-value" data-options='{"removeItemButton":true,"placeholder":true}' >
                       <option selected disabled value=''>Choose Product Category</option>
                            @foreach($productcategories as $productcategory)
                             <option
                             value="{{ $productcategory->id}}">{{ $productcategory->category_name}}</option>
                             selected
                           @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                    <button type="submit" class="btn btn-primary mt-3">Filter</button>
                </div>

                </form>
            </div>



                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Product</i></button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('products.store')}}" method='post' enctype="multipart/form-data">
                            <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Product Name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" required>
                                <div id='product_res_message' class="text-danger" style="display: none;">This product name already exists</div>

                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="coll">Product Category</label>
                                <select class="form-control" name="product_categoryid" id="productcategory" required>
                                  <option selected disabled value=''>Choose Name</option>
                                      @foreach($productcategories as $productcategory)
                                      <option value="{{ $productcategory->id}}">{{ $productcategory->category_name}}</option>
                                      <div id="editor-container" class="mb-1"></div>
                                      @endforeach
                                 </select>
                              </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Selling Price</label>
                                <input type="number" class="form-control" id="sellingprice" name="selling_price" required>
                            </div>


                            <div class="form-group">
                                <label>Unit Name</label>
                                <select class="form-control" name="unit_id" id="example">
                                    <option selected disabled value=''>Choose Unit Symbol</option>
                                   @foreach($unit as $units)
                                   <option value="{{ $units->id}}">{{ $units->symbol}}
                                </option>
                                   <div id="editor-container" class="mb-1"></div>
                                   @endforeach
                                   </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Buying Price</label>
                                <input type="number"  class="form-control" id="buyingprice" name="buying_price" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Product Code</label>
                                <input type="text" class="form-control" id="productcode" name="product_code" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" required>
                            </div>





                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label" style="font-weight:bolder;">Alert Stock</label>
                                <input type="number" class="form-control"  id="alert_stock" name="alert_stock" required>
                              </div>

                            <div class="modal-footer">
                          <button type="reset" class="btn btn-danger" data-dismiss="modal"  value="Reset" onclick="clearText()">Close</button>
                          <button type="submit" class="btn btn-primary" id="btn">Add Product</button>
                        </div>
                          </form>
                        </div>

                      </div>
                    </div>
                  </div>




                <div class="clearfix"></div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body table-responsive">
                    <div class="container">
                        <form action="{{route('searchproduct')}}" method="post">
                            @csrf
                        <div class="row">
                        <div class='col-md-4'>
                           <div class="form-group">From
                              <div class='input-group date'>
                                 <input type='date' class="form-control" name="fromDate" required />
                                 <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-calendar"></span>
                                 </span>
                              </div>
                           </div>
                        </div>
                        <div class='col-md-4'>
                           <div class="form-group">To
                              <div class='input-group date'>
                                 <input type='date' class="form-control" name="toDate" required />
                                 <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-calendar"></span>
                                 </span>
                              </div>
                           </div>
                        </div>


                        <div class='col-md-4'>
                            <div class="form-group">
                               <div class='input-group date' >

                                  <button type="submit" class="btn btn-primary mt-4" name="search" title="search"><i class="fa fa-filter" aria-hidden="true">Filter</i></button>

                               </div>
                            </div>
                         </div>
                    </div>

                </form>
                     </div>

                     <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                {{-- <th>Product Code</th> --}}
                                <th>Category</th>
                                {{-- <th>Available Qty</th> --}}
                                <th>Selling Price</th>
                                <th>Unit</th>
                                <th>Quantity</th>


                                <th>Alert Stock</th>
                                {{-- <th>Date</th> --}}


                                <th style="text-align:center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($product as $products)
                        <tr>

                            <td>{{$loop->iteration}}</td>
                            <td>{{$products->product_name}}</td>
                            {{-- <td>{{$products->product_code}}</td> --}}
                            <td>{{$products->member?$products->member->category_name:"-"}}</td>
                            <td>{{$products->selling_price}}</td>
                            <td>{{$products->unit?$products->unit->symbol:"-"}}</td>
                            <td>{{$products->quantity}}</td>

                            <td>
                                @if($products->alert_stock>=$products->quantity)
                                <span class="badge badge-danger">Low Stock
                                    {{$products->alert_stock}}
                                </span>
                                @else
                                <span class="badge badge-success">{{$products->alert_stock}}</span>
                                @endif
                            </td>
                            {{-- <td>{{$products->created_at}}</td> --}}
                            <td>
                                <div class="center">

                                    <a href="{{url('products/'.$products->id )}}">  <button class="btn btn-success"><i class="fa fa-eye" style='color: #f3da35;'></i></button></a>

                                    <button type="button" style="margin-right:5px;" class="btn btn-primary" data-toggle="modal"  data-target="#exampleModal{{ $products->id }}"><i class='fa fa-edit'>
                                    </i>
                                    </button>


                                    <div class="modal fade" id="exampleModal{{ $products->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Edit {{ $products->product_name }}</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <form action="{{ route('products.update', [$products->id])}}" method='post'>
                                                @method('PUT')
                                                         <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                                                <div class="form-group">
                                                  <label for="recipient-name" class="col-form-label">Product Name</label>
                                                  <input type="text" class="form-control"  name="product_name" required value="{{$products->product_name}}">
                                                </div>


                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Product Code</label>
                                                    <input type="text" class="form-control"  name="product_code" required value="{{$products->product_code}}">
                                                  </div>


                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Product Category</label>
                                                    <select class="form-control" name="product_categoryid" id="example-getting-started">
                                                        <option selected disabled value=''>Choose Product Category</option>
                                                        @foreach($productcategories as $productcategory)
                                                        <option @if ($productcategory->id == $products->product_categoryid)
                                                           selected
                                                        @endif value="{{ $productcategory->id}}">{{ $productcategory->category_name}}</option>
                                                         @endforeach
                                                         <div id="editor-container" class="mb-1"></div>
                                                       </select>
                                                  </div>

                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Buying Price</label>
                                                    <input type="number" class="form-control"  name="buying_price" required value="{{$products->buying_price}}">
                                                  </div>

                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Selling Price</label>
                                                    <input type="number" class="form-control"  name="selling_price" required value="{{$products->selling_price}}">
                                                  </div>

                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Unit</label>
                                                    <select class="form-control" name="unit_id" id="example-getting-started">
                                                        <option selected disabled value=''>Choose Product Category</option>
                                                        @foreach($unit as $units)
                                                        <option @if ($units->id == $products->unit_id)
                                                           selected
                                                        @endif value="{{ $units->id}}">{{ $units->unit_name}}</option>
                                                         @endforeach
                                                         <div id="editor-container" class="mb-1"></div>
                                                       </select>
                                                  </div>

                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Quantity</label>
                                                    <input type="number" class="form-control"  name="quantity" required value="{{$products->quantity}}">
                                                  </div>

                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Alert Stock</label>
                                                    <input type="number" class="form-control"  name="alert_stock" required value="{{$products->alert_stock}}">
                                                  </div>


                                                <div class="modal-footer">
                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                              <button type="submit" class="btn btn-primary">Update Record</button>
                                            </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>


                             <form action="{{route('products.destroy', $products->id)}}" method="post">
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
                    <!-- end row -->
                </div>
            </div>
        </div>
    </div>
</div>
 @endsection
