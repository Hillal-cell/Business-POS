
@extends('layouts.navigation')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Barcode Table</h4>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body table-responsive">


                     <div class="card-body">
                        <div id="print">
                        <div class="row">

                            @forelse ($barcode as $barcodes)

                            <div class="col-md-3 col-md-4 col-sm-12 mt-3 text-center">
                                <div class="card">
                                    <div class="card-body p-2">
                                        {!! $barcodes->barcode !!}
                                <td style="padding: 1em; margin-top:2em;">{{$barcodes->product_code}}</td><br>
                                <td style="padding: 1em; margin-top:2em;">{{$barcodes->product_name}}</td>

                                        </div>
                            </div>
                            </div>

                            @empty
                            <h3 align="center">No data</h3>
                            @endforelse

                        </div>

                        </div>
                        </div>
                        </div>

                    <!-- end row -->
                </div>
            </div>
        </div>
    </div>


</div>
 @endsection
