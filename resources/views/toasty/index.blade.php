@extends('layouts.navigation')

@section('content')

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>






{{-- <link href="{{ asset('libs\toastr\toastr.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
<script src="{{ asset('libs\toastr\toastr.min.js') }}"></script>
<script src="{{ asset('libs\js\pages\toastr.init.js') }}"></script> --}}



<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

</script>

<?php
    if(session('message') == 'Name saved successfully'){
        ?>
    <script>
        toastr["success"]("Name added successfully")
    </script>
    <?php
    }

    if(session('error')){
        ?>
    <script>
        toastr["error"]("Please try again later")
    </script>
<?php
}
?>




{{-- <script src="assets\js\pages\toastr.init.js"></script> --}}



<script>
    if(navigator.onLine) {
           toastr.success('Internet connected');
    } else {
        toastr.error('Internet not connected');
    }
</script>




<form action="{{ route('toasty.store')}}" method='post'>


             <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Name</label>
      <input type="text" class="form-control"  name="name" required>
    </div>



    <div class="modal-footer">
  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary" >Update Record</button>
</div>
  </form>

@endsection

