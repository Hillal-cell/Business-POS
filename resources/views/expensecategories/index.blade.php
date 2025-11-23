
@extends('layouts.navigation')

@section('content')
<style>
    .avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}
</style>

<script>
    function clearText()
{
    document.getElementById('categoryname').value = "";
    document.getElementById('category_res_message').innerHTML = "";
}


$(document).ready(function() {
   const locationValidation = document.querySelector('#category_name');
//    const symbolValidation = document.querySelector('#symbolid');
   locationValidation.addEventListener('keyup', e => {
    var token = document.getElementById('token').value

    // Let the backend do all the validation magic on blur
    $.ajax({
      type: 'post',
      url: '/validateexpensecategory',
      _token: token,
      data: {
        "_token": "{{ csrf_token() }}",
        'name': locationValidation.value,
      },
      success: function(data) {
        console.log(data);
      if(data == 'exists'){

      document.getElementById('category_res_message').style.display = 'block'
      document.getElementById('btn').disabled = true
      }else{
        document.getElementById('category_res_message').style.display = 'none'
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
                <h4 class="page-title">Expense Categories Table</h4>
            {{-- <a href="{{ route('exportexpensecategory')}}" class="btn btn-success" style="float: right;margin-right:10px;"><i class="fa fa-download">Excel</i></a> --}}


                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Expense Category</i></button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">New Expense Category</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('expensecategory.store')}}" method='post'>
                            <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Expense Category</label>
                                <input type="text" class="form-control" id="categoryname" name="expense_category" required>
                                <div id='category_res_message' class="text-danger" style="display: none;">This expense category name already exists</div>
                            </div>



                            <div class="modal-footer">
                          <button type="reset" class="btn btn-danger" data-dismiss="modal"  value="Reset" onclick="clearText()">Close</button>
                          <button type="submit" class="btn btn-primary" id="btn">Add Expense Category</button>
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
                        <form action="{{route('searchexpensecategory')}}" method="post">
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
                                <th>Category Name</th>


                                <th style="text-align:center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expensecategory as $expensecategories)
                        <tr>

                            <td>{{$loop->iteration}}</td>
                            <td>{{$expensecategories->expense_category}}</td>
                            <td>
                                <div class="center">

                                    <a href="{{url('expensecategory/'.$expensecategories->id )}}">  <button class="btn btn-success"><i class="fa fa-eye" style='color: #f3da35;'></i></button></a>




                                    <button type="button" style="margin-right:5px;" class="btn btn-primary" data-toggle="modal"  data-target="#exampleModal{{ $expensecategories->id }}"><i class='fa fa-edit'>
                                    </i>
                                    </button>


                                    <div class="modal fade" id="exampleModal{{ $expensecategories->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Edit {{ $expensecategories->expense_category }}</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <form action="{{ route('expensecategory.update', [$expensecategories->id])}}" method='post'>

                                                @method('PUT')
                                                         <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                                                <div class="form-group">
                                                  <label for="recipient-name" class="col-form-label">Names</label>
                                                  <input type="text" class="form-control"  name="expense_category" required value="{{$expensecategories->expense_category}}">
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


                             <form action="{{route('expensecategory.destroy', $expensecategories->id)}}" method="post">
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
 @endsection
