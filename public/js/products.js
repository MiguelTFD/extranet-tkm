function getCategories() {
    fetch('/api/categories')
        .then(response => response.json())
        .then(data => {
            let categories = data.categorias;
            let categoriesContainer = document.getElementById('categories-container');
            categoriesContainer.innerHTML = '';
            categories.forEach(category => {
                let li = document.createElement('li');
                li.textContent = category.nombreCategoria;
                
                li.classList.add('catList');
                
                li.addEventListener('click', () => {
                    filterProductsByCategory(category.idCategoria); 
                });

                categoriesContainer.appendChild(li);
            });
            console.log(categories);
        })
        .catch(error => console.error('Error:', error));
}


function filterProductsByCategory(idCategoria) {
    const token = 
        document.querySelector(
            'meta[name="csrf-token"]').getAttribute('content');

    fetch('/api/filter-products', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify({ idCategoria })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error al filtrar los productos');
        }
        return response.json();
    })
    .then(data => {
        const cardCt = document.getElementById('card-container');
        let productos = data.productos;
        
        cardCt.innerHTML = '';
        
        if (productos.length === 0) {
            cardCt.innerHTML = '<p>No hay productos disponibles.</p>';
            return;
        }
        
        productos.forEach(producto => {
            const descuento = parseFloat(producto.descuento) || 0;
            const precioUnitario = parseFloat(producto.precioUnitario);
            const precioActual = 
                precioUnitario - (precioUnitario * (descuento / 100));
            const imagenUrl = producto.imagenes?.[0]?.urlImagenProducto
                ? '/images/' + producto.imagenes[0].urlImagenProducto
                : '/images/bf5k.png';
            
            const productHTML = 
            `<div class="productCardMain">
                <div 
                    class="productCardDesc" 
                    style="background: ${descuento > 0 ? '' : 'white'}; color: ${descuento > 0 ? '' : 'white'};">
                    <p>
                        ${descuento > 0 ? `${Math.floor(descuento)}%` : '.'}
                    </p>
                </div>
                <a href="/productos/${producto.idProducto}">
                    <figure>
                        <img class="productCardImage" src="${imagenUrl}">
                        <figcaption class="nombreItem">
                            <p class="product-name">
                                ${producto.nombreProducto}
                            </p>
                        </figcaption>
                    </figure>
                </a>
            <figcaption class="preciosItems">
                <strong>
                    <p class="offert-price">
                        S/.${precioActual.toFixed(2)}
                    </p>
                </strong>
                ${descuento > 0 ? `<p class="old-price">S/.${precioUnitario.toFixed(2)}</p>` : ''}
            </figcaption>
            <div class="btnItems">
                <div class="cart-add">
                    <form 
                        id="addToCartForm-${producto.idProducto}" 
                        action="/add" 
                        method="POST"
                    >
                        <input 
                            type="hidden" 
                            name="id" 
                            value="${producto.idProducto}"
                        >
                        <button 
                            type="button" 
                            class="addCar" 
                            onclick="addToCart(this)"
                        >
                            Agregar al carrito
                        </button>
                    </form>
                </div>
            </div>
        </div>
        `;
            cardCt.innerHTML += productHTML;
        });
    })
    .catch(error => {
        console.error('Error:', error);
    });
}


function getProducts() {
    fetch('/api/products')
        .then(response => response.json())
        .then(data => {
            const cardCt = document.getElementById('card-container');
            
            let productos = data.productos;
            
            cardCt.innerHTML = '';
            
            if (productos.length === 0) {
                cardCt.innerHTML = '<p>No hay productos disponibles.</p>';
                return;
            }
            
            productos.forEach(producto => {
                const descuento = parseFloat(producto.descuento) || 0;
                
                const precioUnitario = parseFloat(producto.precioUnitario);
                
                const precioActual = 
                    precioUnitario - (precioUnitario * (descuento / 100));
                
                const imagenUrl = producto.imagenes?.[0]?.urlImagenProducto
                    ? '/images/' + producto.imagenes[0].urlImagenProducto
                    : '/images/bf5k.png';

                const productHTML = 
                `<div class="productCardMain">
                    <div 
                        class="productCardDesc" 
                        style="background: ${descuento > 0 ? '' : 'white'}; color: ${descuento > 0 ? '' : 'white'};">
                        <p>
                            ${descuento > 0 ? `${Math.floor(descuento)}%` : '.'}
                        </p>
                    </div>
                    <a href="/productos/${producto.idProducto}">
                        <figure>
                            <img class="productCardImage" src="${imagenUrl}">
                            <figcaption class="nombreItem">
                                <p class="product-name">
                                    ${producto.nombreProducto}
                                </p>
                            </figcaption>
                        </figure>
                    </a>
                <figcaption class="preciosItems">
                    <strong>
                        <p class="offert-price">
                            S/.${precioActual.toFixed(2)}
                        </p>
                    </strong>
                    ${descuento > 0 ? `<p class="old-price">S/.${precioUnitario.toFixed(2)}</p>` : ''}
                </figcaption>
                <div class="btnItems">
                    <div class="cart-add">
                        <form 
                            id="addToCartForm-${producto.idProducto}" 
                            action="/add" 
                            method="POST"
                        >
                            <input 
                                type="hidden" 
                                name="id" 
                                value="${producto.idProducto}"
                            >
                            <button 
                                type="button" 
                                class="addCar" 
                                onclick="addToCart(this)"
                            >
                                Agregar al carrito
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            `;
                cardCt.innerHTML += productHTML;
            });
        })
        .catch(error => console.error('Error:', error));
}

document.addEventListener('DOMContentLoaded',()=>{
    getCategories();
    getProducts();
});
