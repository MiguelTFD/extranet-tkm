function addToCart(idProducto, cantidad) {
    const token = 
        document.querySelector(
            'meta[name="csrf-token"]').getAttribute('content');
    cantidad = document.getElementById('cantidad');
    var cantidadValor = cantidad.value;

    fetch('/cart/add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify({ id: idProducto ,cantidad:cantidadValor})
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);  
            updateCartCount(data.cantidadCarro); 
            getCartCount();
        }     
    })
    .catch(error => {
        console.error('Error al agregar el producto al carrito:', error);
    });
}

function updateCartCount(cantidadCarro) {
    const cartCountElement = document.getElementById('cart-count-number');  
    if (cartCountElement) {
        cartCountElement.textContent = cantidadCarro;  
    }
}

    function getCartCount() {
    fetch('/cart/count') 
        .then(response => response.json())  
        .then(data => {
            if(data.cantidadCarro == undefined){
                document.getElementById("cart-count-number").textContent = '0';
            }
            else{
                document.getElementById("cart-count-number").textContent = data.cantidadCarro;
            }
        })
        .catch(error => console.error('Error al obtener el carrito:', error));
        }


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
        })
        .catch(error => console.error('Error:', error));
}

function filterProductsByCategory(idCategoria) {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

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
        cardCt.className = 'treeSpaces';
        let productos = data.productos;
        
        cardCt.innerHTML = '';
        
        if (productos.length === 0) {
            cardCt.innerHTML = '<p>No hay productos disponibles.</p>';
            return;
        }
        
        productos.forEach(producto => {
            const descuento = parseFloat(producto.descuento) || 0;
            const precioUnitario = parseFloat(producto.precioUnitario);
            const precioActual = precioUnitario - (precioUnitario * (descuento / 100));
            const imagenUrl = producto.imagenes?.[0]?.urlImagenProducto
                ? '/images/' + producto.imagenes[0].urlImagenProducto
                : '/images/bf5k.png';
            
            const productHTML = `
                <div class="productCardMain">
                    <div class="productCardDesc" style="background:${descuento > 0 ? '' : 'white'};color:${descuento > 0 ? '' : 'white'};">
                        <p>${descuento > 0 ? `${Math.floor(descuento)}%` : '.'}</p>
                    </div>
                    <a class="productInfoClick">
                        <figure>
                            <img class="productCardImage" src="${imagenUrl}">
                            <figcaption class="nombreItem">
                                <p class="product-name">${producto.nombreProducto}</p>
                            </figcaption>
                        </figure>
                    </a>
                    <input type="hidden" value=1 id=cantidad name=cantidad>
                    <figcaption class="preciosItems">
                        <strong><p class="offert-price">S/.${precioActual.toFixed(2)}</p></strong>
                        ${descuento > 0 ? `<p class="old-price">S/.${precioUnitario.toFixed(2)}</p>` : ''}
                    </figcaption>
                    <div class="btnItems">
                        <div class="cart-add">
                            <button type="button" class="addCar">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
            `;
            
            cardCt.innerHTML += productHTML;
        });
        
        const addCartBtns = document.querySelectorAll('.addCar');
        
        addCartBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const productCard = this.closest('.productCardMain');
                const productId = productos.find(producto => 
                    producto.nombreProducto === productCard.querySelector(
                        '.product-name').textContent.trim()
                ).idProducto;
                const cantidadInput = 
                    productCard.querySelector('input[name="cantidad"]');
                const cantidad = cantidadInput ? parseInt(
                    cantidadInput.value, 10) || 1 : 1;
                addToCart(productId, cantidad);
            });
        });
        
        const productInfoLinks = document.querySelectorAll('.productInfoClick');
        productInfoLinks.forEach(link => {
            link.addEventListener('click', function () {
                const idProducto = productos.find(producto => producto.nombreProducto === this.querySelector('.product-name').textContent.trim()).idProducto;
                getProductInfo(idProducto);
            });
        });
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function getProductInfo(idProducto) {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    fetch('/api/productDetail', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify({ idProducto })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error al obtener el producto');
        }
        return response.json();
    })
    .then(data => {
        const content = document.getElementById('card-container');
        content.className = 'product-details-container';
        let producto = data.producto;
        let productosRelacionados = data.productosRelacionados;
        content.innerHTML = '';

        if (!producto) {
            content.innerHTML = '<p>No hay detalles de este producto</p>';
            return;
        }

        const descuento = parseFloat(producto.descuento) || 0;
        const precioUnitario = parseFloat(producto.precioUnitario);
        const precioActual = precioUnitario - (precioUnitario * (descuento / 100));
        const imagenUrl = producto.imagenes?.[0]?.urlImagenProducto
            ? '/images/' + producto.imagenes[0].urlImagenProducto
            : '/images/bf5k.png';

        let productDetail = `
            <div class="product-image">
                <img class="details-img-product" src="${imagenUrl}" alt="${producto.nombreProducto}">
            </div>
            <div class="product-info">
                <h1 style="color:#2D2D2E;margin-bottom:1em;">${producto.nombreProducto}</h1>
                ${producto.descuento > 0 ? `
                    <div class="product-discount">
                        <p>${parseInt(descuento)}% descuento</p>
                    </div>` : ''}
                <p><strong>Categoría:</strong> ${producto.categoria.nombreCategoria}</p>
                ${producto.descripcion ? `<p><strong>Descripción:</strong> ${producto.descripcion}</p>` : ''}
                ${producto.tamanio ? `<p><strong>Medidas:</strong> ${producto.tamanio}</p>` : ''}
                <div class="product-prices">
                    <span class="current-price">S/${precioActual.toFixed(2)}</span>
                    ${descuento > 0 ? `<span class="old-price">S/${precioUnitario.toFixed(2)}</span>` : ''}
                </div>
                <div class="product-quantity">
                    <label style="color:#C4B400" for="cantidad">Cantidad</label>
                    <div class="d-flex">
                        <button class="btn" type="button" onclick="decrement()">-</button>
                        <input id="cantidad" type="number" class="form-control text-center my-1" name="cantidad" value="1" min="1" step="1" style="width: 40px;">
                        <button class="btn" type="button" onclick="increment()">+</button>
                    </div>
                </div>
                <button type="button" class="addCar" data-product-id="${producto.idProducto}">
                    Agregar al carrito
                </button>
            </div>
        `;

        content.innerHTML += productDetail;
            
       const productDataElement = document.getElementById("card-container");
    if (productDataElement) {
    const yOffset = -80; 
    const yPosition = productDataElement.getBoundingClientRect().top + window.pageYOffset + yOffset;

    window.scrollTo({
        top: yPosition,
        behavior: 'smooth'
    });
}
 

const relacionadosHtml = productosRelacionados?.length > 0 ? `
    <div style="margin-top:9em" class="catXprodCt">
        <div class="titleCategories">
            <h3>Productos relacionados</h3>
        </div>
        <div class="treeSpaces">
            ${productosRelacionados.map(product => {
                const descuento = parseFloat(product.descuento) || 0;
                const precioUnitario = parseFloat(product.precioUnitario);
                const precioActual = precioUnitario - (precioUnitario * (descuento / 100));
                const imagenUrl = product.imagenes?.[0]?.urlImagenProducto
                    ? '/images/' + product.imagenes[0].urlImagenProducto
                    : '/images/bf5k.png';
                return `
                    <div class="productCardMain">
                        <div class="productCardDesc" style="background:${descuento > 0 ? '' : 'white'};color:${descuento > 0 ? '' : 'white'};">
                            <p>${descuento > 0 ? `${Math.floor(descuento)}%` : '.'}</p>
                        </div>
                        <a class="productInfoClick">
                            <figure>
                                <img class="productCardImage" src="${imagenUrl}">
                                <figcaption class="nombreItem">
                                    <p class="product-name">${product.nombreProducto}</p>
                                </figcaption>
                            </figure>
                        </a>
                        <figcaption class="preciosItems">
                            <strong><p class="offert-price">S/.${precioActual.toFixed(2)}</p></strong>
                            ${descuento > 0 ? `<p class="old-price">S/.${precioUnitario.toFixed(2)}</p>` : ''}
                        </figcaption>
                        <div class="btnItems">
                            <div class="cart-add">
                                <button type="button" class="addCar" data-product-id="${product.idProducto}"  >Agregar al carrito</button>
                            </div>
                        </div>
                    </div>
                `;
            }).join('')
            }
        </div>
    </div>
` : '';
    
    content.innerHTML += relacionadosHtml;

        const addCartBtns = document.querySelectorAll('.addCar');
        addCartBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const productId = this.getAttribute('data-product-id');
                addToCart(productId);
            });
        });

        const productInfoLinks = document.querySelectorAll('.productInfoClick');
        productInfoLinks.forEach(link => {
            link.addEventListener('click', function () {
                const idProducto = productosRelacionados.find(producto => producto.nombreProducto === this.querySelector('.product-name').textContent.trim()).idProducto;
                getProductInfo(idProducto);
            });
        });

        //Con esto evito que me devuelva a otra pagina
        window.history.pushState(null, null, window.location.href);
        
        window.addEventListener("popstate", function (event) {
            filterProductsByCategory(0);
           window.history.pushState(null, null, window.location.href);
        });
    })
    .catch(error => {
        console.error('Error al obtener la información del producto:', error);
    });
}


document.addEventListener('DOMContentLoaded', () => {
    getCategories();
    filterProductsByCategory();
    getCartCount();
});

