@extends('store.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in as Store!
                    <br/><br/><br/>
                    <div class="clearfix"></div>
                    <div class="col-md-8">
                        <p>Sales Total : $ {{Auth::guard('store')->user()->orders->sum('total')}}</p>
                        <?php $arrTotalIncome=[]; $arrTotalPurchase=[]; ?>
                        @if(Auth::guard('store')->user()->orders->count() > 0)
                            @foreach(Auth::guard('store')->user()->orders as $order)
                                <?php 
                                    array_push($arrTotalPurchase, $order->total_purchasing());
                                    array_push($arrTotalIncome, $order->income()); 
                                ?>
                            @endforeach
                        @endif
                        <p>Purchasing Products Price Total : $ {{array_sum($arrTotalPurchase)}}</p>
                        <p>Income Total : $ {{array_sum($arrTotalPurchase)}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
