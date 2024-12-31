

<style>

.table td{
    padding:2em 0;
}#orderPopUp {
        position: fixed;
        width: 100%;
        backdrop-filter: blur(5px);
        height: 100%;
        top: 0;
        z-index: 9999999;
        display: none;
        justify-content: center;
        align-items: center;
    }
.popUpModal{
    background: white;
    padding: 2em;
    border-radius:9px;
}

    .wsp-1-2 , #btn-carrito{
        display:none !important;
    }
.abc{
    height: fit-content;
    margin: 3% auto;

} 
</style>
<div id="orderPopUp">
    <div class="popUpModal">
    <div class="container">
    <h2>Editar Perfil</h2>
    <form
        id="update-form"
        action="{{ route('updateUser') }}" 
        method="POST"
        class="register-form needs-validation"
        novalidate
    >
        @csrf
        @method('PUT')
        <div 
            class="form-group"
        >
            <label 
                for="nombre"
            >
                Nombre
            </label>
            <input 
                type="text" 
                name="nombre" 
                id="nombre" 
                class="form-control" 
                value="{{ old('nombre', $usuario->nombre) }}" 
            >
            <div 
                class="valid-feedback"
            >
               Listo 
            </div> 
            <div 
                class="invalid-feedback"
            >
                Ingresa un nombre valido
            </div> 
        </div>
        <div 
            class="form-group"
        >
            <label 
                for="apellido"
            >
                Apellido
            </label>
            <input 
                type="text" 
                name="apellido" 
                id="apellido" 
                class="form-control" 
                value="{{ old('apellido', $usuario->apellido) }}" 
            >
            <div 
                class="valid-feedback"
            >
               Listo 
            </div> 
            <div 
                class="invalid-feedback"
            >
                Ingresa un apellido valido
            </div> 
        </div>
        <div 
            class="form-group"
        >
            <label 
                for="telefono"
            >
                Teléfono
            </label>
            <input 
                type="text" 
                name="telefono" 
                id="telefono" 
                class="form-control" 
                value="{{ old('telefono', $usuario->telefono) }}"
            >
            <div 
                class="valid-feedback"
            >
               Listo 
            </div> 
            <div 
                class="invalid-feedback"
            >
                Ingresa un número de telefono valido
            </div> 
        </div>
        <div 
            class="form-group"
        >
            <label 
                for="correo"
            >
                Correo Electrónico
            </label>
            <input 
                type="email" 
                name="correo" 
                id="correo" 
                class="form-control" 
                value="{{ old('correo', $usuario->correo) }}"
            >
            <div 
                class="valid-feedback"
            >
               Listo 
            </div> 
            <div 
                class="invalid-feedback"
            >
                Ingresa un correo electronico valido
            </div> 
        </div>
        <div 
            class="form-group"
        >
            <label 
                for="idTipoDocumentoIdentidad"
            >
                Tipo de Documento
            </label>
            <select 
                name="idTipoDocumentoIdentidad" 
                id="idTipoDocumentoIdentidad" 
                class="form-control" 
                required
            >
            <option value="">
                Seleccione el tipo de documento
            </option>
                @foreach ($tiposDocumento as $tipo)
                <option value="{{ $tipo->idTipoDocumentoIdentidad }}"
                        {{ old('idTipoDocumentoIdentidad', $documentoIdentidad->idTipoDocumentoIdentidad) == $tipo->idTipoDocumentoIdentidad ? 'selected' : '' }}>
                        {{ $tipo->nombreTipoDocumentoIdentidad }}
                    </option>
                @endforeach
            </select>
            <div 
                class="valid-feedback"
            >
               Listo 
            </div> 
            <div 
                class="invalid-feedback"
            >
                Selecciona un tipo de Documento 
            </div> 
        </div>
        <div 
            class="form-group"
        >
            <label 
                for="numeroDocumentoIdentidad"
            >
                Número de Documento
            </label>
            <input 
                type="text" 
                name="numeroDocumentoIdentidad" 
                id="numeroDocumentoIdentidad" 
                class="form-control" 
                value="{{ old('numeroDocumentoIdentidad', $documentoIdentidad) }}" 
                required
            >
            <div 
                class="valid-feedback"
            >
               Listo 
            </div> 
            <div 
                class="invalid-feedback"
            >
                Ingresa un número  de documento valido
            </div> 
        </div>
        <div 
            class="form-group"
        >
            <label 
                for="username"
            >
                Usuario
            </label>
            <input 
                type="text" 
                name="username" 
                id="username" 
                class="form-control" 
                value="{{ old('username', $usuario->username) }}" 
                required
            >
            <div 
                class="valid-feedback"
            >
               Listo 
            </div> 
            <div 
                class="invalid-feedback"
            >
                Ingresa un username valido
            </div> 
        </div>
 <div class="form-group">
  <label for="password">Contraseña</label>
  <div class="input-group">
    <input type="password" name="password" class="form-control" id="password" placeholder="Ingresa una contraseña">
    <button type="button" class="btn btn-outline-secondary toggle-password" onclick="togglePassword('password')">
      <i class="fas fa-eye" id="togglePasswordIcon"></i>
    </button>
  </div>
</div>

<div class="form-group">
   <label for="password_confirmation">Confirmar Contraseña</label>
   <div class="input-group">
      <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirma tu contraseña" >
      <button type="button" class="btn btn-outline-secondary toggle-password" onclick="togglePassword('password_confirmation')">
         <i class="fas fa-eye" id="toggleConfirmPasswordIcon"></i>
      </button>
   </div>
   <small style="color:white" id="password-match-message">.</small>
</div>


        <div class="d-flex justify-content-between mt-4">
            <button 
                 type="button" 
                 id="cerrarBtn" 
                 onclick="cerrarPopUp()" 
                 class="btn btn-secondary"
             >
                 Cancelar
            </button>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</div>
</div>
</div>

<div class="col-md-9 content abc">
    <div class="d-flex align-items-center mb-4">
        <span class="profile-picture me-3">
            <i class="bi bi-person-circle"></i>
        </span>
        <div>
            <p class="profile-title">
                <span>{{$usuario->nombre}}</span>, 
                <span>{{$usuario->apellido}}</span> 
            </p>
        </div>
    </div>
    <table class="table table-borderless">
        <tbody>
        <tr>
            <td>
                <strong>
                    Username
                </strong>
            </td>
            <td>
                {{$usuario->username}} 
            </td>
        </tr>
        <tr>
            <td>
                <strong>
                    Teléfono
                </strong>
            </td>
            <td>
                {{$usuario->telefono}} 
            </td>
        </tr>
        <tr>
            <td>
                <strong>
                    Documento de Identidad
                </strong>
            </td>
            <td>
                {{$usuario->documentoIdentidad->tipoDocumentoIdentidad->nombreTipoDocumentoIdentidad}} 
            </td>
        </tr>
        <tr>
            <td>
                <strong>
                    Número de documento de identidad
                </strong>
            </td>
            <td>
                {{$usuario->documentoIdentidad->numeroDocumentoIdentidad}} 
            </td>
        </tr>
        <tr>
            <td>
                <strong>
                    Correo
                </strong>
            </td>
            <td>
                {{$usuario->correo}} 
            </td>
        </tr>
        </tbody>
    </table>
    <div style="display:flex;justify-content:right">
    <a href="javascript:void(0);" class="edit-profile" id="addNewAddressPopUp">Modificar Perfil</a>
    </div>
   
    
</div>
   <script>

    function viewPopUpNewAddress() {
        let popUp = document.getElementById('orderPopUp');
        popUp.style.display = 'flex';
    }
    
    function cerrarPopUp(){
        popUpLayout = document.getElementById('orderPopUp');
        btnCancelar = document.getElementById('cerrarBtn');
        btnCancelar.addEventListener('click',()=>{
            popUpLayout.style.display = 'none';        
        })
    }
    document.getElementById('addNewAddressPopUp').addEventListener('click', viewPopUpNewAddress);
   </script>
<script>
const passwordField = document.getElementById('password');
const confirmPasswordField = document.getElementById('password_confirmation');
const passwordMatchMessage = document.getElementById('password-match-message');


 // Mostrar/ocultar contraseña
  function togglePassword(fieldId) {
    const passwordField = document.getElementById(fieldId);
    const icon = passwordField.nextElementSibling.firstElementChild;
    
    if (passwordField.type === "password") {
      passwordField.type = "text";
      icon.classList.remove('fa-eye');
      icon.classList.add('fa-eye-slash');
    } else {
      passwordField.type = "password";
      icon.classList.remove('fa-eye-slash');
      icon.classList.add('fa-eye');
    }
  }

// Función para validar las contraseñas
function validatePasswords() {
  if (confirmPasswordField.value === passwordField.value && passwordField.value !== '') {
    passwordMatchMessage.textContent = '✓ Las contraseñas coinciden.';
    passwordMatchMessage.style.color = 'green';
  } else if (confirmPasswordField.value !== passwordField.value) {
    passwordMatchMessage.textContent = '❌ Las contraseñas no coinciden.';
    passwordMatchMessage.style.color = 'red';
  } else {
    passwordMatchMessage.textContent = '';
  }
}

// Escuchar cambios en ambos campos
passwordField.addEventListener('input', validatePasswords);
confirmPasswordField.addEventListener('input', validatePasswords);
 
</script>
<script>
    
    document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('update-form');
    
    function validateNameField(input) {
        input.addEventListener('input', function(e) {
            this.value = this.value.replace(/\s/g, '');
            this.value = this.value.replace(/[^a-zA-Z]/g, '');
        });
    }

    validateNameField(document.getElementById('nombre'));
    validateNameField(document.getElementById('apellido'));


    const emailInput = document.getElementById('correo');
    
    emailInput.addEventListener('input', function(e) {
        
        this.value = this.value.replace(/\s/g, '');
        
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        
        if (!emailRegex.test(this.value)) {
            this.setCustomValidity('Ingresa un correo electrónico válido');
        } else {
            this.setCustomValidity('');
        }
    });

    const usernameInput = document.getElementById('username');
    usernameInput.addEventListener('input', function(e) {
        this.value = this.value.replace(/[^a-zA-Z0-9]/g, '');
        if (this.value.length < 6 || this.value.length > 12) {
            this.setCustomValidity('El username debe tener entre 6 y 12 caracteres');
        } else {
            this.setCustomValidity('');
        }
    });

    const phoneInput = document.getElementById('telefono');
    phoneInput.addEventListener('input', function(e) {
        this.value = this.value.replace(/\D/g, '');
        const phoneRegex = /^9\d{8}$/;
        if (!phoneRegex.test(this.value)) {
            this.setCustomValidity('El número debe empezar con 9 y tener 9 dígitos');
        } else {
            this.setCustomValidity('');
        }
    });

    const dniInput = document.getElementById('numeroDocumentoIdentidad');

    const tipoDocumentoSelect = 
            document.getElementById('idTipoDocumentoIdentidad');

    dniInput.addEventListener('input', function(e) {
        this.value = this.value.replace(/\D/g, '');
        
        if (tipoDocumentoSelect.value === '1') { 
            if (this.value.length !== 8) {
                this.setCustomValidity('El DNI debe tener '+
                    'exactamente 8 dígitos'
                );
            } else {
                this.setCustomValidity('');
            }
        }
    });

    form.addEventListener('submit', function(event) {
        if (!this.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    });
});    
    </script>

<script> 
    let inputNumDoc = document.getElementById('numeroDocumentoIdentidad');
    let tipoDoc = document.getElementById('idTipoDocumentoIdentidad');

    tipoDoc.addEventListener('change',()=>{
        inputNumDoc.value = '';
    })

</script>


