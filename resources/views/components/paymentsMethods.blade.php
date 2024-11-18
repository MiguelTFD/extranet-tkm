
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
}
</style>

<div class="container">
    
    <div class="paymentsCt">
        <div class="openPayCards">
            <h2>
                Paga en linea mediante deposito 
                 o transferencia
            </h2>
            <p style="color:#9D9D9D;">(Cuenta BCP, BBVA y Banco de la nacion)</p>
            <div class="payList">
                <span><img class="svg-py-mt" src="{{asset('images/visa-svgrepo-com.svg')}}"></span>
                <span>
                    <img class="svg-py-mt"
                         src="{{asset('images/mastercard-3-svgrepo-com.svg')}}">
                </span>
            </div>
        </div>
        <div class="otherPay">
            <h2>
                Tambien aceptamos...
            </h2>
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
