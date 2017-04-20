

@if ($cart_total === 0)
    <a href="{{ url('/') }}" class="list-group-item list-group-item-danger"> No products in your cart</a><br>
@else
    @foreach($cart_products as $cart_item)
        <div class="col-sm-12 col-md-12" id="Cart-Products-Container">
            <div class="col-sm-3 col-md-3 center-on-small-only">
                <a href="{{ route('show.product', $cart_item->product->id) }}">
                    <h6 class="center-on-small-only" id="featured-product-name">{{ $cart_item->product->name }}</h6><br>
                    @if ($cart_item->product->product_images->count() === 0)
                      <img src="/images/no-image-found.jpg" alt="No Image Found Tag" style="width: 200px; height: 200px;" id="image-m">
                    @else
                      <img src="{{ $cart_item->product->product_images->first()->image->url('thumb') }}" alt="Photo ID: {{ $cart_item->product->product_images->first()->id }}" class="img-responsive img-thumbnail" id="image-m" />
                    @endif
                </a>
            </div>
            <div class="col-sm-2 col-md-2" id="Carts-Sub-Containers">
                <div class="center-on-small-only">PRODUCT PRICE</div> <div class="light-300 black-text medium-500 center-on-small-only" id="Product_Reduced-Price-Cart">${{ $cart_item->product->selling_price }}</div>
                <br />
                <p class="center-on-small-only">SKU: {{ $cart_item->product->product_sku }}</p>
            </div>
            <div class="col-sm-3 col-md-3" id="Carts-Sub-Containers">
                <form action="/cart/update" method="post" class="form-inline">
                    {!! csrf_field() !!}
                    <input type="hidden" name="product" value="{{$cart_item->product->id}}" />
                    <input type="hidden" name="cart_id" value="{{$cart_item->id}}" />
                    <div class="form-group">
                        <select name="qty" class="form-control" title="Cart Quantity">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <button class="btn btn-sm btn-default"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-sm-1 col-md-1">
                <div class=" center-on-small-only"> QTY</div>
                <div class=" center-on-small-only"><b>{{$cart_item->qty}}</b></div>
            </div>
            <div class="col-sm-2 col-md-2" id="Carts-Sub-Containers">
                <div class="center-on-small-only">PRODUCT TOTAL</div>
                <div class="black-text medium-500 center-on-small-only" id="Product_Reduced-Price-Cart">${{$cart_item->total}}</div>
            </div>
            <div class="col-sm-1 col-md-1 center-on-small-only" id="Carts-Sub-Containers">
                <a href="{{URL::route('delete_book_from_cart', array($cart_item->id))}}">
                    <i class="fa fa-times fa-2x" aria-hidden="true" style="color: darkred;"></i>
                </a>
            </div>
        </div>
    @endforeach


    <div class="col-xs-12 col-sm-12 col-md-12" id="Cart_Totals_Container">
        <div class="col-xs-4 col-sm-8 col-md-9">
            <i class="material-icons md-18">shopping_cart</i> {{ $count }}
        </div>
        <div class="col-xs-8 col-sm-4 col-md-3">
            <b>TOTAL: ${{$cart_total}}</b>
        </div>
    </div>


@endif