@extends('app')

@section('content')

    <div id="wrapper">

        @include('pages.partials.side-nav')

        <!-- Button to toggle side-nav -->
        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars fa-5x"></i></a>


        <div class="container-fluid">

            <h6>
              Search results for: <i>{{ $query }}</i>
            </h6><br>

            @if (count($search) === 0)
                No products found
            @elseif (count($search) >= 1)
                @foreach($search as $query)
                    <div class="col-md-12 wow slideInLeft" id="product-sub-container">
                        <div class="col-md-4 text-center hoverable">
                            <a href="{{ route('show.product', $query->id) }}">
                            @if ($query->product_images->count() === 0)
                                    <img src="/images/no-image-found.jpg" alt="No Image Found Tag">
                            @else
                                @if ($query->featuredPhoto)
                                    <img src="{{ $query->product_images->first()->image->url('thumb') }}" alt="Photo ID: {{ $query->id }}" />
                                @else
                                    N/A
                                @endif
                            @endif
                            </a>
                        </div>
                        <div class="col-md-5">
                            <a href="{{ route('show.product', $query->id) }}">
                            <h5 class="center-on-small-only">{{ $query->name }}</h5>
                            <p style="font-size: .9em;">{!! nl2br(str_limit($query->description, $limit = 200, $end = '...')) !!}</p>
                            </a>
                        </div>
                        <div class="col-md-3 text-center">
                            $ {{  $query->selling_price }}
                                
                            <br><br><br>
                                <form action="/cart/add" method="post" name="add_to_cart">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="product" value="{{$query->id}}" />
                                    <input type="hidden" name="qty" value="1" />
                                    <button class="btn btn-default waves-effect waves-light">ADD TO CART</button>
                                </form>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>      <!-- Close container-fluid -->

    </div>  <!-- Close wrapper -->

@endsection
