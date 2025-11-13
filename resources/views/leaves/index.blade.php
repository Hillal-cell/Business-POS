
@extends('layouts.navigation')

@section('content')

<script>
    function clearText()
{
    document.getElementById('staff_names').value = "";
    document.getElementById('sub_avail').value = "";
    document.getElementById('totaldays').value = "";
    document.getElementById('source-field').value = "";



}
</script>


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Leaves Table</h4>
            <a href="{{ route('exportleave')}}" class="btn btn-success" style="float: right;margin-right:10px;"><i class="fa fa-download">Excel</i></a>



                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Leave</i></button>


                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">New Leave</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('leave.store')}}" method='post'>
                            <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />


                            <div class="form-group">
                                <select  class="form-select js-choice" id="source-field" size="1" name="staffuser_id" id="select-value" data-options='{"removeItemButton":true,"placeholder":true}' >
                               <option selected disabled value=''>Choose Staff</option>
                                    @foreach($userstaff as $userstaffs)
                                     <option
                                     value="{{ $userstaffs->id}}">{{ $userstaffs->staff_name}}</option>
                                     selected
                                   @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Leave Name</label>
                                <input type="text" class="form-control" id="staff_names" name="leave_name" required>

                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Leave Days Available</label>
                                <input type="text" class="form-control" id="sub_avail" name="leavedays">
                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Leave Days</label>
                                <input type="number" class="form-control" id="totaldays" name="leave_days" required>
                            </div>




                            <div class="modal-footer">
                          <button type="reset" class="btn btn-danger" data-dismiss="modal"  value="Reset" onclick="clearText()">Close</button>
                          <button type="submit" class="btn btn-primary" id="btn">Add Leave</button>
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
                                <th>Leave Name</th>
                                <th>Leave Days</th>
                                <th>Remaining Leave Days</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($leave as $leaves)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$leaves->leavetype?$leaves->leavetype?->staff_name:"-"}}</td>
                            <td>{{$leaves->leave_name}}</td>
                            <td>{{$leaves->leave_days}}</td>
                            <td>{{$leaves->leavetype?$leaves->leavetype?->leave_days:"-"}}</td>

                            <td>
                                <div class="center">

                                    <a href="{{url('leave/'.$leaves->id )}}">  <button class="btn btn-success"><i class="fa fa-eye" style='color: #f3da35;'></i></button></a>




                             <form action="{{route('leave.destroy', $leaves->id)}}" method="post">
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

<script>
document.getElementById('source-field').addEventListener('change', function() {
    var sourceField = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/leavey/' + sourceField, true);
    xhr.onload = function() {
        if (this.status === 200) {
            var data = JSON.parse(this.responseText);
            document.getElementById('sub_avail').value = data;
        }
    };
    xhr.send();
});



</script>
 @endsection
