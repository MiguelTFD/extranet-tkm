document.addEventListener("DOMContentLoaded",()=>{

let metodoPagoLayout = document.getElementById('opcionDePago');
let pagoElegido = document.getElementById('pagoElegido').innerText;

let pagoEnYape=`
    Número de destino: +51 983 929 015<br>
    Destinatario: Henry Obed Cholan Romero<br>
    <i class="fa-solid fa-qrcode">
    </i>
    <a href="#" class="text-decoration-none">
        Ver QR
    </a>
`;
let pagoEnPlin=`
    Número de destino: +51 983 929 015<br>
    Destinatario: Henry Obed Cholan Romero<br>
    <i class="fa-solid fa-qrcode">
    </i>
    <a href="#" class="text-decoration-none">
        Ver QR
    </a>
`;

let depositoBancoNacion=`
    <p>
        Cuenta de ahorros en Soles Banco de la Nación: 04-487-189109
    </p>
    <p>
        Titular: Henry Obed Cholan Romero 
    </p>
    <small>
        <i class="fa-solid fa-circle-info"></i> Deposito en agente
    <small>
`;
let transferenciaBBVA=`
    <p>
        Número de cuenta BBVA Soles: 0011-0628-0200241090 
    </p>
    <p>
        Titular: Henry Obed Cholan Romero 
    </p>
    <small>
        <i class="fa-solid fa-circle-info"></i>  ¡SOLO TRANSFERENCIA DIGITAL!
    <small>
`;
let transferenciaBCP=`
    <p>
        Número de cuenta BCP Soles: 19132941359098 
    </p>
    <p>
        Titular: Henry Obed Cholan Romero 
    </p>
    <small>
        <i class="fa-solid fa-circle-info"></i>  ¡SOLO TRANSFERENCIA DIGITAL!
    <small>
`;

        console.log(pagoElegido);
    
    switch (pagoElegido) {
        case 'Pago en yape':
            console.log('yape');
            metodoPagoLayout.innerHTML = pagoEnYape;  
            break;
        case 'Pago con Plin':
            console.log('plin');
            metodoPagoLayout.innerHTML = pagoEnPlin;  
            break;
        case 'Deposito en Banco de la Nacion':
            console.log('BN');
            metodoPagoLayout.innerHTML = depositoBancoNacion;  
            break;
        case 'Transferencia digital BCP':
            console.log('BCP');
            metodoPagoLayout.innerHTML = transferenciaBCP ;  
            break;
        case 'Transferencia digital BBVA':
            console.log('BBVA');
            metodoPagoLayout.innerHTML = transferenciaBBVA;  
            break;
        default:
            metodoPagoLayout.innerHTML = `<p>Algo salio mal :(`;
            console.log('error');
    }

})
