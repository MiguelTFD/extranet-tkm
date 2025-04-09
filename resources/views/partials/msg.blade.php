@if (session('success'))
    <div id="success-notification" class="alert alert-success notification">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div id="error-notification" class="alert alert-danger notification">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<script>

document.addEventListener('DOMContentLoaded', () => {
    const notifications = document.querySelectorAll('.notification');

    notifications.forEach(notification => {
        console.log('Notificación encontrada:', notification.textContent.trim());
        setTimeout(() => {
            notification.classList.add('fade-out');
            setTimeout(() => {
                notification.style.display = 'none';
            }, 500); 
        }, 6000); 
    });
});
</script>
