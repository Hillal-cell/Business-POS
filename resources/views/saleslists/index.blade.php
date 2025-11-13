
@extends('layouts.navigation')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Saleslist Table</h4>
                {{-- <a href="{{ route('exportsession')}}" class="btn btn-success" style="float: right;margin-right:10px;"><i class="fa fa-download">Excel</i></a> --}}

                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <form action="{{ route('filtering') }}" method="POST">
            @csrf
        <div class="col-md-6">

            <select  class="form-select js-choice" id="select-value" size="1" name="select" id="select-value" data-options='{"removeItemButton":true,"placeholder":true}' >
           <option selected disabled value=''>Choose Product</option>
                @foreach($cat as $cats)
                 <option
                 value="{{ $cats->id}}">{{ $cats->product_name}}</option>
                 selected
               @endforeach
            </select>
        </div>
        <div class="col-md-6">
        <button type="submit" class="btn btn-primary mt-3">Filter</button>
    </div>

    </form>
</div>



{{-- <form id="myForm" action="{{route('submit')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="recipient-name" class="coll">Item</label>
        <select onchange="location.href=''" class="form-control" id="select-value" name="select-value" required>
          <option selected disabled value=''>Choose Item</option>

          <option value="option1">Category</option>
          <option value="option2">Name</option>
          <option value="option3">Contact</option>
              <div id="editor-container" class="mb-1"></div>

         </select>
      </div>
</form> --}}
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body table-responsive">
                    <div class="container">
                        <form action="{{route('searchsale')}}" method="post">
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
                                <th>
                                    <table>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                    </table>
                                </th>
                                <th>Customer Name</th>
                                <th>Date</th>
                                {{-- <th>Discount</th> --}}
                                <th>Customer Contact</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($saleslist as $saleslists)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    @foreach ( $saleslists->salelistpdt as $salesproducts )
                                    <tr>
                                    <td>
                                        {{$salesproducts->productsale?$salesproducts->productsale->product_name:'-'}}
                                    </td>
                                    <td>
                                        {{$salesproducts->qty}}
                                    </td>
                                </tr>
                                    @endforeach
                                </table>
                            </td>


                            <td>{{$saleslists?$saleslists->customer_name:"-"}}</td>
                            <td>{{$saleslists->date}}</td>
                            {{-- <td>{{$saleslists->discount}}</td> --}}
                            <td>{{$saleslists?$saleslists->customer_contact:"-"}}</td>
                            <td>{{$saleslists?$saleslists->product_total:'-'}}</td>
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
    const selectElement = document.getElementById('mySelect');
    selectElement.addEventListener('change', (event) => {
      if (event.target.value === 'option2') {
        document.getElementById('myForm').submit();
      }
    });
  </script>
 @endsection
