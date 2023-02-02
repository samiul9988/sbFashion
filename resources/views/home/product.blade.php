<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
          <h2>
            <div>
                <form action="{{ route('product_search') }}" method="GET">
                    
                    <input style="width: 500px" type="text" name="search" placeholder="Search Something Here">
                    <input type="submit" value="search">

                </form>
            </div>
         </h2>
       </div>
       <div class="row">
        @foreach ($products as $product)
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{ route('product_details',$product->id) }}" class="option1">
                      Product Details
                      </a>

                      <form action="{{ route('add_cart',$product->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <input type="number" name="quantity" value="1" min="1" style="width: 100px">
                            </div>
                            <div class="col-md-4">
                                <input type="submit" value="Add to Cart">
                            </div>
                         </div>
                      </form>

                   </div>
                </div>
                <div class="img-box">
                   <img src="images/{{ $product->image }}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                    {{ $product->title }}
                   </h5>
                   @if ($product->discount_price!=null)
                    <h6 style="color:red">
                        {{ $product->discount_price }}
                    </h6>
                    <h6 style="text-decoration: line-through; color:blue">
                        {{ $product->price }}
                    </h6>
                    @else
                   <h6 style="color:blue">
                    {{ $product->price }}
                   </h6>
                   @endif
                </div>
             </div>
          </div>
          @endforeach

          </div>
       </div>


 </section>
