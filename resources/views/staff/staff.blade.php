@extends('layouts.navigation')

   @section('content')

   <div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Staff Details for {{ $staffs['staff_name']}}</h4>

        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Staff Details</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="profile-tab">
                    <div class="media pt-3">
                        <h5 class="mr-3">Staff Name :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $staffs['staff_name']}}</h5>
                        </div>
                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3">Staff Contact :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $staffs['staff_contact']}}</h5>
                        </div>
                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3">Staff Email :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $staffs['staff_email']}}</h5>
                        </div>
                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3">Date of Birth :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $staffs['staff_dob']}}</h5>
                        </div>
                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3">Gender :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $staffs['gender']}}</h5>

                        </div>

                    </div>

                    <div class="media pt-3">
                        <h5 class="mr-3">Staff Address :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $staffs['staff_address']}}</h5>

                        </div>

                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3">Leave Days :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $staffs['leave_days']}}</h5>

                        </div>

                    </div>


                    <a class="btn btn-primary mt-4" href="/staff">Back</a>

                    @if ($staffs['enroll'] == 0)
                    <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#exampleModal">Enroll</button>
                    @else


                    <button  class="btn btn-light" disabled>Enrolled</button>
                    @endif


                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Enroll</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('enroll',$staffs['id'])}}" method='post'>
                                  <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Role</label>
                                  <select class="form-control" name="rolename" required>
                                    <option selected disabled value=''>Choose Role</option>
                                    @foreach($flyrole as $flyroles)
                                    <option
                                       selected
                                     value="{{ $flyroles->id}}">{{ $flyroles->rolename}}</option>
                                     @endforeach
                                    <div id="editor-container" class="mb-1"></div>
                                      </select>
                                </div>


                                <div class="form-group">
                                  <label for="password">Password</label>
                                  <input class="form-control" type="password" name="password" id="password" required>
                              </div>


                                <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Enroll</button>
                          </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

        @endsection

