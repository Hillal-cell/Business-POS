
@extends('layouts.navigation')

@section('content')

<script src="{{ asset('js\jquery.js')}}"></script>
<script>
    function clearText()
{
    document.getElementById('role_name').value = "";
    document.getElementById('rolename_res_message').innerHTML = "";
}

$(document).ready(function() {
   const locationValidation = document.querySelector('#role_name');
   locationValidation.addEventListener('keyup', e => {
    var token = document.getElementById('token').value

    // Let the backend do all the validation magic on blur
    $.ajax({
      type: 'post',
      url: '/validaterole',
      _token: token,
      data: {
        "_token": "{{ csrf_token() }}",
        'name': locationValidation.value,
      },
      success: function(data) {
        console.log(data);
      if(data == 'exists'){

      document.getElementById('rolename_res_message').style.display = 'block'
      document.getElementById('btn').disabled = true
      }else{
        document.getElementById('rolename_res_message').style.display = 'none'
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
                <h4 class="page-title">Roles Table</h4>
            <a href="{{ route('exportunit')}}" class="btn btn-success" style="float: right;margin-right:10px;"><i class="fa fa-download">Excel</i></a>


            @if(Auth::user()->role->add_unit )
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Role</i></button>
               @endif


                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">New Role</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('userpermission.store')}}" method='post'  enctype="multipart/form-data">
                            <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Role Name</label>
                                <input type="text" class="form-control" id="role_name" name="rolename" required>
                                <div id='rolename_res_message' class="text-danger" style="display: none;">This Role name already exists</div>
                            </div>




                            <div class="modal-footer">
                          <button type="reset" class="btn btn-danger" data-dismiss="modal"  value="Reset" onclick="clearText()">Close</button>
                          <button type="submit" class="btn btn-primary" id="btn">Add Role</button>
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
                        <form action="{{route('searchrole')}}" method="post">
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
                                <th>Role Name</th>
                                {{-- <th style="text-align:center;">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($flyrole as $flyroles)
                        <tr>

                            <td>{{$loop->iteration}}</td>

                            <td>{{$flyroles->rolename}}</td>



                            <td>
                                <div class="center">
                                    {{-- @if(Auth::user()->role->update_unit )
                                    <button type="button" style="margin-right:5px;" class="btn btn-primary" data-toggle="modal"  data-target="#exampleModal{{ $flyroles->id }}"><i class='fa fa-edit'>
                                    </i>
                                    </button>
                                    @endif --}}


                                    <div class="modal fade" id="exampleModal{{ $flyroles->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Edit {{ $flyroles->rolename }}</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <form action="{{ route('role.update', [$flyroles->id])}}" method='post'>

                                                @method('PUT')
                                                         <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                                                <div class="form-group">
                                                  <label for="recipient-name" class="col-form-label">Role Name</label>
                                                  <input type="text" class="form-control"  name="rolename" required value="{{$flyroles->rolename}}">
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
{{--

                                      @if(Auth::user()->role->delete_unit )
                             <form action="{{route('role.destroy', $flyroles->id)}}" method="post">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger"  onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                                </form>
                                    @endif --}}


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
