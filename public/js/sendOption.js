
function viewPopUpNewAddress() {
    let popUp = document.getElementById('orderPopUp');
    popUp.style.display = 'flex';
}
function mostrarDelivery() {
    let formaEntregaContainer = document.getElementById('fe-layout');

    fetch('/api/direcciones')
        .then(response => response.json())
        .then(direcciones => {

            let htmlContent = `
                <h3>Elige tu forma de entrega</h3>
                <h5 style="color:#636363;margin-left: 24px;">
                    Delivery | Elige tu dirección de entrega
                </h5>
                <div class="address-card-ct">`;

            if (direcciones.length === 0) {
                htmlContent += `<p>No tienes direcciones registradas.</p>`;
            } else {
                direcciones.forEach(direccion => {
                    htmlContent += `
                        <div class="address-card">
                            <i class="medium-font fa-solid fa-house"></i>
                            <div class="address-details">
                                <p>${direccion.pais}/${direccion.departamento}/${direccion.provincia}/${direccion.distrito}</p>
                                <p>${direccion.direccionExacta}</p>
                                <p>${direccion.referencia}</p>
                            </div>
                            <input type="radio" id="direccion-${direccion.idDireccion}" name="direcciones" value="${direccion.idDireccion}">
                        </div>`;
                });
            }

            htmlContent += `
                </div>
                <div class="entrega-options">
                    <div class="entrega-options-1">
                        <small>Agregar otra dirección de entrega</small>
                        <a href="javascript:void(0);" id="addNewAddressPopUp">Agregar nueva dirección</a>
                    </div>
                </div>
                 <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="mb-3 text-center">
                            <label for="instruccionEntrega" class="form-label">Instrucciones de entrega</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="instruccionEntrega" 
                                name="instruccionEntrega" 
                                placeholder="Escribe aquí tus instrucciones..."
                            >
                        </div>
        </div>
                <button type="button" class="btn btn-primary  btn-continue-step-buy" id="btnContinuar" disabled>
                    Continuar
                </button>`;
            formaEntregaContainer.innerHTML = htmlContent;
            document.getElementById('addNewAddressPopUp').addEventListener('click', viewPopUpNewAddress);
            
            const btnContinuar = document.getElementById('btnContinuar');
            btnContinuar.addEventListener('click', nextStepBuy); 
            
            const radios = document.querySelectorAll('input[name="direcciones"]');
            btnContinuar.disabled = true;
            
            radios.forEach(radio => {
                radio.addEventListener('change', () => {
                    btnContinuar.disabled = !document.querySelector('input[name="direcciones"]:checked');
                });
            });

              function nextStepBuy(){
                let successEntrega = document.getElementsByClassName('forma-entrega-layout'); 
                let oldEntregaCt = document.getElementById('fe-layout');
                let pagoCtHidden = document.getElementsByClassName('forma-pago-ct');
                let pagoShowCt = document.getElementsByClassName('formaPago-layout');
                successEntrega[0].style.display = 'flex';
                oldEntregaCt.style.display='none';
                pagoCtHidden[0].style.display = 'none';
                pagoShowCt[0].style.display = 'flex';
                
            }
        })
        .catch(error => console.error('Error cargando direcciones:', error));
}


document.addEventListener("DOMContentLoaded", function() {
    mostrarDelivery();
});


