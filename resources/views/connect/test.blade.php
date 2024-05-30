@extends('layouts.navigation')

@section('content')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />

        <title>Login Page</title>

    <style>

.main-content{
    width: 50%;
    border-radius: 20px;
    box-shadow: 0 20px 20px rgba(0,0,0,.5);
    margin: 5em auto;
    display: flex;
}
.company__info{
    background-color: #008080;
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    color: #fff;
}
.fa-android{
    font-size:3em;
}
@media screen and (max-width: 640px) {
    .main-content{width: 90%;}
    .company__info{
        display: none;
    }
    .login_form{
        border-top-left-radius:20px;
        border-bottom-left-radius:20px;
    }
}
@media screen and (min-width: 642px) and (max-width:800px){
    .main-content{width: 70%;}
}
.row{
	margin-top: 50px:
}
.row > h2{
    color:#008080;
}
.login_form{
    background-color: #fff;
    border-top-right-radius:20px;
    border-bottom-right-radius:20px;
    border-top:1px solid #ccc;
    border-right:1px solid #ccc;
}
form{
    padding: 0 2em;
}
.form__input{
    width: 100%;
    border:0px solid transparent;
    border-radius: 0;
    border-bottom: 1px solid #aaa;
    padding: 1em .5em .5em;
    padding-left: 2em;
    outline:none;
    margin:1.5em auto;
    transition: all .5s ease;
}
.form__input:focus{
    border-bottom-color: #008080;
    box-shadow: 0 0 5px rgba(0,80,80,.4);
    border-radius: 4px;
}
.btn{
    transition: all .5s ease;
    width: 100%;
    border-radius: 30px;
    color:#008080;
    font-weight: 600;
    background-color: #fff;
    border: 1px solid #008080;
    margin-top: 1.5em;
    margin-bottom: 1em;
}
.btn:hover, .btn:focus{
    background-color: #008080;
    color:#fff;
}

    </style>

    </head>

    <body>

    	<div class="container-fluid">
        <div class="row main-content bg-success text-center">
            <div class="col-md-4 text-center company__info">
                <span class="company__logo"><h2><span class="fa fa-android"></span></h2></span>
                <h2 class="company_title">PosPrime</h2>
            </div>
            <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                <div class="container-fluid">
                    <!--<div class="row">
                        <h2>Log In</h2>
                    </div>-->
                    <div class="row">
                        <form control="" class="form-group">
                            <div class="row">
                                <input type="text" name="username" id="username" class="form__input" placeholder="Username">
                            </div>
                            <div class="row">
                                <input type="password" name="password" id="password" class="form__input" placeholder="Password">
                            </div>
                            <div class="row">
                                <label for="cb" class="pure-checkbox">
								    <input id="cb" type="checkbox" style="float: right; margin-top: 5px;">

								        <span style="margin-right: -200px; padding-top: 200px;">
								             Remember me
								        </span>
								</label>
                            </div>
                            <div class="row">
                                <input type="submit" value="Login" class="btn">
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <p>Don't have an account?  <a href="#">Register Here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <div class="container-fluid text-center footer">
        Designed and Developed by <a href="https://bit.ly/yinkaenoch">Comtech Ventures LTD.</a></p>
    </div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>


#include <stdio.h>

    int main() {
        float dutiable_value, import_duty, duty, total_sum;

        // Read dutiable value from user
        printf("Enter dutiable value: ");
        scanf("%f", &dutiable_value);

     // Read import tax value from user
       printf("Enter import duty value: ");
       scanf("%f", &import_duty);

        // Calculate duty
        duty = dutiable_value * import_duty/100;
    printf("Duty is: %.2f",duty);


        return 0;
    }

    #include <stdio.h>

        int main() {
            float dutiable, dutiable_value,  import_duty, vat,vat_total,import_commission,import_commission_value,withholding_tax,withholding_tax_value, environment_tax, environment_tax_value, duty, total_cost;

            // Read dutiable value from user
            printf("Enter dutiable value: ");
            scanf("%f", &dutiable);

         // Read import tax value from user
           printf("Enter import duty tax: ");
           scanf("%f", &import_duty);

            // Calculate duty
            dutiable_value = dutiable * import_duty/100;
            printf("Dutiable amount is: %.2f\n",duty);


        // To calculate Vat from user
        printf("Enter VAT tax: ");
        scanf("%f", &vat);

        // Vat formula
        vat_total = duty*vat/100;

         printf("Vat amount is: %.2f\n",vat_total);

         // To calculate Import commission from Bless motors
        printf("Enter Import Commission tax: ");
        scanf("%f", &import_commission);
        import_commission_value = import_commission*dutiable_value;
        printf("Import Commission amount is: %.2f\n",import_commission_value);

         // To calculate Withholding tax from Bless motors
        printf("Enter Withholding tax: ");
        scanf("%f", &withholding_tax);
        withholding_tax_value = withholding_tax*dutiable_value;
        printf("Withholding tax  amount is: %.2f\n",withholding_tax_value);

         // To calculate Environment tax from Bless motors
        printf("Enter Environment tax: ");
        scanf("%f", &environment_tax);
        environment_tax_value = environment_tax*dutiable_value;
        printf("Withholding tax  amount is: %.2f\n",environment_tax_value);

            return 0;
        }
@endsection

