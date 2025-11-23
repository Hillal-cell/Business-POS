
@extends('layouts.navigation')

@section('content')

<script>
    function clearText()
{
    document.getElementById('suppliername').value = "";
    document.getElementById('supplieremail').value = "";
    document.getElementById('supplieraddress').value = "";
    document.getElementById('supplierphone').value = "";
    document.getElementById('supplierdate').value = "";
}
</script>


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Expense Table</h4>

            <a href="{{ route('exportsupplier')}}" class="btn btn-success" style="float: right;margin-right:10px;"><i class="fa fa-download">Excel</i></a>


            @if(Auth::user()->role->add_supplier )
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exammpleModaly" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Supplier</i></button>
                    @endif

                    <form action="{{ route('import') }}"
                    method="POST"
                    enctype="multipart/form-data">
                  @csrf
                  <div class="col-4">
                  <input type="file" name="file" id="fileInput"
                         class="form-control">
                  </div>
                  <br>
                  <button class="btn btn-success" id="submitButton" style="display:none;">
                        Import User Data
                     </button>
               </form>

                <div class="modal fade" id="exammpleModaly" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">New Supplier</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('supplier.store')}}" method='post'>
                            <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />



                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Supplier Name</label>
                                <input type="text" class="form-control" minlength="2" name="supplier_name" id="suppliername" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Email</label>
                                <input type="email" class="form-control" id="supplieremail" name="email" required>
                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Address</label>
                                <input type="text" class="form-control" id="supplieraddress" name="address" required>
                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Phone</label>
                                <input type="number" class="form-control" id="supplierphone" name="phone" required>
                            </div>



                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Date</label>
                                <input type="date" class="form-control" id="supplierdate" name="supplier_date" required>
                            </div>



                            <div class="modal-footer">
                          <button type="reset" class="btn btn-danger" data-dismiss="modal"  value="Reset" onclick="clearText()">Close</button>
                          <button type="submit" class="btn btn-primary" id="btn">Add Supplier</button>
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
                        <form action="{{route('searchsupplier')}}" method="post">
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
                                <th>Supplier Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Date</th>


                                <th style="text-align:center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($supplier as $suppliers)
                        <tr>

                            <td>{{$loop->iteration}}</td>
                            <td>{{$suppliers->supplier_name}}</td>
                            <td>{{$suppliers->address}}</td>
                            <td>{{$suppliers->phone}}</td>
                            <td>{{$suppliers->email}}</td>
                            <td>{{$suppliers->supplier_date}}</td>
                            <td>
                                <div class="center">

                                    <a href="{{url('supplier/'.$suppliers->id )}}">  <button class="btn btn-success"><i class="fa fa-eye" style='color: #f3da35;'></i></button></a>


                                    @if(Auth::user()->role->update_supplier )
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleMod" class="mt-3"
                                 style="float: right;margin-right:10px;"><i class='fas fa-edit' style='color: blue;'>
                                </i>
                                </button>
                                  @endif


                                <div class="modal fade" id="exampleMod" tabindex="-1" role="dialog" aria-labelledby="examppleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="examppleModalLabel">Edit {{ $suppliers->supplier_name }} Supplier</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <form action="{{ route('supplier.update', [$suppliers->id])}}" method='post'>

                                            @method('PUT')
                                                     <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />





                                              <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Supplier Name</label>
                                                <input type="text" class="form-control"  name="supplier_name" required value="{{$suppliers->supplier_name}}">
                                              </div>

                                              <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Address</label>
                                                <input type="text" class="form-control"  name="address" required value="{{$suppliers->address}}">
                                              </div>


                                              <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Phone</label>
                                                <input type="number" class="form-control"  name="phone" required value="{{$suppliers->phone}}">
                                              </div>


                                              <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Email</label>
                                                <input type="email" class="form-control"  name="email" required value="{{$suppliers->email}}">
                                              </div>


                                              <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Date</label>
                                                <input type="date" class="form-control"  name="supplier_date" required value="{{$suppliers->supplier_date}}">
                                              </div>



                                            <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Update Supplier</button>
                                        </div>
                                          </form>
                                        </div>

                                      </div>
                                    </div>
                                  </div>

                           @if(Auth::user()->role->delete_supplier )
                             <form action="{{route('supplier.destroy', $suppliers->id)}}" method="post">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger"  onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                                </form>
                            @endif

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
<script src="{{ asset('js\jquery.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#fileInput').change(function() {
            $('#submitButton').show();
        });
    });
</script>
 @endsection
