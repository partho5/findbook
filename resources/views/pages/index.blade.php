@extends('layout.base_layout')

@section('middle-bar')
<?php
use Jenssegers\Agent\Agent;
$agent = new Agent();
?>
    <div id="middle-bar" class="col-md-8 col-md-push-2 text-center" style="padding: 0px">
        <div class="col-md-12" id="row1">
            @if($agent->isDesktop())
                <img id="logo" src="/assets/images/logo.png" class="col-md-4" alt="">
            @endif

            <div id="header-search" class="skip-content">
                <form id="search_mini_form" action="https://code--projects.com/magento/catalogsearch/result/" method="get">
                    <div class="input-box">
                        <br>
                        <input id="search" type="search" name="q" value="" class="input-text required-entry" maxlength="128" placeholder="Search entire store here..." style="border-radius: 0px; height: 33px; border: 1px solid #000" />
                        <button type="submit" title="Search" class="button search-button"><span><span>Search</span></span></button>
                    </div>
                </form>
            </div>

            <h3 style="color: #fff; font-size: 30px; margin-top: 50px">The Fastest Book Gateway</h3>
                <a href="/invoice">Invoice Test</a>
            <p>1 Click Download, Purchase at Cheap</p>
        </div>

        <div id="product-cat-1" class="col-md-12" style="padding: 0px"><br><br>
            <h2><span>Book Category Science</span></h2>

            @for($i=0; $i<9; $i++)
                <div class="box col-md-4">
                    <div class="single-product col-md-12">
                        <img src="/assets/images/books/android.png" alt="">
                    </div>
                    <div class="about-product">
                        <a href="/order/{{ $i }}" class="purchase-btn col-md-12" data-balloon="Tk 190 only" data-balloon-pos="up">Purchase</a>
                        <figcaption>
                            <p>Name : Android Programing</p>
                            <p>Author : O'Reilly</p>
                        </figcaption>
                    </div>
                </div>
            @endfor
        </div>
    </div>


    <link rel="stylesheet" href="/assets/css/balloon.css">
    <script>
        $(document).ready(function () {
            $('.box').hover(function () {
                $(this).find('.some').animate({
                    width : '100%',
                    opacity : 1
                });
            });

            $('.box').mouseleave(function () {
                $(this).find('.some').animate({
                    width : '0px',
                    opacity : 0
                });
            });
        });
    </script>

@endsection