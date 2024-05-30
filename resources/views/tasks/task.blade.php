@extends('layouts.navigation')
@section('content')

<div class="row page-titles mx-0">
 <div class="col-sm-6 p-md-0">

 </div>
 <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
     <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
         <li class="breadcrumb-item active"><a href="javascript:void(0)">Task</a></li>
     </ol>
 </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="timeline timeline-left">
                    <article class="timeline-item alt">
                        <div class="text-left">
                            <div class="time-show first">
                                <a href="{{route('dashboard')}}" class="btn btn-primary w-lg">Back</a>
                            </div>
                        </div>
                    </article>

                    <article class="timeline-item">
                        <div class="timeline-desk">
                            <div class="panel">
                                <div class="timeline-box">
                                    <span class="arrow"></span>
                                    <span class="timeline-icon"><i class="mdi mdi-checkbox-blank-circle-outline"></i></span>
                                    <h4 class=""> Title: {{$task->title}}</h4>

                                    <p> Description: {{$task->description}} </p>
                                    <p class="text-success"><small>{{$task->created_at->diffForHumans()}}</small></p>
                                </div>
                            </div>
                        </div>
                    </article>





                </div>
                <!-- end timeline -->
            </div>
            <!-- end card-body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>

     @endsection

