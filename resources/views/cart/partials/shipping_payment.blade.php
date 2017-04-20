@if ($cart_total === 0)

@else
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" id="Checkout-Shipping-Payment-Container">
                <div class="panel-heading">Shipping information</div>
                <div class="panel-body">

                    <form id="payment-form" role="form" method="POST" action="/order">
                        {!! csrf_field() !!}

                        <div class="alert alert-danger payment-errors @if(!$errors->any()){{'hidden'}}@endif">
                            {{$errors->first('error')}}
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('full_name') ? ' has-error' : '' }}">
                                <label>Full Name</label>
                                <input type="text" title="full_name" class="form-control" name="full_name" value="{{ old('full_name') }}">
                                @if ($errors->has('full_name'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('full_name') }}</strong>
                                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label>Address</label>
                                <input type="text" title="address" class="form-control" name="address" value="{{ old('address') }}">
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label>City</label>
                                <input type="text" title="city" class="form-control" name="city" value="{{ old('city') }}">
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-6" style="padding-left: 0;">
                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label>Phone Number</label>
                                    <input type="text" title="phone" class="form-control" name="phone" value="{{ old('phone') }}">
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <br>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <br><br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default waves-effect waves-light">
                                    CONFIRM PAYMENT
                                </button>
                            </div>
                        </div>

                    </form> <!-- close form -->

                </div>  <!-- close panel-body -->
            </div>  <!-- close panel-default -->
        </div>  <!-- close col-md-10 -->
    </div>  <!-- row -->
@endif

<br><br><br><br> <br><br><br><br>