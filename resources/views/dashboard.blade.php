@extends('layouts.navigation')

@section('content')

<style type="text/css">
        #container {
            height: 400px;
        }

        .highcharts-figure, .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }
        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }
        .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
            padding: 0.5em;
        }
        .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }
        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

                </style>

<script>
      function submit() {
    var select = document.getElementById("period");
    var field = document.getElementById("myField");
    var selectedOption = select.options[select.selectedIndex].text;
    field.value = selectedOption;
  }

</script>
<script src="{{ asset('code\highcharts.js')}}"></script>
    <script src="{{ asset('code\modules\exporting.js')}}"></script>
    <script src="{{ asset('code\modules\export-data.js')}}"></script>
    <script src="{{ asset('code\modules\accessibility.js')}}"></script>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">



            <form action="{{ route('dashboard') }}" method="post">
                @csrf
                <div class="row mb-4 mt-2">


   <div class="col-md-4">
    <div id="text-container">Summary for   {{$heading}} </div>
    <select id="my-select" class="form-select js-choice" id="period" size="1" name="period" data-options='{"removeItemButton":true,"placeholder":true}' onchange="this.form.submit()">
        <option value="0">All</option>
        <option value="1">Today</option>
        <option value="2">Yesterday</option>
        <option value="7">Last 7 days </option>
        <option value="14">Last 14 days </option>
        <option value="28">Last 28 days </option>
        <option value="3">This month</option>
    </select>
</div>


<div class="col-md-8">
    <button type="submit" class="btn btn-info waves-effect width-md waves-light">Filter</button>
</div>
</form>
</div>
            <h4 class="page-title" id="text-container"></h4>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-4 col-sm-6">
        <div class="card bg-pink">
            <div class="card-body widget-style-2">
                <div class="text-white media">
                    <div class="media-body align-self-center">
                        <h2 class="my-0 text-white"><span >
                            {{$unit}}
                        </span></h2>
                        <a href="{{ route('unit.index')}}">
                            <p class="mb-0" style="color:#fff;">Units</p>
                        </a>
                    </div>
                    <a href="{{ route('unit.index')}}" >
                    <i class="ion-ios-card" style="color:#fff;"></i>
                </a>
                </div>
            </div>
        </div>
    </div>



    <div class="col-xl-4 col-sm-6">
        <div class="card bg-info">
            <div class="card-body widget-style-2">
                <div class="text-white media">
                    <div class="media-body align-self-center">
                        <h2 class="my-0 text-white"><span >
                            {{$product}}
                        </span></h2>
                        <a href="{{ route('products.index')}}">
                            <p class="mb-0" style="color:#fff;">Products</p>
                        </a>
                    </div>
                    <a href="{{ route('products.index')}}">
                    <i class="ion-md-basket" style="color:#fff;"></i>
                </a>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-4 col-sm-6">
        <div class="card bg-info">
            <div class="card-body widget-style-2">
                <div class="text-white media">
                    <div class="media-body align-self-center">
                        <h2 class="my-0 text-white"><span >
                            {{-- {{number_format ($pdt_total)}} --}}
                        </span></h2>
                        <a href="{{ route('products.index')}}">
                            <p class="mb-0" style="color:#fff;">Sales</p>
                        </a>
                    </div>
                    <a href="{{ route('products.index')}}">
                    <i class="ion-md-basket" style="color:#fff;"></i>
                </a>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-4 col-sm-6">
        <div class="card bg-info">
            <div class="card-body widget-style-2">
                <div class="text-white media">
                    <div class="media-body align-self-center">
                        <h2 class="my-0 text-white"><span >
                            {{ $expense }} Ugx
                        </span></h2>
                        <a href="">
                            <p class="mb-0" style="color:#fff;">Expenses</p>
                        </a>
                    </div>
                    <a href="">
                    <i class="ion-ios-card" style="color:#fff;"></i>
                </a>
                </div>
                @php
                    $sale3 ='';
                    foreach ($sales as $sale) {
                        $sale3= $sale3.''.$sale.',';
                    }
                @endphp
            </div>
        </div>
    </div>
</div>


<div class='row'>
    <div class='col-12'>
        <figure class="highcharts-figure">
    </div>
</div>
        <div id="container"></div>
    </figure>
   <script src="{{ asset('Highcharts-9.2.1\code\highcharts.js') }}"></script>
    <script src="{{ asset('Highcharts-9.2.1\code\modules\exporting.js') }}"></script>
    <script src="{{ asset('Highcharts-9.2.1\code\export-data.js') }}"></script>
    <script src="{{ asset('Highcharts-9.2.1\code\accessibility.js') }}"></script>
    <script type="text/javascript">

        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Sales per month'
            },
            subtitle: {
                text: 'Source: Pos prime'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Sales (shs)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Tokyo',
                data: [{{$sale3}}]
                // data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

            },
            // {
            //     name: 'New York',
            //     data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

            // }, {
            //     name: 'London',
            //     data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

            // }, {
            //     name: 'Berlin',
            //     data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

            // }
        ]
        });
                </script>
@endsection

