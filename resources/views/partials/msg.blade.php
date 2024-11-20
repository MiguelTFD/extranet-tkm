


@section('content')
    @if (\Session::get("success"))
        <div id="success-notification" class="alert alert-success text-center notification">
            <p>{{ \Session::get("success") }}</p>
        </div>

    <style>
        .notification {
            position: fixed;
            top: 16%;
            right: 1%;
            z-index: 999999999;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            font-size: 16px;
            opacity: 1;
            transition: opacity 0.5s ease-out;
            display: none;  /* Inicialmente oculto */
        }

        /* Añadir transición para el efecto de desvanecimiento */
        .fade-out {
            opacity: 0;
            transition: opacity 1s ease-in;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Función para mostrar la notificación
            function showNotification(notificationId) {
                var notification = document.getElementById(notificationId);
                
                // Muestra la notificación
                notification.style.display = 'block';

                // Después de 6 segundos, aplicar el efecto de desvanecimiento y ocultar
                setTimeout(function() {
                    notification.classList.add('fade-out');
                    
                    // Después de que la animación de desvanecimiento termine, ocultamos la notificación completamente
                    setTimeout(function() {
                        notification.style.display = 'none';
                        notification.classList.remove('fade-out');
                    }, 1000); // Tiempo de fade-out (1 segundo)
                }, 6000); // 6 segundos
            }

            // Mostrar las notificaciones si existen
            if (document.getElementById('success-notification')) {
                showNotification('success-notification');
            }
            if (document.getElementById('error-notification')) {
                showNotification('error-notification');
            }
        });
    </script>

    @endif

    @if($errors->any())
        <div id="error-notification" class="alert alert-danger mt-3 notification">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>


    <style>
        .notification {
            position: fixed;
            top:20%;
            right: 10%;
            z-index: 9999;
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            font-size: 16px;
            opacity: 1;
            transition: opacity 0.5s ease-out;
            display: none;  /* Inicialmente oculto */
        }

        /* Añadir transición para el efecto de desvanecimiento */
        .fade-out {
            opacity: 0;
            transition: opacity 1s ease-in;
        }
    </style>

        <script>
            // Función para manejar la respuesta del servidor
            function handleServerResponse(response) {
            if (response.success) {
            showNotification('success-notification', response.message);
        } else {
            showNotification('error-notification', response.message);
        }
        }

            // Función para mostrar notificaciones
            function showNotification(notificationId, message) {
            var notification = document.getElementById(notificationId);

            // Actualiza el contenido de la notificación
            notification.querySelector('p').textContent = message;

            // Muestra la notificación
            notification.style.display = 'block';

            // Después de 6 segundos, aplicar el efecto de desvanecimiento y ocultar
            setTimeout(function () {
            notification.classList.add('fade-out');

            // Después de que la animación de desvanecimiento termine, ocultar completamente
            setTimeout(function () {
            notification.style.display = 'none';
            notification.classList.remove('fade-out');
        }, 1000); // Tiempo del fade-out (1 segundo)
        }, 6000); // Tiempo de visualización (6 segundos)
        }

            // Ejemplo de llamada AJAX que recibe el JSON
            fetch('/', {
            method: 'POST',
            headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
            body: JSON.stringify({ key: 'value' }) // Datos enviados
        })
            .then(response => response.json())
            .then(data => handleServerResponse(data))
            .catch(error => console.error('Error:', error));
    </script>


    @endif


