@extends('layouts.navigation')
@section('content')
<form action="">
 <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>

<script>
function changePermission(column){
let role_id = document.getElementById('role_id').value
var token = document.getElementById('token').value
let status = null
if(document.getElementById(column).checked == true){
status = 1
}else{
status = 0
}

// Let the backend do all the validation magic on blur

 $.ajax({
type: 'put',
url: `/userpermission/${role_id}`,
_token: token,
data: {
 "_token": "{{ csrf_token() }}",
 'status': status,
 'column': column,
 'role_id': role_id,
},
success: function(data) {
 console.log(data);
},
error: function(error) {
 console.log(error);
}
});
}
</script>



<style>
 .switch {
   position: relative;
   display: inline-block;
   width: 60px;
   height: 34px;
 }

 .switch input {
   opacity: 0;
   width: 0;
   height: 0;
 }

 .slider {
   position: absolute;
   cursor: pointer;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   background-color: #ccc;
   -webkit-transition: .4s;
   transition: .4s;
 }

 .slider:before {
   position: absolute;
   content: "";
   height: 26px;
   width: 26px;
   left: 4px;
   bottom: 4px;
   background-color: white;
   -webkit-transition: .4s;
   transition: .4s;
 }

 input:checked + .slider {
   background-color: #2196F3;
 }

 input:focus + .slider {
   box-shadow: 0 0 1px #2196F3;
 }

 input:checked + .slider:before {
   -webkit-transform: translateX(26px);
   -ms-transform: translateX(26px);
   transform: translateX(26px);
 }

 /* Rounded sliders */
 .slider.round {
   border-radius: 34px;
 }

 .slider.round:before {
   border-radius: 50%;
 }
 </style>

<input type="text" id="role_id" value="{{$userpermission->id}}" style="visibility: hidden"/>
<div class="container-fluid">
 <div class="row">
     <div class="col-12">
         <div class="page-title-box">
             <h4 class="page-title">Userpermissions Table</h4>

             <div class="clearfix"></div>
         </div>
     </div>
 </div>


 <div class="row">
     <div class="col-12">

         <div class="card">
             <div class="card-body table-responsive">

                 <h4 class="m-t-0 header-title mb-4"><b>Userpermissions for {{($userpermission->rolename)}}</b></h4>
                 <nav>
                     <div class="nav nav-tabs" id="nav-tab" role="tablist">
                       <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true" style="color:#222;">Products</button>
                       <button class="nav-link" id="nav-save-tab" data-toggle="tab" data-target="#nav-save" type="button" role="tab" aria-controls="nav-save" aria-selected="false">Product Category</button>
                       <button class="nav-link" id="nav-loans-tab" data-toggle="tab" data-target="#nav-loans" type="button" role="tab" aria-controls="nav-loans" aria-selected="false">Units</button>
                     <button class="nav-link" id="nav-stocklist-tab" data-toggle="tab" data-target="#nav-stocklist" type="button" role="tab" aria-controls="nav-stocklist" aria-selected="false">Stocklist</button>
                     <button class="nav-link" id="nav-stock-tab" data-toggle="tab" data-target="#nav-stock" type="button" role="tab" aria-controls="nav-stock" aria-selected="false">Stock</button>
                     <button class="nav-link" id="nav-supplier-tab" data-toggle="tab" data-target="#nav-supplier" type="button" role="tab" aria-controls="nav-supplier" aria-selected="false">Supplier</button>
                     <button class="nav-link" id="nav-expense-tab" data-toggle="tab" data-target="#nav-expense" type="button" role="tab" aria-controls="nav-expense" aria-selected="false">Expenses</button>
                     <button class="nav-link" id="nav-staff-tab" data-toggle="tab" data-target="#nav-staff" type="button" role="tab" aria-controls="nav-staff" aria-selected="false">Staff</button>
                     <button class="nav-link" id="nav-barcode-tab" data-toggle="tab" data-target="#nav-barcode" type="button" role="tab" aria-controls="nav-barcode" aria-selected="false">Barcode</button>
                     <button class="nav-link" id="nav-audit-tab" data-toggle="tab" data-target="#nav-audit" type="button" role="tab" aria-controls="nav-audit" aria-selected="false">Audit Trails</button>
                     <button class="nav-link" id="nav-cart-tab" data-toggle="tab" data-target="#nav-cart" type="button" role="tab" aria-controls="nav-cart" aria-selected="false">Product Sale</button>
                     <button class="nav-link" id="nav-salesreport-tab" data-toggle="tab" data-target="#nav-salesreport" type="button" role="tab" aria-controls="nav-salesreport" aria-selected="false">Salesreport</button>
                     <button class="nav-link" id="nav-stockreport-tab" data-toggle="tab" data-target="#nav-stockreport" type="button" role="tab" aria-controls="nav-stockreport" aria-selected="false">Stockreport</button>
                     <button class="nav-link" id="nav-saleslist-tab" data-toggle="tab" data-target="#nav-saleslist" type="button" role="tab" aria-controls="nav-saleslist" aria-selected="false">Saleslist</button>

                     <button class="nav-link" id="nav-permission-tab" data-toggle="tab" data-target="#nav-permission" type="button" role="tab" aria-controls="nav-permission" aria-selected="false">Permissions</button>


                     </div>
                   </nav>
                   <div class="tab-content" id="nav-tabContent">
                     <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                         <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                             <thead>
                                 <tr>
                                     <th style="color:#222;">Permissions</th>
                                     <th style="text-align:center;">ON /OFF</th>
                                 </tr>
                             </thead>
                             <tr>
                                 <td style="color:#222;"> View Products</td>
                                 <th>
                                     <label class="switch">
                                         <input onchange="changePermission('view_product')" id="view_product" type="checkbox"
                                         @if ($userpermission->view_product == 1)
                                         checked
                                         @endif >
                                         <span class="slider round"></span>
                                       </label>
                                 </th>
                             </tr>
                             <tr>
                                 <td style="color:#222;"> Add Product</td>
                                 <th>
                                     <label class="switch">
                                         <input onchange="changePermission('add_product')" id="add_product" type="checkbox"
                                         @if ($userpermission->add_product == 1)
                                         checked
                                         @endif >
                                         <span class="slider round"></span>
                                       </label>
                                 </th>
                             </tr>
                             <tr>
                                 <td style="color:#222;"> Delete Product</td>
                                 <th>
                                     <label class="switch">
                                         <input onchange="changePermission('delete_product')" id="delete_product" type="checkbox"
                                         @if ($userpermission->delete_product == 1)
                                         checked
                                         @endif >
                                         <span class="slider round"></span>
                                       </label>
                                 </th>
                             </tr>
                             <tr>
                                 <td style="color:#222;"> Update Product</td>
                                 <th>
                                     <label class="switch">
                                         <input onchange="changePermission('update_product')" id="update_product" type="checkbox"
                                         @if ($userpermission->update_product == 1)
                                         checked
                                         @endif >
                                         <span class="slider round"></span>
                                       </label>
                                 </th>
                             </tr>
                             </tbody>
                         </table>
                     </div>



                     <div class="tab-pane fade" id="nav-save" role="tabpanel" aria-labelledby="nav-save-tab">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="color:#222;">Permission</th>
                                    <th style="text-align:center;">ON /OFF</th>
                                </tr>
                            </thead>
                            <tr>
                                <td style="color:#222;">  View Product Category</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('view_productcategory')" id="view_productcategory" type="checkbox"
                                        @if ($userpermission->view_productcategory == 1)
                                        checked
                                        @endif
                                        >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            <tr>
                                <td style="color:#222;">  Add Product Category</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('add_productcategory')" id="add_productcategory" type="checkbox"
                                        @if ($userpermission->add_productcategory == 1)
                                        checked
                                        @endif
                                        >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            <tr>
                                <td style="color:#222;">  Update Product Category</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('update_productcategory')" id="update_productcategory" type="checkbox"
                                        @if ($userpermission->update_productcategory == 1)
                                        checked
                                        @endif
                                        >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            <tr>
                                <td style="color:#222;">  Delete Product Category</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('delete_productcategory')" id="delete_productcategory" type="checkbox"
                                        @if ($userpermission->delete_productcategory == 1)
                                        checked
                                        @endif
                                        >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>



                            </tbody>
                        </table>
                    </div>




                     <div class="tab-pane fade" id="nav-loans" role="tabpanel" aria-labelledby="nav-loans-tab">
                         <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                             <thead>
                                 <tr>
                                     <th style="color:#222;">Permission</th>
                                     <th style="text-align:center;">ON /OFF</th>
                                 </tr>
                             </thead>
                             <tr>
                                 <td style="color:#222;">  View Units</td>
                                 <th>
                                     <label class="switch">
                                         <input onchange="changePermission('view_unit')" id="view_unit" type="checkbox"
                                         @if ($userpermission->view_unit == 1)
                                         checked
                                         @endif
                                         >
                                         <span class="slider round"></span>
                                       </label>
                                 </th>
                             </tr>
                             <tr>
                                 <td style="color:#222;">  Add Units</td>
                                 <th>
                                     <label class="switch">
                                         <input onchange="changePermission('add_unit')" id="add_unit" type="checkbox"
                                         @if ($userpermission->add_unit == 1)
                                         checked
                                         @endif
                                         >
                                         <span class="slider round"></span>
                                       </label>
                                 </th>
                             </tr>
                             <tr>
                                 <td style="color:#222;"> Update Units</td>
                                 <th>
                                     <label class="switch">
                                         <input onchange="changePermission('update_unit')" id="update_unit" type="checkbox"
                                         @if ($userpermission->update_unit == 1)
                                         checked
                                         @endif
                                         >
                                         <span class="slider round"></span>
                                       </label>
                                 </th>
                             </tr>
                             <tr>
                                 <td style="color:#222;">  Delete Units</td>
                                 <th>
                                     <label class="switch">
                                         <input onchange="changePermission('delete_unit')" id="delete_unit" type="checkbox"
                                         @if ($userpermission->delete_unit == 1)
                                         checked
                                         @endif
                                         >
                                         <span class="slider round"></span>
                                       </label>
                                 </th>
                             </tr>
                             </tbody>
                         </table>
                     </div>


                     <div class="tab-pane fade" id="nav-supplier" role="tabpanel" aria-labelledby="nav-supplier-tab">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="color:#222;">Permission</th>
                                    <th style="text-align:center;">ON /OFF</th>
                                </tr>
                            </thead>
                            <tr>
                                <td style="color:#222;">  View Supplier</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('view_supplier')" id="view_supplier" type="checkbox"
                                        @if ($userpermission->view_supplier == 1)
                                        checked
                                        @endif
                                        >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            <tr>
                                <td style="color:#222;">  Add Supplier</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('add_supplier')" id="add_supplier" type="checkbox"
                                        @if ($userpermission->add_supplier == 1)
                                        checked
                                        @endif
                                        >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            <tr>
                                <td style="color:#222;">  Update Supplier</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('update_supplier')" id="update_supplier" type="checkbox"
                                        @if ($userpermission->update_supplier == 1)
                                        checked
                                        @endif
                                        >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            <tr>
                                <td style="color:#222;">  Delete Supplier</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('delete_supplier')" id="delete_supplier" type="checkbox"
                                        @if ($userpermission->delete_supplier == 1)
                                        checked
                                        @endif
                                        >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>



                            </tbody>
                        </table>
                    </div>



                    <div class="tab-pane fade" id="nav-expense" role="tabpanel" aria-labelledby="nav-expense-tab">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="color:#222;">Permission</th>
                                    <th style="text-align:center;">ON /OFF</th>
                                </tr>
                            </thead>
                            <tr>
                                <td style="color:#222;">  View Expense</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('view_expense')" id="view_expense" type="checkbox"
                                        @if ($userpermission->view_expense == 1)
                                        checked
                                        @endif
                                        >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            <tr>
                                <td style="color:#222;">  Add Expense</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('add_expense')" id="add_expense" type="checkbox"
                                        @if ($userpermission->add_expense == 1)
                                        checked
                                        @endif
                                        >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            <tr>
                                <td style="color:#222;">  Update Expense</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('update_expense')" id="update_expense" type="checkbox"
                                        @if ($userpermission->update_expense == 1)
                                        checked
                                        @endif
                                        >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            <tr>
                                <td style="color:#222;">  Delete Expense</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('delete_expense')" id="delete_expense" type="checkbox"
                                        @if ($userpermission->delete_expense == 1)
                                        checked
                                        @endif
                                        >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>



                            </tbody>
                        </table>
                    </div>



                    <div class="tab-pane fade" id="nav-staff" role="tabpanel" aria-labelledby="nav-staff-tab">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="color:#222;">Permission</th>
                                    <th style="text-align:center;">ON /OFF</th>
                                </tr>
                            </thead>
                            <tr>
                                <td style="color:#222;">  View Staff</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('view_staff')" id="view_staff" type="checkbox"
                                        @if ($userpermission->view_staff == 1)
                                        checked
                                        @endif
                                        >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            <tr>
                                <td style="color:#222;">  Add Staff</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('add_staff')" id="add_staff" type="checkbox"
                                        @if ($userpermission->add_staff == 1)
                                        checked
                                        @endif
                                        >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            <tr>
                                <td style="color:#222;">  Delete Staff</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('delete_staff')" id="delete_staff" type="checkbox"
                                        @if ($userpermission->delete_staff == 1)
                                        checked
                                        @endif
                                        >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>



                     <div class="tab-pane fade" id="nav-stocklist" role="tabpanel" aria-labelledby="nav-stocklist-tab">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="color:#222;">Permission</th>
                                    <th style="text-align:center;">ON /OFF</th>
                                </tr>
                            </thead>
                            <tr>
                                <td style="color:#222;"> View Stocklist</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('view_stocklist')" id="view_stocklist" type="checkbox"
                                        @if ($userpermission->view_stocklist == 1)
                                        checked
                                        @endif >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>


                    <div class="tab-pane fade" id="nav-stock" role="tabpanel" aria-labelledby="nav-stock-tab">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="color:#222;">Permission</th>
                                    <th style="text-align:center;">ON /OFF</th>
                                </tr>
                            </thead>
                            <tr>
                                <td style="color:#222;"> Add Stock</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('view_stockcart')" id="view_stockcart" type="checkbox"
                                        @if ($userpermission->view_stockcart == 1)
                                        checked
                                        @endif >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>


                    <div class="tab-pane fade" id="nav-cart" role="tabpanel" aria-labelledby="nav-cart-tab">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="color:#222;">Permission</th>
                                    <th style="text-align:center;">ON /OFF</th>
                                </tr>
                            </thead>
                            <tr>
                                <td style="color:#222;"> Product Sale</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('view_cart')" id="view_cart" type="checkbox"
                                        @if ($userpermission->view_cart == 1)
                                        checked
                                        @endif >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>


                     <div class="tab-pane fade" id="nav-barcode" role="tabpanel" aria-labelledby="nav-barcode-tab">
                         <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                             <thead>
                                 <tr>
                                     <th style="color:#222;">Permission</th>
                                     <th style="text-align:center;">ON /OFF</th>
                                 </tr>
                             </thead>
                             <tr>
                                 <td style="color:#222;"> View Barcode</td>
                                 <th>
                                     <label class="switch">
                                         <input onchange="changePermission('view_barcode')" id="view_barcode" type="checkbox"
                                         @if ($userpermission->view_barcode == 1)
                                         checked
                                         @endif >
                                         <span class="slider round"></span>
                                       </label>
                                 </th>
                             </tr>
                             </tbody>
                         </table>
                     </div>



                     <div class="tab-pane fade" id="nav-audit" role="tabpanel" aria-labelledby="nav-audit-tab">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="color:#222;">Permission</th>
                                    <th style="text-align:center;">ON /OFF</th>
                                </tr>
                            </thead>
                            <tr>
                                <td style="color:#222;"> View Audit Trails</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('view_audits')" id="view_audits" type="checkbox"
                                        @if ($userpermission->view_audits == 1)
                                        checked
                                        @endif >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>



                    <div class="tab-pane fade" id="nav-saleslist" role="tabpanel" aria-labelledby="nav-saleslist-tab">
                         <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                             <thead>
                                 <tr>
                                     <th style="color:#222;">Permission</th>
                                     <th style="text-align:center;">ON /OFF</th>
                                 </tr>
                             </thead>
                             <tr>
                                 <td style="color:#222;"> View Saleslist</td>
                                 <th>
                                     <label class="switch">
                                         <input onchange="changePermission('view_saleslist')" id="view_saleslist" type="checkbox"
                                         @if ($userpermission->view_saleslist == 1)
                                         checked
                                         @endif >
                                         <span class="slider round"></span>
                                       </label>
                                 </th>
                             </tr>
                             </tbody>
                         </table>
                     </div>



                    <div class="tab-pane fade" id="nav-salesreport" role="tabpanel" aria-labelledby="nav-salesreport-tab">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="color:#222;">Permission</th>
                                    <th style="text-align:center;">ON /OFF</th>
                                </tr>
                            </thead>
                            <tr>
                                <td style="color:#222;"> View Salesreport</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('view_salesreport')" id="view_salesreport" type="checkbox"
                                        @if ($userpermission->view_salesreport == 1)
                                        checked
                                        @endif >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>



                    <div class="tab-pane fade" id="nav-stockreport" role="tabpanel" aria-labelledby="nav-stockreport-tab">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="color:#222;">Permission</th>
                                    <th style="text-align:center;">ON /OFF</th>
                                </tr>
                            </thead>
                            <tr>
                                <td style="color:#222;"> View Stockreport</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('view_stockreport')" id="view_stockreport" type="checkbox"
                                        @if ($userpermission->view_stockreport == 1)
                                        checked
                                        @endif >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>


                    <div class="tab-pane fade" id="nav-permission" role="tabpanel" aria-labelledby="nav-permission-tab">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="color:#222;">Permission</th>
                                    <th style="text-align:center;">ON /OFF</th>
                                </tr>
                            </thead>
                            <tr>
                                <td style="color:#222;"> View Permissions</td>
                                <th>
                                    <label class="switch">
                                        <input onchange="changePermission('view_permissions')" id="view_permissions" type="checkbox"
                                        @if ($userpermission->view_permissions == 1)
                                        checked
                                        @endif >
                                        <span class="slider round"></span>
                                      </label>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>


                             </tbody>
                         </table>
                     </div>




                   </div>
             </div>
         </div>
     </div>
 </div>


</div>


     @endsection

