const ContainerProducts = document.getElementById("containerProducts");
const Loader = document.getElementById("loader");
const URL_WEB = "http://localhost/MagicCakes";


const GetProducts = async () => {
    const options = {
        method: "GET",
        headers: {
            "Content-Type": "application/json"
        },
    };
    try {
        const res = await fetch(`${URL_WEB}/api/products/getAllProducts`, options)
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

const DrawProducts = async () => {
    const data = await GetProducts()
    if(data.length === 0)  ContainerProducts.innerHTML += `<p class="title-noproducts">Sin productos</p>`
    data.map( (product) =>  ContainerProducts.innerHTML += CardProduct(product.urllmage,product.title,product.description, product.price, product.id ) )
}



DrawProducts()

const CardProduct = (image, title, description, price, id) => {
    return `
        <div class="card-product" data-productid="${id}">
            <div class="card-product-containerImg">
                <i class="fa-regular fa-heart card-product-icon"></i>
                <img class="card-product-img" src="${image}">
            </div>
            <div class="card-product-body">
                <p class="card-product-title">${title}</p>
                <p class="card-product-description">${description.length > 100 ? description.slice(0,100)+"..." : description}</p>
                <p class="card-product-price">${formatoMonedaSoles(price)}</p>
                <a href="${URL_WEB}/products/${id}">
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