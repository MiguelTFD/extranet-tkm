<style>
.table td{
    padding:2em 0;
}
</style>

<div class="col-md-9 content">
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
    <!-- Aun no agrego el actualizar usuario-->
    <div style="display:none" class="text-end">
    <a href="#" class="edit-profile">Modificar perfil</a>
    </div>
</div>
