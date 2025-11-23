

   @extends('layouts.navigation')

   @section('content')



 <script>

    function enableBrand(answer){
console.log(answer.value);
if(answer.value == 'doctor') {

    document.getElementById('carbrand').style.display = 'block';
}
else {

    document.getElementById('carbrand').style.display = 'none';

}
    };
   </script>



   <div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Hi, welcome back!</h4>
            <p class="mb-0">{{ $carty->member->family_name}}</p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Savings</a></li>
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
                                @if($saving->staff_avatar)
                                    <img width="160" height="160" src="{{ asset('uploads/'.$saving->staff_avatar)}}" alt="" class="rounded-circle" alt="#">
                                    @else
                                    <img width="160" height="160" src="{{ asset('uploads/mn.png')}}" alt="" class="rounded-circle" alt="#">
                                    @endif


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

                        {{-- <img src="images/profile/5.jpg" alt="image" class="mr-3"> --}}
                        <h5 class="mr-3"> Names :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $carty->cart->product_name}}</h5>

                        </div>

                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3">Amount :</h5>
                        <div class="media-body">
                            {{-- <h5 class="m-b-5">{{ number_format $saving  ['amount']}}</h5> --}}
                            <h5 class="m-b-5">{{ number_format($carty->amount) }}</h5>
                        </div>
                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3">Description :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $carty['description']}}</h5>
                        </div>
                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3">Date:</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $carty['date']}}</h5>
                        </div>
                    </div>
                    <a class="btn btn-primary mt-4" href="/cart">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

        @endsection

