@extends('app')

@section('content')

  <div id="wrapper">

    @include('pages.partials.side-nav')

    <!-- Button to toggle side-nav -->
    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars fa-5x"></i></a>
    <a href="{{ URL::previous() }}" class="btn btn-warning" id="menu-toggle"><i class="fa fa-arrow-left fa-5x" aria-hidden="true"></i></a>

    <div class="container-fluid">

      <div class="col-md-12">
        <div class="col-xs-12 col-sm-12 col-md-8 gallery">
          @if ($product->product_images->count() === 0)
            <p>No Images found for this Product.</p><br>
            <img src="/images/no-image-found.jpg" alt="No Image Found Tag" id="Product-similar-Image">
          @else
            @foreach ($product->product_images->slice(0, 8) as $photo)
              <div class="col-xs-6 col-sm-4 col-md-3 gallery_image text-center">
                <a href="{{ $photo->image->url }}" data-lity>
                  <img src="{{ $photo->image->url('thumb') }}" alt="Photo ID: {{ $photo->id  }}" data-id="{{ $photo->id }}" class="img-thumbnail">
                </a>
              </div>
            @endforeach
          @endif
        </div>

        <div class="col-sm-12 col-md-4">
          <h5 id="name">{{ $product->name }}</h5>
          <div class="light-300 black-text medium-500" id="Product_Reduced-Price">$ {{  $product->selling_price }}</div>
          <br/>
          <p id="Product_ISBN">SKU: {{ $product->product_sku }}</p>
          <br>
          <hr>

          @if ($product->qty == 0)
            <h5 class="text-center red-text">Sold Out</h5>
            <p class="text-center"><b>Available: {{ $product->qty }}</b></p>
          @else
            <form action="/cart/add" method="post" name="add_to_cart">
              {!! csrf_field() !!}
              <input type="hidden" name="product" value="{{$product->id}}" />
              <label>QTY</label>
              <select name="qty" class="form-control" id="Product_QTY" title="Product Quantity">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>

              <br><br>

              <p><b>Available: {{ $product->qty }}</b></p>

              <button class="btn btn-default waves-effect waves-light">ADD TO CART</button>
            </form>
          @endif
        </div>
      </div>  <!-- close col-md-12 -->


      <div class="col-md-12">

        <div class="col-sm-12 col-md-8" id="Product-Description-Container">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#product_description" aria-controls="home" role="tab" data-toggle="tab">DESCRIPTION</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="product_description">
              {!! $product->description !!}
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-4" id="Similar-Products-Container">

          <h6 class="text-center">SIMILAR PRODUCTS</h6><br>

          @foreach($similar_product->slice(0, 4) as $similar)
            <div class="col-xs-6 col-md-6 text-center" id="Similar-Product-Sub-Container">
              <a href="{{ route('show.product', $similar->name) }}">
                @if ($similar->product_images->count() === 0)
                  <p id="Similar-Title">{{ str_limit($similar->name, $limit = 28, $end = '...') }}</p>
                  <img src="/images/no-image-found.jpg" alt="No Image Found Tag" id="Product-similar-Image">
                @else
                  @if ($similar->product_images->first()->image)
                    <p id="Similar-Title">{{ str_limit($similar->name, $limit = 28, $end = '...') }}</p>
                    <img src="{{ $similar->product_images->first()->image->url('thumb') }}" alt="Photo ID: {{ $similar->id }}" id="Product-similar-Image" />
                  @else
                    N/A
                  @endif
                @endif
              </a>
            </div>
          @endforeach

        </div>

      </div>  <!-- close col-md-12 -->

      <br><br><hr>

    </div>  <!-- close container-fluid -->

    <div class="container-fluid" id="comments-container">
      <div class="col-md-12">
        <div id="disqus_thread"></div>
      </div>
    </div>

    @include('pages.partials.footer')

  </div>  <!-- close wrapper -->

@stop