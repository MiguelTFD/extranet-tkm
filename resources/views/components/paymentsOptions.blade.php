<style>

    .wsp-1-2{
        display:none;
    }
    @media(max-width:480px){
        .pay-img-max{
        display:none; 
        }
        .formaPago-layout *{
            margin:12px 0;
        }
    }
    .pay-img-max{
        width:60px;
    }
    .lft{
        border-right:2px solid #DCDCDC;
    }
    .opt-ct{
        border-bottom: 2px dashed #DCDCDC;
    }
    .current-price {
    font-size: unset !important;
    color: #929302;
    font-weight: bold;
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
    .item-cart-product-count_imagev{
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
        .item-cart-product-count_imagev{
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

    .address-card {
        width:100%;
        display: flex;
        align-items: center;
        background: #f0f0f0;
        border-radius: 15px;
        padding: 15px;
        margin: 10px 0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .icon {
        font-size: 2em;
        color: #ccc;
        margin-right: 15px;
    }

      .address-details {
         flex-grow: 1;
         text-align: left;
      }

      .address-details p {
         margin: 0;
         color: #777;
      }

      .address-details p:nth-child(1) {
         color: #b0b200;
         font-weight: bold;
      }

      .radio-button {
         width: 20px;
         height: 20px;
         border: 2px solid #ccc;
         border-radius: 50%;
         display: flex;
         align-items: center;
         justify-content: center;
         margin-left: 15px;
         cursor: pointer;
      }

      .radio-button.active {
         border-color: #b0b200;
         background-color: #b0b200;
      }

      .radio-button.active::before {
         content: "";
         width: 10px;
         height: 10px;
         background-color: #fff;
         border-radius: 50%;
      }
    #btn-carrito{
        display:none !important;
    }
    .dsble{
        background:#EDEDED;
        pointer-events: none;
    }
    .btn-gotopay{
        width:90%;
        padding:1.6em 0;
    }
    @media (max-width: 900px) {
        .ima {
            display: inherit;
        }
        .name-item-product {
            display: inherit;
        }
    }
    @media(max-width:460px){
        .ima{
            display:none;
        }
        .item-cart-product-name_description {
            width: 45%;
            font-size: 0.8em;
        }
    }
      @media (max-width: 900px) {
          .item-cart-product-count_imagev {
              order: inherit !important;
          }
      }
    #orderPopUp {
        position: fixed;
        width: 100%;
        backdrop-filter: blur(5px);
        height: 100%;
        top: 0;
        z-index: 100000;
        display: none;
        justify-content: center;
        align-items: center;
    }
    .pago-max{
        width:100%;
        background: #f3f3f3;
        padding: 2em;
    }
</style>

<div class="formaPago-layout">
    <div class="pago-max card shadow-sm">
        <div class="card-body">
            <h3 class="card-title">Medios de Pago</h3>
        </div>
        <div class="accordion" id="paymentMethods">
            <!-- Yape -->
            <div class="accordion-item">
                <h2 
                    class="accordion-header" 
                    id="headingYape"
                >
                    <button 
                        class="accordion-button collapsed d-flex align-items-center" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#collapseYape" 
                        aria-expanded="false" 
                        aria-controls="collapseYape"
                    >
                        <img 
                            src="{{asset('images/icon/Yape-logo.png')}}"
                            class="pay-img-max me-3" alt="Yape Icon"
                        > 
                        Yape
                    </button>
                </h2>
                <div 
                    id="collapseYape" 
                    class="accordion-collapse collapse" 
                    aria-labelledby="headingYape" 
                    data-bs-parent="#paymentMethods"
                >
                    <div class="accordion-body">
                        <p>
                            Número de destino: +51 983 929 015
                        </p>
                        <p>
                            Destinatario: Henry Obed Cholan Romero
                        </p>
                        <p>
                            <i class="fa-solid fa-qrcode">
                            </i>
                            <span>QR:</span>
                        </p>
                        <img 
                            style="max-width: 400px; width: 100%" 
                            src="images/yape-qr.png" 
                            alt="QR" 
                        />
                    </div>
                </div>
            </div>
            <!-- Plin -->
            <div 
                class="accordion-item"
            >
                <h2 
                    class="accordion-header" 
                    id="headingPlin"
                >
                    <button 
                        class="accordion-button collapsed d-flex align-items-center" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#collapsePlin" 
                        aria-expanded="false" 
                        aria-controls="collapsePlin"
                    >
                        <img 
                            src="{{asset('images/icon/Plin-logo.png')}}"
                            class="pay-img-max me-3" 
                            alt="Plin Icon"
                        >
                        Plin
                    </button>
                </h2>
                <div 
                    id="collapsePlin" 
                    class="accordion-collapse collapse" 
                    aria-labelledby="headingPlin" 
                    data-bs-parent="#paymentMethods"
                >
                    <div 
                        class="accordion-body"
                    >
                        <p>
                            Número de destino: +51 983 929 015
                        </p>
                        <p>
                            Destinatario: Henry Obed Cholan Romero
                        </p>
                        <p>
                            <i class="fa-solid fa-qrcode">
                            </i>
                            <span>
                                QR:
                            </span>
                        </p>
                        <img 
                            style="max-width: 400px; width: 100%" 
                            src="images/plin-qr.png" 
                            alt="QR" 
                        />
                    </div>
                </div>
            </div>
            <!-- Transferencia Digital BCP -->
            <div 
                class="accordion-item"
            >
                <h2 
                    class="accordion-header" 
                    id="headingBCP"
                >
                    <button 
                        class="accordion-button collapsed d-flex align-items-center" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#collapseBCP" 
                        aria-expanded="false" 
                        aria-controls="collapseBCP"
                    >
                        <img 
                            src="{{asset('images/bcp-logo.png')}}"
                            class="pay-img-max me-3" 
                            alt="BCP"
                        >
                        Transferencia Digital BCP
                    </button>
                </h2>
                <div 
                    id="collapseBCP" 
                    class="accordion-collapse collapse" 
                    aria-labelledby="headingBCP" 
                    data-bs-parent="#paymentMethods"
                >
                    <div 
                        class="accordion-body"
                    >
                    <!--Datos de BCP-->
                    <p>
                        Número de cuenta BCP Soles: 19132941359098 
                    </p>
                    <p>
                        Titular: Henry Obed Cholan Romero 
                    </p>
                    <small>
                        <i class="fa-solid fa-circle-info">
                        </i>
                        ¡SOLO TRANSFERENCIA DIGITAL!
                    </small>
                    </div>
                </div>
            </div>
            <!-- Transferencia Digital BBVA -->
            <div 
                class="accordion-item"
            >
                <h2 
                    class="accordion-header" 
                    id="headingBBVA"
                >
                    <button 
                        class="accordion-button collapsed d-flex align-items-center" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#collapseBBVA" 
                        aria-expanded="false" 
                        aria-controls="collapseBBVA"
                    >
                        <img 
                            src="{{asset('images/bbva-logo.png')}}"
                            class="pay-img-max me-3" 
                            alt="BBVA"
                        >
                        Transferencia Digital BBVA
                    </button>
                </h2>
                <div 
                    id="collapseBBVA" 
                    class="accordion-collapse collapse" 
                    aria-labelledby="headingBBVA" 
                    data-bs-parent="#paymentMethods"
                >
                    <div 
                        class="accordion-body"
                    >
                        <p>
                            Número de cuenta BBVA Soles: 0011-0628-0200241090 
                        </p>
                        <p>
                            Titular: Henry Obed Cholan Romero 
                        </p>
                        <small>
                            <i class="fa-solid fa-circle-info">
                            </i>  
                            ¡SOLO TRANSFERENCIA DIGITAL!
                        </small>
                    </div>
                </div>
            </div>
            <!-- Depósito en Banco de la Nación -->
            <div 
                class="accordion-item"
            >
                <h2 
                    class="accordion-header" 
                    id="headingBN"
                >
                    <button 
                        class="accordion-button collapsed d-flex align-items-center" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#collapseBN" 
                        aria-expanded="false" 
                        aria-controls="collapseBN"
                    >
                        <img 
                            src="{{asset('images/bn-logo.png')}}"
                            class="pay-img-max me-3" 
                            alt="Banco de la nacion"
                        >
                        Depósito en agente del Banco de la Nación
                    </button>
                </h2>
                <div 
                    id="collapseBN" 
                    class="accordion-collapse collapse" 
                    aria-labelledby="headingBN" 
                    data-bs-parent="#paymentMethods"
                >
                    <div 
                        class="accordion-body"
                    >
                        <p>
                            Cuenta de ahorros en Soles Banco de la Nación: 04-487-189109
                        </p>
                        <p>
                            Titular: Henry Obed Cholan Romero 
                        </p>
                        <small>
                            <i class="fa-solid fa-circle-info"></i> Deposito en agente
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

