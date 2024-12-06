document.addEventListener("DOMContentLoaded",()=>{

let metodoPagoLayout = document.getElementById('opcionDePago');
let pagoElegido = document.getElementById('pagoElegido').innerText;

let pagoEnYape=`
    Número de destino: +51 983 929 015<br>
    Destinatario: Henry Obed Cholan Romero<br>
    <p>    <i class="fa-solid fa-qrcode">
    </i><span>QR:</span></p>


    <img style="max-width: 400px; width: 100%" src="images/yape-qr.png" alt="QR" />
`;
let pagoEnPlin=`
    Número de destino: +51 983 929 015<br>
    Destinatario: Henry Obed Cholan Romero<br>
    <p>    <i class="fa-solid fa-qrcode">
    </i><span>QR:</span></p>
     <img style="max-width: 400px; width: 100%" src="images/plin-qr.png" alt="QR" />

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
        case 'Pago en plin':
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

    // Lógica para mostrar el modal con la imagen del QR
    const qrModal = document.getElementById('qrModal');
    const qrImage = document.getElementById('qrImage');
    const closeModal = document.getElementById('closeModal');
    const verQr = document.getElementById('verQr');

    verQr.addEventListener('click', (e) => {
        e.preventDefault(); // Evita que se recargue la página al hacer clic

        // Dependiendo del método de pago, asignar una imagen diferente
        if (pagoElegido === 'Pago en yape') {
            qrImage.src = 'images/yape-qr.png'; // Ruta de la imagen para Yape
        } else if (pagoElegido === 'Pago en plin') {
            qrImage.src = 'images/plin-qr.png'; // Ruta de la imagen para Plin
        }
        // Mostrar el modal
        qrModal.style.display = 'block';
    });

    // Cerrar el modal al hacer clic en la X
    closeModal.addEventListener('click', () => {
        qrModal.style.display = 'none';
    });

    // Cerrar el modal si se hace clic fuera del contenido
    window.addEventListener('click', (e) => {
        if (e.target === qrModal) {
            qrModal.style.display = 'none';
        }
    });


})
