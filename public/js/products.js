function getCategories(){
    fetch('/api/categories')
        .then(response => response.json())
        .then(data =>{
            let categories = data.categorias;
            let categoriesContainer = 
                document.getElementById('categories-container');
                
                categoriesContainer.innerHTML='';
                
                categories.forEach(category=>{
                    let li = document.createElement('li');
                    li.textContent=category.nombreCategoria;
                    categoriesContainer.appendChild(li);
                });
        })
        .catch(error => console.error('Error:', error));
}
/*
function getProductsByCategory(){
    fetch('/api/products/{id}')
        .then(response => response.json())
        .then(data=> console.log(data))
        .catch(error=> console.log('Error: ', error));
}
*/
getCategories();
