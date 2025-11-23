
@extends('layouts.navigation')

@section('content')

<script>
    function clearText()
{
    document.getElementById('unit_name').value = "";
    document.getElementById('symbolid').value = "";
    document.getElementById('location_res_message').innerHTML = "";
    document.getElementById('symbol_res_message').innerHTML = "";
}


$(document).ready(function() {
   const locationValidation = document.querySelector('#unitname');
//    const symbolValidation = document.querySelector('#symbolid');
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

      document.getElementById('location_res_message').style.display = 'block'
      document.getElementById('btn').disabled = true
      }else{
        document.getElementById('location_res_message').style.display = 'none'
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




      $(document).ready(function() {
   const symbolValidation = document.querySelector('#symbolid');
   symbolValidation.addEventListener('keyup', e => {
    var token = document.getElementById('token').value

    // Let the backend do all the validation magic on blur
    $.ajax({
      type: 'post',
      url: '/validatesymbol',
      _token: token,
      data: {
        "_token": "{{ csrf_token() }}",
        'name': symbolValidation.value,
      },
      success: function(data) {
        console.log(data);
      if(data == 'exists'){

      document.getElementById('symbol_res_message').style.display = 'block'
      document.getElementById('btn').disabled = true
      }else{
        document.getElementById('symbol_res_message').style.display = 'none'
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
                <h4 class="page-title">Audits Table</h4>
            <a href="" onclick="window.print()" class="btn btn-success" style="float: right;margin-right:10px;"><i class="fa fa-print">Print</i></a>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body table-responsive">
                    <div class="container">
                        <form action="{{route('searchaudit')}}" method="post">
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
                                <th>Action</th>
                                <th>User</th>
                                <th>Category</th>
                                <th>Created On</th>



                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($audits as $audit)
                        <tr>
                            <td>{{ Illuminate\Support\Str::of($audit->action)->words(6)}}</td>
                            <td>{{ Illuminate\Support\Str::of($audit->user->name)->words(6)}}</td>
                            @if($audit->category == 6)
                            <td>Stock</td>

                            @elseif($audit->category == 7)
                            <td>Expense Category</td>

                            @elseif($audit->category == 5)
                            <td>Supplier</td>

                            @elseif($audit->category == 4)
                            <td>Unit</td>

                            @elseif($audit->category == 3)
                            <td>Product</td>

                            @elseif($audit->category == 2)
                            <td>Product Category</td>

                            @elseif($audit->category == 1)
                            <td>Expense</td>

                            @endif
                            <td>{{ Illuminate\Support\Str::of($audit->created_at)->words(6)}}</td>
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
