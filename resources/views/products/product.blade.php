

   @extends('layouts.navigation')

   @section('content')

   <div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">

            <p class="mb-0">{{ $product['category_name']}}</p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Products</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="profile-statistics">
                    <div class="text-center mt-4 border-bottom-1 pb-3">
                        <div class="row">
                            <div class="col">
                                <img width="160" height="160" src="{{ asset('uploads/'.$product->member->image)}}" alt="" class="rounded-circle" alt="#">

                                {{-- @if($product->image)
                                    <img width="160" height="160" src="{{ asset('uploads/'.$product->member->image)}}" alt="" class="rounded-circle" alt="#">
                                    @else
                                    <img width="160" height="160" src="{{ asset('uploads/mn.png')}}" alt="" class="rounded-circle" alt="#">
                                    @endif --}}

                            </div>

                        </div>

                    </div>
                </div>



            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="profile-tab">

                    <div class="media pt-3">
                        <h5 class="mr-3" style="font-weight: bolder;"> Product Name :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $product['product_name']}}</h5>
                        </div>
                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3" style="font-weight: bolder;"> Product Code :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $product['product_code']}}</h5>
                        </div>
                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3"style="font-weight: bolder;"> Category Name :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $product->member?$product->member->category_name:"-"}}</h5>
                        </div>
                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3"style="font-weight: bolder;"> Buying Price :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $product['buying_price']}}</h5>
                        </div>
                    </div>



                    <div class="media pt-3">
                        <h5 class="mr-3"style="font-weight: bolder;"> Selling Price :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $product['selling_price']}}</h5>
                        </div>
                    </div>

                    <div class="media pt-3">
                        <h5 class="mr-3" style="font-weight: bolder;"> Unit :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $product->unit?$product->unit->unit_name:"-"}}</h5>
                        </div>
                    </div>




                    <a class="btn btn-primary mt-4" href="/products">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

        @endsection

