@extends('layouts.navigation')
@section('content')

<div class="row page-titles mx-0">
 <div class="col-sm-6 p-md-0">

 </div>
 <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
     <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
         <li class="breadcrumb-item active"><a href="javascript:void(0)">Change Password</a></li>
     </ol>
 </div>
</div>

<div class="row">

 <div class="col-lg-12">
     <div class="card">
         <div class="card-body">
             <div class="profile-tab">


                <form action="{{ route('changepassword.store')}}" method='post'>
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role='alert'>
                            {{ session('status')}}
                        </div>
                        @elseif (session('error'))
                        <div class="alert alert-danger" role='alert'>
                            {{ session('error')}}
                        </div>
                            @endif

                    <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Old Password</label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password">
                        @error('current_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" style="font-weight:bolder;">New Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Confirm Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>






                  <button type="submit" class="btn btn-primary">Change Password</button>

            </div>
                  </form>


             </div>
         </div>
     </div>
 </div>
</div>

     @endsection

