
@extends('layouts.navigation')

@section('content')

<script>
    function clearText()
{
    document.getElementById('staff_names').value = "";
    document.getElementById('staff_emails').value = "";
    document.getElementById('staff_contacts').value = "";
    document.getElementById('staff_dobs').value = "";
    document.getElementById('genders').value = "";
    document.getElementById('location').value = "";
    document.getElementById('leave').value = "";
    document.getElementById('staff_res_message').innerHTML = "";

}


$(document).ready(function() {
   const locationValidation = document.querySelector('#staff_names');
   locationValidation.addEventListener('keyup', e => {
    var token = document.getElementById('token').value

    // Let the backend do all the validation magic on blur
    $.ajax({
      type: 'post',
      url: '/validatestaff',
      _token: token,
      data: {
        "_token": "{{ csrf_token() }}",
        'name': locationValidation.value,
      },
      success: function(data) {
        console.log(data);
      if(data == 'exists'){

      document.getElementById('staff_res_message').style.display = 'block'
      document.getElementById('btn').disabled = true
      }else{
        document.getElementById('staff_res_message').style.display = 'none'
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
                <h4 class="page-title">Staffs Table</h4>
            <a href="{{ route('exportstaff')}}" class="btn btn-success" style="float: right;margin-right:10px;"><i class="fa fa-download">Excel</i></a>


            @if(Auth::user()->role->add_staff )
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Staff</i></button>
            @endif

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">New Staff</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('staff.store')}}" method='post'  enctype="multipart/form-data">
                            <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Staff Name</label>
                                <input type="text" class="form-control" id="staff_names" name="staff_name" required>
                                <div id='staff_res_message' class="text-danger" style="display: none;">This Staff name already exists</div>
                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Email</label>
                                <input type="email" class="form-control" id="staff_emails" name="staff_email" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Contact</label>
                                <input type="number" class="form-control" id="staff_contacts" name="staff_contact" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">DOB</label>
                                <input type="date" class="form-control" id="staff_dobs" name="staff_dob" required>
                                </div>


                            <div class="form-group">
                                <label class="txtlabel">Gender</label>
                                <span class="text-danger">*</span>
                                <select class="form-control" name="gender" id="genders">
                                    <option selected disabled value=''>Choose...</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="prefer not to say">Prefer not to say</option>
                                    </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Leave Days</label>
                                <input type="number" class="form-control" id="leave" name="leave_days" required>
                            </div>

                            <div class="form-group">
                                <label class="txtlabel">Home Address</label>
                                <span class="text-danger">*</span>
                                <div>
                                    <input type="text" class="form-control" id="location" name="staff_address">
                                </div>
                            </div>


                            <div class="modal-footer">
                          <button type="reset" class="btn btn-danger" data-dismiss="modal"  value="Reset" onclick="clearText()">Close</button>
                          <button type="submit" class="btn btn-primary" id="btn">Add Staff</button>
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


                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Staff Name</th>
                                <th>Contact</th>
                                <th>Email</th>

                                <th>Gender</th>
                                <th>Leave Days</th>
                                <th>Address</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($staff as $staffs)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$staffs->staff_name}}</td>
                            <td>{{$staffs->staff_contact}}</td>
                            <td>{{$staffs->staff_email}}</td>

                            <td>{{$staffs->gender}}</td>
                            <td>{{$staffs->leave_days}}</td>
                            <td>{{$staffs->staff_address}}</td>



                            <td>
                                <div class="center">

                                    <a href="{{url('staff/'.$staffs->id )}}">  <button class="btn btn-success"><i class="fa fa-eye" style='color: #f3da35;'></i></button></a>



                                    @if(Auth::user()->role->delete_staff )
                             <form action="{{route('staff.destroy', $staffs->id)}}" method="post">
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
