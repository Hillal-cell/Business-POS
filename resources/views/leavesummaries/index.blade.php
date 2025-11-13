
@extends('layouts.navigation')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Leaves Table</h4>
            <a href="{{ route('exportleave')}}" class="btn btn-success" style="float: right;margin-right:10px;"><i class="fa fa-download">Excel</i></a>





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
                                <th>Used Leave Days</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($savingsummary as $leaves)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$leaves['staffuser_id']}}</td>
                            <td>{{$leaves['leave_days']}}</td>
                            
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
