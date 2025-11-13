
@extends('layouts.navigation')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


  <script>
  $(document).ready(function(){
  $("#calendar").datepicker({minDate:0})
});
  </script>



<script>
    function clearText()
{
    document.getElementById('coreproduct').value = "";
}
</script>


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">



            <a href="{{ route('exportexpense')}}" class="btn btn-success" style="float: right;margin-right:10px;"><i class="fa fa-download">Excel</i></a>


               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModaly" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Core Product</i></button>




                <div class="modal fade" id="exampleModaly" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">New Core Product</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('coreproduct.store')}}" method='post'>
                            <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />



                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Core Product</label>
                                <input type="text" class="form-control" id="coreproduct" name="core_product" required>
                            </div>





                            <div class="modal-footer">
                          <button type="reset" class="btn btn-danger" data-dismiss="modal"  value="Reset" onclick="clearText()">Close</button>
                          <button type="submit" class="btn btn-primary" id="btn">Add Core Product</button>
                        </div>
                          </form>
                        </div>

                      </div>
                    </div>
                  </div>




                <div class="clearfix"></div>

                <h4 class="page-title mt-2 p-3">Core Product Table</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body table-responsive">
                    <div class="container">
                        <form action="{{route('searchexpense')}}" method="post">
                            @csrf
                        <div class="row">
                        <div class='col-md-4'>
                           <div class="form-group">From
                              <div class='input-group date'>
                                 <input type='date' class="form-control" name="fromDate"  id="" required />
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
                                <th>Core Product</th>



                                <th style="text-align:center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($coreproduct as $coreproducts)
                        <tr>

                            <td>{{$loop->iteration}}</td>
                            <td>{{$coreproducts->core_product}}</td>

                            <td>
                                <div class="center">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleMod" class="mt-3"
                                 style="float: right;margin-right:10px;"><i class='fas fa-edit' style='color: blue;'>
                                </i>
                                </button>


                                <div class="modal fade" id="exampleMod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Edit {{ $coreproducts->core_product }} Core Product</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <form action="{{ route('coreproduct.update', [$coreproducts->id])}}" method='post'>

                                            @method('PUT')
                                                     <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />





                                              <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Core Product</label>
                                                <input type="text" class="form-control"  name="core_product" required value="{{$coreproducts->core_product}}">
                                              </div>




                                            <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Update Core Product</button>
                                        </div>
                                          </form>
                                        </div>

                                      </div>
                                    </div>
                                  </div>

                             <form action="{{route('coreproduct.destroy', $coreproducts->id)}}" method="post">
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
