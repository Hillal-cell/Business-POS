
@extends('layouts.navigation')

@section('content')

<script>
    function clearText()
{
    document.getElementById('product_name').value = "";
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





                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Product</i></button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">New Purchase</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('purchase.store')}}" method='post'>
                            <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />


                            <div class="form-group">
                                <label for="recipient-name" class="coll">Product Name</label>
                                <select class="form-control" name="coreproduct_id" required>
                                  <option selected disabled value=''>Choose Product</option>
                                      @foreach($cat as $cats)
                                      <option value="{{ $cats->id}}">{{ $cats->core_product}}</option>
                                      <div id="editor-container" class="mb-1"></div>
                                      @endforeach
                                 </select>
                              </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Selling Price</label>
                                <input type="number" class="form-control" id="sellingprice" name="sellingunit" required>
                            </div>




                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Buying Price</label>
                                <input type="number"  class="form-control" id="buyingprice" name="buyingunit" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Batch Number</label>
                                <input type="text" class="form-control" id="product_code" name="batchno" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Expiry Date</label>
                                <input type="date" class="form-control" id="quantity" name="expirydate" required>
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
                                <th>Batch Number</th>
                                <th>Selling Unit</th>
                                <th>Buying Unit</th>
                                <th>Expiry Date</th>
                                {{-- <th>Alert Stock</th> --}}



                                <th style="text-align:center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($purchase as $purchases)
                        <tr>

                            <td>{{$loop->iteration}}</td>
                            <td>{{$purchases->productcore?$purchases->productcore->core_product:"-"}}</td>
                            <td>{{$purchases->batchno}}</td>
                            <td>{{$purchases->sellingunit}}</td>
                            <td>{{$purchases->buyingunit}}</td>
                            <td>{{$purchases->expirydate}}</td>


                            {{-- <td>
                                @if($purchases->alert_stock>=$products->quantity)
                                <span class="badge badge-danger">Low Stock
                                    {{$purchases->alert_stock}}
                                </span>
                                @else
                                <span class="badge badge-success">{{$purchases->alert_stock}}</span>
                                @endif
                            </td> --}}

                            <td>
                                <div class="center">

                                    <a href="{{url('purchase/'.$purchases->id )}}">  <button class="btn btn-success"><i class="fa fa-eye" style='color: #f3da35;'></i></button></a>

                                    <button type="button" style="margin-right:5px;" class="btn btn-primary" data-toggle="modal"  data-target="#exampleModal{{ $purchases->id }}"><i class='fa fa-edit'>
                                    </i>
                                    </button>





                             <form action="{{route('purchase.destroy', $purchases->id)}}" method="post">
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
