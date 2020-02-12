<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
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
                <a class="nav-link" href="index.php">Home</a>
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
                <a class="nav-link" href="report">Report</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="card">
        <div class="card-body">
            <table class="table-bordered table" width="100%">
                <thead>
                <th>Buyer</th>
                <th>Amount</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Note</th>
                <th>Date</th>
                <th>Items</th>
                </thead>
                <tbody>
                <?php
                foreach ($data as $d) {
                    ?>
                    <tr>
                        <td><?php echo $d->buyer; ?></td>
                        <td><?php echo $d->amount; ?></td>
                        <td><?php echo $d->buyer_email; ?></td>
                        <td><?php echo $d->phone; ?></td>
                        <td><?php echo $d->note; ?></td>
                        <td><?php echo $d->entry_at; ?></td>
                        <td>
                            <?php
                            foreach(unserialize($d->items) as $item){
                                echo $item . "<br>";
                            }

                            ?>
                        </td>
                    </tr>
                    <?php

                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>