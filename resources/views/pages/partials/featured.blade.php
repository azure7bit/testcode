<h4 class="text-center animated zoomIn" id="featured-products-heading">Featured Products</h4>

<div class="text-center">
  
  <div class="container-fluid" id="Index-Main-Container">

    <div id="featured-products-sub-container">
      <div class="row">
        @foreach($products as $product)
          <div class="col-sm-6 col-md-3 animated zoomIn" id="featured-container">
              <a href="{{route('show.product', $product->id)}}">
              @if ($product->product_images->count() === 0)
                <img src="/images/no-image-found.jpg" alt="No Image Found Tag" id="Product-similar-Image" style="width: 200px; height: 200px;">
              @else
                @foreach($product->product_images as $image)
                  <img src="{{ $image->image->url() }}" alt="Photo ID: {{ $image->id }}" />
                @endforeach
              @endif
              <div id="featured-product-name-container">
                <h6 class="center-on-small-only" id="featured-product-name"><br>{{ $product->name }}</h6>
              </div>
              <div class="light-300 black-text medium-500" id="Product_Reduced-Price">$ {{  $product->selling_price }}</div>
              </a>
              <form action="/cart/add" method="post" name="add_to_cart">
                {!! csrf_field() !!}
                <input type="hidden" name="product" value="{{$product->id}}" />
                <input type="hidden" name="qty" value="1" />
                <button class="btn btn-default waves-effect waves-light">ADD TO CART</button>
              </form>
          </div>

          <!-- ---------------------------------------------- For Mobile -------------------------------------------------------------------------- -->
          <div class="col-sm-6 col-md-3 animated zoomIn" id="featured-container-m">
            <a href="{{route('show.product', $product->id)}}">
              <div class="col-xs-12">
                <div id="featured-product-name-container">
                  <h6 class="center-on-small-only" id="featured-product-name"><br>{{ $product->name }}</h6>
                </div>
                <div class="light-300 black-text medium-500" id="Product_Reduced-Price">$ {{  $product->selling_price }}</div>
              </div>
              <div class="col-xs-6">
                @if ($product->product_images->count() === 0)
                  <img src="/images/no-image-found.jpg" alt="No Image Found Tag" style="width: 200px; height: 200px;" id="image-m">
                @else
                  @foreach($product->product_images as $image)
                    <img src="/{{ $image->image->url('thumb') }}" alt="Photo ID: {{ $image->id }}" class="img-responsive img-thumbnail" id="image-m" />
                  @endforeach
                @endif
              </div>
            </a>
            <form action="/cart/add" method="post" name="add_to_cart">
              {!! csrf_field() !!}
              <input type="hidden" name="product" value="{{$product->id}}" />
              <input type="hidden" name="qty" value="1" />
              <button class="btn btn-default waves-effect waves-light">ADD TO CART</button>
            </form>
          </div>
        @endforeach
      </div>
    </div>

  </div>
</div>