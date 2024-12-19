@extends('layouts.base')

@section('content')
<style>
.prodSectionCt{
    display:grid;
    grid-template-columns:25% 75%;
    width: 70%;
    margin: 0 auto;
}

@media (max-width: 1200px) {

    .prodSectionCt{
        display:flex;
        flex-direction:column;
    }
}

@media (max-width: 400px) {

    .prodSectionCt{
        display:flex;
        flex-direction:column;
    }
}


</style>

@include('components.bannerPageInfo')

<div class="prodSectionCt">
    @include('components.catSelector')
    @include('components.catXprod')
</div>

<script>
function increment() {
    var cantidad = document.getElementById("cantidad");
    cantidad.stepUp();
}

function decrement() {
    var cantidad = document.getElementById("cantidad");
    cantidad.stepDown();
}
</script>

<script>
    function addToCart(button) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        
        const form = button.closest('form');
        const formData = new FormData(form);
        
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json', 
            },
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json(); 
            })
            .then(data => {
                if (data.success) {
                    const messageDiv = document.createElement('div');
                    
                    messageDiv.className = 'alert alert-success';
                    
                    messageDiv.textContent = data.message;
                    
                    document.body.appendChild(messageDiv);
                    
                    setTimeout(() => {
                        messageDiv.remove();
                    }, 3000);
                } else {
                    alert('Hubo un error al agregar el producto.');
                }
            })
            .catch(error => console.error('Error:', error));
    }


</script>


@endsection
