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

            <div id="header-search" class=" skip-content">
                <form id="search_mini_form" action="" method="get">
                    <div class="input-box">
                        <br>
                        <input id="search" type="search" name="q" value="" class="input-text required-entry" maxlength="128" placeholder="Search entire store here..." style="border-radius: 0px; height: 33px; border: 1px solid #000; width: 250px" />
                        <button type="submit" title="Search" class="button search-button"><span><span>Search</span></span></button>
                    </div>
                </form>
            </div>

            {{--<h3 style="color: #fff; font-size: 30px; margin-top: 50px">The Fastest Book Gateway</h3>--}}
            {{--<p>1 Click Download, Purchase at Cheap</p>--}}
        </div>

        <div id="product-cat-1" class="col-md-12" style="padding: 0px">

            <form class="hidden search-wrapper col-md-12" style="margin-top: 5px">
                <div class="col-md-2"></div>
                <div class="form-group col-md-8">
                    <input type="search" name="q" class="form-control">
                </div>
                <div class="col-md-2">
                    <button type="submit">Search</button>
                </div>
            </form>

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
        });
    </script>

@endsection