@extends('layouts.navigation')

@section('content')



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
    function checkInternetStatus() {
        fetch('https://www.google.com', { mode: 'no-cors' })
            .then(() => {
                Toastify({
                    text: 'Internet connected!',
                    duration: 3000,
                    close: true,
                    gravity: 'top',
                    position: 'center',
                    backgroundColor: 'green'
                }).showToast();
            })
            .catch(() => {
                Toastify({
                    text: 'Internet not connected!',
                    duration: 3000,
                    close: true,
                    gravity: 'top',
                    position: 'center',
                    backgroundColor: 'red'
                }).showToast();
            });
    }

    setInterval(checkInternetStatus, 5000); // check every 5 seconds
</script>


<script>
    let internetStatusUrl = "{{ url('internet-status') }}";
    $.getScript(internetStatusUrl);
</script>

<script>
    function mult(value){
        var x,y;
        x=2-value;
        document.getElementById('out2x').value=x;
    }
</script>

<form>
<label>Value</label>
<input type="text" name="" onkeyup="mult(this.value);"/><br>
<label>Change</label>
<input type="text" id="out2x"/><br>


</form>
@endsection
