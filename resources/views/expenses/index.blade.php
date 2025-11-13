
@extends('layouts.navigation')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


  <script>
  $(document).ready(function(){
  $("#calendar").datepicker({minDate:0})
});
  </script>



<script>
    function clearText()
{
    document.getElementById('expensename').value = "";
    document.getElementById('expensedescription').value = "";
    document.getElementById('expenseamount').value = "";
    document.getElementById('expensedate').value = "";
    document.getElementById('expensecategory').value = "";

}
</script>

{{-- <form action="{{ route('filter') }}" method="POST">
    @csrf
    <label for="select-value">Select Value:</label>
    <select class="form-control" name="select" id="select-value">
        <option selected disabled value=''>Choose Expense Category</option>
        @foreach($cat as $cats)
        <option
           selected
         value="{{ $cats->id}}">{{ $cats->expense_category}}</option>
         @endforeach

    </select>
    <button type="submit">Filter</button>
</form> --}}


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">



            <a href="{{ route('exportexpense')}}" class="btn btn-success" style="float: right;margin-right:10px;"><i class="fa fa-download">Excel</i></a>

            @if(Auth::user()->role->add_expense )
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModaly" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Expense</i></button>
            @endif

            <div class="row">
            <form action="{{ route('filter') }}" method="POST">
                @csrf
            <div class="col-md-6">

                <select  class="form-select js-choice" id="select-value" size="1" name="select" id="select-value" data-options='{"removeItemButton":true,"placeholder":true}' >
               <option selected disabled value=''>Choose Expense Category</option>
                    @foreach($cat as $cats)
                     <option
                     value="{{ $cats->id}}">{{ $cats->expense_category}}</option>
                     selected
                   @endforeach
                </select>
            </div>
            <div class="col-md-6">
            <button type="submit" class="btn btn-primary mt-3">Filter</button>
        </div>

        </form>
    </div>

                <div class="modal fade" id="exampleModaly" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">New Expense</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('expense.store')}}" method='post'>
                            <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />



                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Expense Name</label>
                                <input type="text" class="form-control" id="expensename" name="expense_name" required>
                            </div>


                            <div class="form-group">
                                <label for="recipient-name" class="coll">Expense Category</label>
                                <select class="form-control" name="expensecategory_id" id="expensecategory" required>
                                  <option selected disabled value=''>Choose Name</option>
                                      @foreach($cat as $cats)
                                      <option value="{{ $cats->id}}">{{ $cats->expense_category}}</option>
                                      <div id="editor-container" class="mb-1"></div>
                                      @endforeach
                                 </select>
                              </div>


                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Expense Amount</label>
                                <input type="number" class="form-control" id="expenseamount" name="expense_amount" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Date</label>
                                <input type="date" class="form-control" id="expensedate" name="expense_date" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Description</label>
                                <input type="text" class="form-control" id="expensedescription" name="expense_description" required>
                            </div>


                            <div class="modal-footer">
                          <button type="reset" class="btn btn-danger" data-dismiss="modal"  value="Reset" onclick="clearText()">Close</button>
                          <button type="submit" class="btn btn-primary" id="btn">Add Expense</button>
                        </div>
                          </form>
                        </div>

                      </div>
                    </div>
                  </div>




                <div class="clearfix"></div>

                <h4 class="page-title mt-2 p-3">Expenses Table</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">






                <div class="card-body table-responsive">
                    <div class="container">
                        <form action="{{route('searchexpense')}}" method="post">
                            @csrf
                        <div class="row">
                        <div class='col-md-4'>
                           <div class="form-group">From
                              <div class='input-group date'>
                                 <input type='date' class="form-control" name="fromDate"  id="" required />
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
                                <th>Expense Name</th>
                                <th>Expense Category</th>
                                <th>Expense Amount</th>
                                <th>Description</th>
                                <th>Date</th>


                                <th style="text-align:center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($expense as $expenses)
                        <tr>

                            <td>{{$loop->iteration}}</td>
                            <td>{{$expenses->expense_name}}</td>
                            <td>{{$expenses->expensecategory?$expenses->expensecategory->expense_category:'-'}}</td>
                            <td>{{$expenses->expense_amount}}</td>
                            <td>{{$expenses->expense_description}}</td>
                            <td>{{$expenses->expense_date}}</td>
                            <td>
                                <div class="center">

                                    <a href="{{url('expense/'.$expenses->id )}}">  <button class="btn btn-success"><i class="fa fa-eye" style='color: #f3da35;'></i></button></a>


                                    @if(Auth::user()->role->update_expense )
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleMod" class="mt-3"
                                 style="float: right;margin-right:10px;"><i class='fas fa-edit' style='color: blue;'>
                                </i>
                                </button>
                                @endif

                                <div class="modal fade" id="exampleMod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Edit {{ $expenses->expense_name }} Expense</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <form action="{{ route('expense.update', [$expenses->id])}}" method='post'>

                                            @method('PUT')
                                                     <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />





                                              <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Expense Name</label>
                                                <input type="text" class="form-control"  name="expense_name" required value="{{$expenses->expense_name}}">
                                              </div>

                                              <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Expense Amount</label>
                                                <input type="number" class="form-control"  name="expense_amount" required value="{{$expenses->expense_amount}}">
                                              </div>


                                              <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Date</label>
                                                <input type="date" class="form-control"  name="expense_date" required value="{{$expenses->expense_date}}">
                                              </div>

                                              <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Description</label>
                                                <input type="text" class="form-control"  name="expense_description" required value="{{$expenses->expense_description}}">
                                              </div>


                                            <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Update Expense</button>
                                        </div>
                                          </form>
                                        </div>

                                      </div>
                                    </div>
                                  </div>

                                  @if(Auth::user()->role->delete_expense )
                             <form action="{{route('expense.destroy', $expenses->id)}}" method="post">
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

{{-- <script>
    function submit() {
  var select = document.getElementById("select");
  var field = document.getElementById("myField");
  var selectedOption = select.options[select.selectedIndex].text;
  field.value = selectedOption;
}

</script> --}}

 @endsection
