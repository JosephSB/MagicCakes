const ContainerItemShoppinCart = document.getElementById("container-items-shoppingcart");
const Loader = document.getElementById("loader");

const getItemsFromMyCart = async () => {
    const options = {
        method: "GET",
        headers: {
            "Content-Type": "application/json"
        },
    };
    try {

        const res = await fetch(`${URL_WEB}/api/cart/getShoppingCart`, options) /*NO ENTIENOD*/
        const data = await res.json()

        if (data.status === 200 && data.operation === true) {
            return data.data
        }
        return {
            data: [],
            total: 0
        }
    } catch (error) {
        console.error(error)
        return {
            data: [],
            total: 0
        }
    }
}

const ShoopingCartItem = (image, title, price, ammount, id) => {
    return `
        <div class="shoppingcart-item">
            <img class="image" src="${image}" alt="${title}">
            <div class="body">
                <div class="body-1">
                    <p class="title">${title}</p>
                    <p class="price">${formatoMonedaSoles(price*ammount)}</p>
                </div>
                <div class="body-2">
                    <p>cantidad</p>
                    <div>
                        <button class="boton-cantidad" id="btn-less">-</button>
                        <input class="input-ammout" type="text" id="ammount" readonly value="${ammount}" min="1" />
                        <button class="boton-cantidad" id="btn-add">+</button>
                    </div>
                </div>
                <div class="body-2">
                    <i class="fa-regular fa-trash-can"></i>
                </div>
            </div>
        </div>
    `
}

const DrawListItems = async () => {
    ContainerItemShoppinCart.innerHTML= ""
    Loader.classList.remove = "d-none"
    const {data, total} = await getItemsFromMyCart()
    if(data.length === 0)  ContainerItemShoppinCart.innerHTML += `<p class="title-noproducts">Sin productos en el carrito</p>`
    data.map( (item) =>  ContainerItemShoppinCart.innerHTML += ShoopingCartItem(item.urllmage,item.title, item.price,item.ammount, item.id ) )
    //listenAllBtnsFav()
}

DrawListItems()

function formatoMonedaSoles(numero) {
    var formatoNumero = numero.toLocaleString('es-PE', {
      style: 'currency',
      currency: 'PEN'
    });
    return formatoNumero;
}