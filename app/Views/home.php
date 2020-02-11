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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Navbar</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<div class="container">
    <div class="d-flex justify-content-center align-items-center">
        <div class="card ">
            <div class="card-header">
                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="buyer">Buyer</label>
                                <input required type="text" class="form-control" id="buyer">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="amount">Amount</label>
                                <input required type="number" class="form-control" id="amount">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="items">Items</label>
                                <input type="text" required id="items" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="receipt_id">Receipt ID</label>
                                <input type="text" id="receipt_id" required class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="buyer_email">Email</label>
                            <input required type="email" class="form-control" id="buyer_email"
                                   placeholder="Enter Email address here ....">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone"
                                   placeholder="Phone Number">
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
                        <button type="button" id="create" class="btn btn-primary">Create</button>
                    </form>
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
    /*

      Input fields

     */


    var amount = $('#amount').val();
    var items = $('#items').val();

    var buyer_email = $('#buyer_email').val();
    var phone = $('#phone').val();
    var city = $('#city').val();
    var entry_date = $('#entry_at').val();
    var note = $('#note').val();

    /*
    Validate Amount
     */

    function checkAmount() {

        if (isNaN(amount)) {
            return alert('Amount must be number');
        }

    }

    function checkBuyer() {
        var buyer = $('#buyer').val();
        /*
        Allow text space  numbers and 20 characters . Special characters  is not allowed
         */
        var regex = /^[0-9a-zA-Z\_ ]{0,20}$/;
        if (!regex.test(buyer)) {
            return alert('Only Text spaces  Numbers and 20 characters allow in Buyer filed');
        }
    }

    function checkReceiptID() {
        /*
        Allow only text
         */
        var regex = /^[a-zA-Z ]*$/;
        var receipt_id = $('#receipt_id').val();
        if (!regex.test(receipt_id)) {
            return alert('Only Text allow in receipt id ');
        }
    }


    $('#create').click(function () {
        checkBuyer();
    });


</script>

</body>
</html>