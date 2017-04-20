@extends('app')

@section('content')

  <div id="wrapper">

    <!-- Sidebar -->
    @include('pages.partials.side-nav')

    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars fa-5x"></i></a>


    <div class="container-fluid">
        <p>{{ $count }} {{ str_plural('product', $count) }}</p>

        <div class="row">
            @foreach($category->products as $product)
                <div class="col-md-12 wow slideInLeft" id="product-sub-container">
                    <div class="col-md-4 text-center hoverable">
                        <a href="{{ route('show.product', $product->id) }}">
                        @if ($product->product_images->count() === 0)
                            <img src="/images/no-image-found.jpg" alt="No Image Found Tag" style="width: 200px; height: 200px;" id="image-m">
                        @else
                            @foreach($product->product_images as $image)
                                <img src="/{{ $image->image->url('thumb') }}" alt="Photo ID: {{ $image->id }}" class="img-responsive img-thumbnail" id="image-m" />
                            @endforeach
                        @endif
                        </a>
                    </div>
                    <div class="col-md-5">
                        <a href="{{ route('show.product', $product->id) }}">
                        <h5 class="center-on-small-only">{{ $product->name }}</h5>
                        <p style="font-size: .9em;">{!! nl2br(str_limit($product->description, $limit = 200, $end = '...')) !!}</p>
                        </a>
                    </div>
                    <div class="col-md-3 text-center">
                        <br><br><br>
                            <form action="/cart/add" method="post" name="add_to_cart">
                                {!! csrf_field() !!}
                                <input type="hidden" name="product" value="{{$product->id}}" />
                                <input type="hidden" name="qty" value="1" />
                                <button class="btn btn-default waves-effect waves-light">ADD TO CART</button>
                            </form>
                    </div>
                </div>
            @endforeach
        </div>

    </div>  <!-- close container-fluid-->

  </div> <!-- close wrapper -->

@endsection

@section('footer')

@endsection