
<style>
.paymentsCt{
    display:flex;
    justify-content:space-between;
    flex-flow:row wrap;
    gap: 3em 0;
    margin:3em 0;
}
.svg-py-mt{
    width:3em;
    margin:0 1.5em;
    border-radius:12px;
}
</style>

<div class="container">
    
    <div class="paymentsCt">
        <div class="openPayCards">
            <h2>
                Paga en linea mediante deposito 
                 o transferencia
            </h2>
            <p 
                style="color:#9D9D9D;"
            >
                (Cuenta BCP, BBVA y Banco de la nacion)
            </p>
            <div class="payList">
                <span>
                    <img 
                        class="svg-py-mt" 
                        src="{{asset('images/bcp-logo.png')}}"
                    >
                </span>
                <span>
                    <img 
                        class="svg-py-mt" 
                        src="{{asset('images/bbva-logo.png')}}"
                    >
                </span>
                <span>
                    <img 
                        class="svg-py-mt" 
                        src="{{asset('images/bn-logo.png')}}"
                    >
                </span>
            </div>
        </div>
        <div class="otherPay">
            <h2>
                Tambien aceptamos...
            </h2>
            <p 
                style="color:#9D9D9D;"
            >
                (Pagos mediante Yapeo o Plin)
            </p>
                 <span>
                     <img class="svg-py-mt"
                     src="{{asset('images/icon/Yape-logo.png')}}">
                 </span>
                <span>
                     <img class="svg-py-mt"
                     src="{{asset('images/icon/Plin-logo.png')}}">
                 </span>
        </div>
    </div>


</div>
