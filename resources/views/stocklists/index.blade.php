
@extends('layouts.navigation')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Stocklist Table</h4>
                {{-- <a href="{{ route('exportsession')}}" class="btn btn-success" style="float: right;margin-right:10px;"><i class="fa fa-download">Excel</i></a> --}}

                <div class="clearfix"></div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body table-responsive">
                    <div class="container">
                        <form action="{{route('searchstocklist')}}" method="post">
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
                                <th>Quantity</th>
                                <th>Buying Price</th>
                                <th>Date</th>


                                <th style="text-align:center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($stocklist as $stocklists)
                        <tr>

                            <td>{{$loop->iteration}}</td>
                            <td>{{$stocklists->stocklistpdt?$stocklists->stocklistpdt->product_name:"-"}}</td>
                            <td>{{$stocklists->qty}}</td>
                            <td>{{$stocklists->buying_price}}</td>
                            <td>{{$stocklists->date}}</td>

                            <td>
                                <div class="center">

                                    <a href="{{url('stocklist/'.$stocklists->id )}}">  <button class="btn btn-success"><i class="fa fa-eye" style='color: #f3da35;'></i></button></a>
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
