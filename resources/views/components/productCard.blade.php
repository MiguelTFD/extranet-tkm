{{-- resources/views/components/productCard.blade.php --}}

<style>
.productCardMain {
    display:flex;
    flex-direction:column;
    min-width: 330px;
}

@media (max-width: 400px) {
    .productCardMain{
    min-width:290px;
    }
}

.nombreItem {
    text-align: center;
}

.preciosItems {
    display: flex;
    justify-content: space-evenly;
}

.btnItems {
    display: flex;
    justify-content: space-evenly;
}



.addCar {
    all: unset;
    display: inline-block;
    cursor: pointer;
    padding: 10px;
    margin: 0;
    border: none;
    border-radius: 30px;
    background: #C4B400;
    color: #FFFFFF;
}

.viewMore {
    all: unset;
    border-radius: 30px;
    background: #C4B400;
    display: inline-block;
    cursor: pointer;
    padding: 5px;
    margin: 0;
    border: none;
    background: #2D2D2E;
    color: #FFFFFF;
}
.viewMore:hover{
    color:#FFFFFF;
}

.preciosItems {
    margin: 7px 0px;
    align-items: center;
}
.offert-price{
    color: #C4B400;
    font-size: 25px;
}
.old-price{
    text-decoration: line-through;
    color: #a0a0a0;
}
.product-name{
    font-family: "Jost", sans-serif;
    font-size:20px;
    font-weight:550;
}
</style>

{{--
<script>
    function addToCart(button) {
        const csrfToken = 
            document.querySelector('meta[name="csrf-token"]').content;
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
--}}
