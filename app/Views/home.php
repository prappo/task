<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Entry Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .container {
            padding-top: 50px;
        }
    </style>

</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
            </li>

        </ul>
    </div>
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#">Data Entry</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">

            <li class="nav-item active">
                <a class="nav-link" href="#">Search</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="d-flex justify-content-center align-items-center">


        <div class="card ">
            <div class="card-header">
                <div class="row" id="msg">

                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="buyer">Buyer</label>
                                <input required type="text" class="form-control" id="buyer">
                                <div class="invalid-feedback">
                                    Only Text spaces  Numbers and 20 characters allow in Buyer filed
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="amount">Amount</label>
                                <input required type="number" class="form-control" id="amount">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="receipt_id">Receipt ID</label>
                            <input type="text" id="receipt_id" required class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="buyer_email">Email</label>
                            <input required type="email" class="form-control" id="buyer_email"
                                   placeholder="Enter Email address here ....">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">880</div>
                                </div>
                                <input type="number" class="form-control" id="phone"
                                       placeholder="Phone Number">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="entry_at">Date</label>
                                <input type="date" class="form-control" id="entry_at">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="note">Note</label>
                            <textarea class="form-control" id="note"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="wrapper">
                            <div class="form-group">
                                <label for="items">Items</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" name="items[]" required class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-success add_field_button">Add more</button>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" id="create" class="btn btn-block btn-primary">Create</button>
                    </div>

                </div>
            </div>

        </div>


    </div>
</div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>


<script>

    $(document).ready(function () {

        /*
        Add Dynamic Items
        */

        function msg(text) {

            $('#msg').html('<b style="color:red">' + text + "</b>" );

        }

        var validation = true;
        var wrapper = $(".wrapper");
        var add_button = $(".add_field_button");

        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();

            x++;
            $(wrapper).append('<div style="border:1px solid gray;border-radius: 5px" class="form-group"><input class="form-control" type="text" name="items[]"/><a href="#" class="btn btn-danger btn-sm remove_field">Remove</a></div>'); //add input box

        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });

        function checkItems() {

            var values = Array.from(
                document.querySelectorAll(".wrapper input[name='items[]']"), ({value}) => value);

            var regExp = /^[a-zA-Z ]*$/;

            /*
             Check validation for each item . Checking for text only validation
            */
            var status = true;
            for (var i = 0; i < values.length; i++) {
                if (!regExp.test(values[i])) {
                    msg('Only text allowed. Please check your items name');
                    status = false;

                }

            }

            return status;


        }

        function getItems() {

            var values = Array.from(
                document.querySelectorAll(".wrapper input[name='items[]']"), ({value}) => value);

            var regExp = /^[a-zA-Z ]*$/;


            return values;
        }


        /*
        Validate Amount
         */

        function checkAmount() {

            if (isNaN(amount)) {
                msg('Amount must be number');
                validation = false;
            }

        }

        /*
        Validate buyer
        */


        function checkBuyer() {
            var buyer = $('#buyer').val();
            /*
            Allow text space  numbers and 20 characters . Special characters  is not allowed
             */
            var regex = /^[0-9a-zA-Z\_ ]{0,20}$/;
            if (!regex.test(buyer)) {
                $('#buyer').addClass('is-invalid');
                validation = false;

            }
        }

        /*
        Validate Receipt ID
        */

        function checkReceiptID() {
            /*
            Allow only text
             */
            var regex = /^[a-zA-Z ]*$/;
            var receipt_id = $('#receipt_id').val();
            if (!regex.test(receipt_id)) {
                msg('Only Text allow in receipt id ');
                validation = false;
            }
        }

        /*
        Validate Email
         */

        function checkEmail() {
            var regExp = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
            if (!regExp.test($('#buyer_email').val())) {
                msg('Email is not valid');
                validation = false;
            }
        }

        function checkNote() {
            var regExp = /^\W*(\w+(\W+|$)){1,30}$/;
            if (!regExp.test($('#note').val())) {
                msg('Note text not more than 30 words')
                validation = false;
            }
        }

        function checkCity() {
            var regExp = /^[a-zA-Z ]*$/;
            if (!regExp.test($('#city').val())) {
                msg('Only text and space allow');
                validation = false;
            }
        }

        function getPhoneNumber() {
            return "880" + parseInt($('#phone').val());
        }

        function checkPhone() {
            if ($('#phone').val() == '') {
                msg('Phone number required');
                validation = false;
            }

        }


        $('#create').click(function () {
            validation = true;
            checkBuyer();
            // checkAmount();
            // checkReceiptID();
            // checkEmail();
            // checkPhone();
            // checkCity();
            // checkNote();
            // checkItems();


            // if (validation) {
            //     $('#msg').html('Please Wait ...');
            //     $.ajax({
            //         type: 'POST',
            //         url: '/store',
            //         data: {
            //             'amount': $('#amount').val(),
            //             'buyer': $('#buyer'),
            //             'receipt_id': $('#receipt_id'),
            //             'items': getItems(),
            //             'buyer_email': $('  #buyer_email').val(),
            //             'note': $('#note').val(),
            //             'city': $('#city').val(),
            //             'phone': getPhoneNumber(),
            //             'entry_at': $('#entry_at').val()
            //         },
            //         success: function (data) {
            //             if (data == 'success') {
            //                 msg("Data submitted successfully !");
            //             }
            //             eles
            //             {
            //                 msg(data);
            //             }
            //         },
            //         error: function (data) {
            //             msg('Something went wrong');
            //             console.log(data.responseText);
            //         }
            //     })
            // }


        });

    });


</script>

</body>
</html>