<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <style class="text/css">
            .container {
                padding: 2rem 0rem;
                }

                h4 {
                margin: 2rem 0rem 1rem;
                }

                .table-image {
                td, th {
                    vertical-align: middle;
                }
                }
                .img_deg {
                    height: 200px;
                    width: 200px;
                }
                .h_deg {
                    font-size: 40px;
                    padding: 40px;
                }
                .c {
                text-align: right;
                }
                .d {
                padding-right: 100px;
                }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
            @include('home.header');
         <!-- end header section -->
         <!-- slider section -->
         <div class="container">
            <div class="row">
              <div class="col-12">
                  <table class="table table-image">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Image</th>
                        <th scope="col">Product Title</th>
                        <th scope="col">Product Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        <?php $totalprice = 0; ?>
                        @foreach ($carts as $cart)
                        <tr>
                            <th scope="row">{{ $cart->id }}</th>
                            <td class="w-25">
                                <img class="img_deg" src="/images/{{ $cart->image }}" alt="Sheep">
                            </td>
                            <td>{{ $cart->product_title }}</td>
                            <td>{{ $cart->quantity }}</td>
                            <td>${{ $cart->price }}</td>
                            <td>
                                <a class="btn btn-danger" href="{{ route('remove_cart',$cart->id) }}">Remove Product</a>
                            </td>
                          </tr>
                          <?php $totalprice = $totalprice + $cart->price ?>
                        @endforeach

                     </tbody>
                  </table>

                  <div class="c">
                    <h1 class="h_deg">Total Price : ${{ $totalprice }}</h1>
                  </div>
                  <div class="c">
                    <h6 class="d">Proceed to order</h6>
                    <a class="btn btn-success" href="{{ route('checkout') }}">Pay Using Card</a>
                    <a class="btn btn-info" href="{{ route('cash_order') }}">Cash On Delivery</a>

                  </div>
              </div>
            </div>
          </div>

      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <script>
        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);
    </script>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>

