<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pdf Download</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <h1>Pdf Download</h1>

    <h6>Order ID :{{ $orders->id }}</h6><br>
    <h6>Name :{{ $orders->name }}</h6><br>
    <h6>Email :{{ $orders->email }}</h6><br>
    <h6>Phone :{{ $orders->phone }}</h6><br>
    <h6>Amount :{{ $orders->amount }}</h6><br>
    <h6>Address :{{ $orders->address }}</h6><br>
    <h6>Status :{{ $orders->status }}</h6><br>
    <h6>Transaction :{{ $orders->transaction_id }}</h6><br>
    <h6>Currency :{{ $orders->currency }}</h6><br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
