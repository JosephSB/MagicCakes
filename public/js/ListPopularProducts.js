const ContainerProducts = document.getElementById("containerProducts");
const Loader = document.getElementById("loader");


const GetPopularProducts = async () => {
    const options = {
        method: "GET",
        headers: {
            "Content-Type": "application/json"
        },
    };
    try {
        const res = await fetch(`${URL_WEB}/api/products/getPopularProducts`, options)
        const data = await res.json()
        Loader.style.display = "none"
        if(data.status === 200 && data.operation === true){
            return data.data
        }
        return []
    } catch (error) {
        console.error(error)
        return []
    }
}

const DrawPopularProducts = async () => {
    const data = await GetPopularProducts()
    if(data.length === 0)  ContainerProducts.innerHTML += `<p class="title-noproducts">Sin productos</p>`
    data.map( (product) =>  ContainerProducts.innerHTML += CardProduct(product.urllmage,product.title,product.description, product.price,product.stock, product.id, product.isFav ) )
    listenAllBtnsFav()
}



DrawPopularProducts()

const CardProduct = (image, title, description, price,stock, id,isFav) => {
    return `
        <div class="card-product" data-productid="${id}">
            <div class="card-product-containerImg">
                ${isFav 
                    ? `<i class="fa-solid fa-heart card-product-icon active" data-id="${id}"></i>`
                    : `<i class="fa-regular fa-heart card-product-icon" data-id="${id}"></i>` 
                }
                <img class="card-product-img" src="${image}">
            </div>
            <div class="card-product-body">
                ${(!stock || stock === 0 )
                    ? `<div class="card-product-spam card-product-spam-err"><p>Sin stock</p></div>` 
                    : "" 
                }
                ${(stock > 0 && stock < 10 ) 
                    ? `<div class="card-product-spam card-product-spam-medium"><p>Ultimos productos</p></div>` 
                    : "" 
                }
                <p class="card-product-title">${title}</p>
                <p class="card-product-description">${description.length > 100 ? description.slice(0,100)+"..." : description}</p>
                <p class="card-product-price">${formatoMonedaSoles(price)}</p>
                <a href="${URL_WEB}/products/detail/${id}">
                    <button class="card-product-btn">COMPRAR</button>
                </a>
            </div>
        </div>
    `
}

function formatoMonedaSoles(numero) {
    var formatoNumero = numero.toLocaleString('es-PE', {
      style: 'currency',
      currency: 'PEN'
    });
    return formatoNumero;
}