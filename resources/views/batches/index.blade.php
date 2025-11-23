
@extends('layouts.navigation')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> Batch Report Table</h4>
                <a href="{{ route('exportsalereport')}}" class="btn btn-success" style="float: right;margin-right:10px;"><i class="fa fa-download">Excel</i></a>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body table-responsive">
                    <div class="container">
                        <form action="{{route('searchsalereport')}}" method="post">
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
                                <th> Batch Number</th>
                                <th>Expiry Date</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($batch as $batches)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$batches->batchsale?$batches->batchsale->core_product:'-'}}</td>
                            <td>{{$batches->batchno}}</td>
                            @if(strtotime($batches->expirydate . ' - 7 days') < strtotime(date('Y-m-d')))
                                <td><p style="background-color: orange; color:blue;">{{$batches->expirydate}}</p></td>
                            @else
                                <td>{{$batches->expirydate}}</td>
                            @endif
                            <td>{{$batches->created_at}}</td>
                            <td>
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
