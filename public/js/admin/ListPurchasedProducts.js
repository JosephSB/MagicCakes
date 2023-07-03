const ContainerProducts = document.getElementById("dalecrema");
const select = document.getElementById("select");

const GetProducts = async (month) => {
    const options = {
        method: "GET",
        headers: {
            "Content-Type": "application/json"
        },
    };
    try {
        const res = await fetch(`${URL_WEB}/api/admin/getProductsMorePurchased?mes=${month ? month : (new Date()).getMonth() + 1}` ,options)
        const data = await res.json()

        if(data.status === 200 && data.operation === true){
            return data.data
        }
        return []
    } catch (error) {
        console.error(error)
        return []
    }
}

const DrawProductsMorePurchased = async (month) => {
    const data = await GetProducts(month);
    if(data.length === 0)  ContainerProducts.innerHTML += `<p class="title-noproducts">Sin productos</p>`
    data.map( (product) =>  ContainerProducts.innerHTML += CardProduct(product.urllmage,product.title,product.description, product.total_ventas ) )
}


const CardProduct = (urllmage, title, description, total_ventas) => {
    return `
    <div class="tarjeta">
    <div class="product-left">

      <img src="${urllmage}" alt="Imagen de la torta">

      <div class="informacion">
        <h3>
          ${title}
        </h3>
        <p>
        ${description}
        </p>
      </div>
    </div>
    <div class="product-right">
      <p class="precio">TOTAL:
      ${total_ventas}
      </p>
    </div>
  </div>
    `
}


select.addEventListener("change", (e) => {
    const value = e.target.value;
    console.log(e)
    console.log(value)
    ContainerProducts.innerHTML = ""
    DrawProductsMorePurchased(value)
})

DrawProductsMorePurchased()