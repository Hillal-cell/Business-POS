
@extends('layouts.navigation')

@section('content')

<script>
    function clearText()
{
    document.getElementById('unitname').value = "";
    document.getElementById('symbolid').value = "";
    document.getElementById('unit_res_message').innerHTML = "";
}


$(document).ready(function() {
   const locationValidation = document.querySelector('#unitname');
   locationValidation.addEventListener('keyup', e => {
    var token = document.getElementById('token').value

    // Let the backend do all the validation magic on blur
    $.ajax({
      type: 'post',
      url: '/validateunit',
      _token: token,
      data: {
        "_token": "{{ csrf_token() }}",
        'name': locationValidation.value,
      },
      success: function(data) {
        console.log(data);
      if(data == 'exists'){

      document.getElementById('unit_res_message').style.display = 'block'
      document.getElementById('btn').disabled = true
      }else{
        document.getElementById('unit_res_message').style.display = 'none'
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
                <h4 class="page-title">Units Table</h4>
            <a href="{{ route('exportunit')}}" class="btn btn-success" style="float: right;margin-right:10px;"><i class="fa fa-download">Excel</i></a>
            <a href="" onclick="window.print()" class="btn btn-success" style="float: right;margin-right:10px;"><i class="fa fa-print">Print</i></a>

            @if(Auth::user()->role->add_unit )
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Unit</i></button>
               @endif


                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">New Unit</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('unit.store')}}" method='post'>
                            <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Unit Name</label>
                                <input type="text" class="form-control" id="unitname" name="unit_name" required>
                                <div id='unit_res_message' class="text-danger" style="display: none;">This Unit name already exists</div>
                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Symbol</label>
                                <input type="text" class="form-control" id="symbolid" name="symbol" required>
                            </div>


                            <div class="modal-footer">
                          <button type="reset" class="btn btn-danger" data-dismiss="modal"  value="Reset" onclick="clearText()">Close</button>
                          <button type="submit" class="btn btn-primary" id="btn">Add Unit</button>
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
                        <form action="{{route('searchunit')}}" method="post">
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
                                <th>Unit Name</th>
                                <th>Symbol</th>
                                <th>Date</th>


                                <th style="text-align:center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($units as $unit)
                        <tr>

                            <td>{{$loop->iteration}}</td>

                            <td>{{$unit->unit_name}}</td>
                            <td>{{$unit->symbol}}</td>
                            <td>{{$unit->created_at->diffForHumans()}}</td>


                            <td>
                                <div class="center">

                                    <a href="{{url('unit/'.$unit->id )}}">  <button class="btn btn-success"><i class="fa fa-eye" style='color: #f3da35;'></i></button></a>



                                    @if(Auth::user()->role->update_unit )
                                    <button type="button" style="margin-right:5px;" class="btn btn-primary" data-toggle="modal"  data-target="#exampleModal{{ $unit->id }}"><i class='fa fa-edit'>
                                    </i>
                                    </button>
                                    @endif


                                    <div class="modal fade" id="exampleModal{{ $unit->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Edit {{ $unit->unit_name }}</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <form action="{{ route('unit.update', [$unit->id])}}" method='post'>

                                                @method('PUT')
                                                         <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                                                <div class="form-group">
                                                  <label for="recipient-name" class="col-form-label">Unit Name</label>
                                                  <input type="text" class="form-control"  name="unit_name" required value="{{$unit->unit_name}}">
                                                </div>


                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Symbol</label>
                                                    <input type="text" class="form-control"  name="symbol" required value="{{$unit->symbol}}">
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


                                      @if(Auth::user()->role->delete_unit )
                             <form action="{{route('unit.destroy', $unit->id)}}" method="post">
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
 @endsection
