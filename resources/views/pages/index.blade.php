@extends('layout.base_layout')

@section('middle-bar')
<?php
use Jenssegers\Agent\Agent;
$agent = new Agent();
?>
    <div id="middle-bar" class="col-md-8 col-md-push-2 text-center" style="padding: 0px">
        <div class="col-md-12 hidden" id="row1">
            @if($agent->isDesktop())
                <img id="logo" src="/assets/images/logo.png" class="col-md-4" alt="">
            @endif


            {{--<h3 style="color: #fff; font-size: 30px; margin-top: 50px">The Fastest Book Gateway</h3>--}}
            {{--<p>1 Click Download, Purchase at Cheap</p>--}}
        </div>

        <div id="product-cat-1" class="col-md-12" style="padding: 0px">

            <form action="/search_query" class="search-wrapper col-md-12" style="margin-top: 5px">
                <div class="col-md-2"></div>
                <div class="form-group col-md-8">
                    <input type="search" name="q" id="search-field" class="form-control">
                </div>
                <div class="col-md-2">
                    <button type="submit" id="search-btn">Search</button>
                </div>
            </form>

            <div class="col-md-12">
                @if( ! is_null($searchResult = Session::get('searchResult')) )
                    @if(count($searchResult) == 0)
                        <p class="src-result-title">We don't have this book right now.</p>
                    @elseif(count($searchResult) == 1)
                        <p class="src-result-title">1 book found</p>
                    @else
                        <p class="src-result-title">{{ count($searchResult) }} books found</p>
                    @endif
                    @foreach($searchResult as $product)
                        <div class="box single-product-wrapper col-md-4" style="background-color: rgba(255,252,0,0.27)">
                            <div class="some">No Description added</div>
                            <div class="single-product col-md-12">
                                <img src="{{ $product->product_img_url }}" alt="">
                            </div>
                            <div class="about-product">
                                <div class="col-md-12 col-xs-12">
                                    <p class="price-label col-md-6 col-xs-6" data-balloon-pos="up">{{ $product->price }} Tk</p>
                                    <a href="/order/create?product_id={{ $product->id }}" class="purchase-btn col-md-6 col-xs-6" data-balloon="Delivery Charge 30 Tk only" data-balloon-pos="up">Purchase</a>
                                </div>
                                <figcaption>
                                    <p class="product-name">{{ $product->name }}</p>
                                    <p>Author : {{ $product->author }}</p>
                                </figcaption>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            @if(count($products) > 0)
            @foreach($products as $product)
                <div class="box single-product-wrapper col-md-4">
                    <div class="some">No Description added</div>
                    <div class="single-product col-md-12">
                        <img src="{{ $product->product_img_url }}" alt="">
                    </div>
                    <div class="about-product">
                        <div class="col-md-12 col-xs-12">
                            <p class="price-label col-md-6 col-xs-6" data-balloon-pos="up">{{ $product->price }} Tk</p>
                            <a href="/order/create?product_id={{ $product->id }}" class="purchase-btn col-md-6 col-xs-6" data-balloon="Delivery Charge 30 Tk only" data-balloon-pos="up">Purchase</a>
                        </div>
                        <figcaption>
                            <p class="product-name">{{ $product->name }}</p>
                            <p>Author : {{ $product->author }}</p>
                        </figcaption>
                    </div>
                </div>
            @endforeach
            @endif
        </div>
    </div>


    <link rel="stylesheet" href="/assets/css/balloon.css">
    <script>
        $(document).ready(function () {
            $('.box').hover(function () {
                $(this).find('.some').animate({
                    width : '90%',
                    opacity : 1
                });
            });

            $('.box').mouseleave(function () {
                $(this).find('.some').animate({
                    width : '0px',
                    opacity : 0
                }, 10);
            });


            var allHeights = [];
            $('.about-product').each(function (i) {
                allHeights.push($(this).height());
            });
            //https://stackoverflow.com/questions/11985341/get-max-and-min-value-from-array-in-javascript
            var maxHeight = Math.max.apply(Math,allHeights);
            $('.about-product').height(maxHeight);

            $('#search-btn').click(function (e) {
                var q = $('#search-field').val();
                if(q.trim() == ''){
                    e.preventDefault();
                }
            });
        });
    </script>

@endsection