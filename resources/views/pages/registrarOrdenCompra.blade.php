@extends('layouts.base')

<style>

    #navbarCollapse{
        display:none !important;
    }
    .footer-container{
        display:none !important;
    }
    .cart-content-layout{
        display:flex;
        justify-content: space-around;
        margin: 6em 0;
        min-height:100vh;
        flex-flow:row wrap;
    }
    .item-cart-product{
       display:flex;
       justify-content: space-around;
        width:70%;
        background:#EEEEEE;
        border-radius:15px;
        margin: 0 auto;
        align-items: center;
        padding: 0.6em;
    }
    .item-cart-product-name_description{
        width: 30%;
        font-size: 0.7em;
    }
    .cart-content-items{
        flex-grow:2;
    }
    .cart-content-summary-subtotal{
        display:flex;
        justify-content:space-between;
    }
    .cart-content-summary-total{
        display:flex;
        justify-content:space-between;
    }
    .cart-content-summary{
        flex-grow:1;
    }
    .cart-content-items-list{
        display: flex;
        flex-direction: column;
        gap: 3em;
    }
    .item-cart-product-count_image{
        display: flex;
        align-items: center;
    }
    .img-cart-tumb{
        border-radius:9px;
    }
    .qty-label *{
        margin:0px !important;
    
    }
    .qty-label{
        display:flex;
        flex-direction:column;
    }
    .product-quantity{
        margin:1em;
    }
    .cart-actions{
        display:flex;
        flex-direction:column;
        gap: 1em;
        margin: 1em 0;
        align-items:center;
    }
    .svg-cart-empty{
        width:20%;
        margin: 0 auto;
        fill: #b9b9b9;
    }
    .navbar-toggler{
        display:none !important;
    }
    .hidden-product-name{
        display:none;
    }
    @media(max-width:900px){
        .ima{
            display:none;
        }
        .descripcion-item{
            display:none;
        }
        .hidden-product-name{
            display:flex;
            width:100%;
            justify-content:space-between;
        }
        .item-cart-product{
            flex-direction: column !important;
        } 
        .name-item-product{
            display:none;
        }
        .cart-content-summary{
            flex-grow:0;
            width:50%;
        }
        .a{
            display:none !important;
        } 
        .cart-content-items{
            width:60%;
            flex-grow:0;
        }
        .item-cart-product-count_image{
            order:3;
        }
        .qty-label{
            flex-direction:row;
        }
        .cart-content-summary{
            order:1;
        }
        .cart-content-items {
            order: 2;
        }
        .hidden-product-image{
            display:flex !important;
            justify-content: center;
        }
        div.item-cart-product:nth-child(1) > div:nth-child(2) > div:nth-child(4) > h6:nth-child(1) {
            text-align: center;
        }
        .imb{
            width:80%  !important;
            max-width: unset !important;
            max-height: unset !important;
            height: 80% !important;
        }
    }
    .null-div{
        display:contents;
    }
    .hidden-product-image{
        display:none;
    }
    @media(max-width:672px){
        .cart-content-items {
            width:90% !important;
            flex-grow:0;
        }
        .cart-content-summary {
            flex-grow:0;
            width:65%;
        }  
    }
    @media(max-width:450px){
        .item-cart-product {
            width:90% !important;
        }
        .cart-content-summary {
            width:90% !important;
        }
        button.btn {
            padding: 1.4em;
            font-size: 1.2em;
        }
        .img-cart-tumb.imb{
            max-width: unset !important;
            max-height: unset !important;
            width:75% !important;
            height:75% !important;
        }
    }
</style>
@section('content')

    <h1> Registar Compra </h1>

@endsection
