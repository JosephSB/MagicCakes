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

const updateItemFromCart = async (data) => {
    const options = {
        method: "POST",
        body: data ? JSON.stringify(data) : JSON.stringify({}),
        headers: {
            "Content-Type": "application/json"
        },
    };
    try {

        const res = await fetch(`${URL_WEB}/api/cart/updateProduct`, options) /*NO ENTIENOD*/
        const data = await res.json()

        if (data.status === 200 && data.operation === true) {
            return true
        }
        return false
    } catch (error) {
        console.error(error)
        return false
    }
}

const removeItemFromMyCart = async (ItemID) => {
    const options = {
        method: "GET",
        headers: {
            "Content-Type": "application/json"
        },
    };
    try {

        const res = await fetch(`${URL_WEB}/api/cart/removeProduct/${ItemID}`, options) /*NO ENTIENOD*/
        const data = await res.json()

        if (data.status === 200 && data.operation === true) {
            return true
        }
        return false
    } catch (error) {
        console.error(error)
        return false
    }
}


const ShoopingCartItem = (image, title, price, ammount, id) => {
    return `
        <div class="shoppingcart-item" data-id="${id}">
            <img class="image" src="${image}" alt="${title}">
            <div class="body">
                <div class="body-1">
                    <p class="title">${title}</p>
                    <p class="price" data-id="${id}" data-unitPrice="${price}">${formatoMonedaSoles(price*ammount)}</p>
                </div>
                <div class="body-2">
                    <p>cantidad</p>
                    <div>
                        <button class="boton-cantidad" data-action="less" data-id="${id}">-</button>
                        <input class="input-ammout" type="text" data-id="${id}" readonly value="${ammount}" min="1" />
                        <button class="boton-cantidad" data-action="more" data-id="${id}">+</button>
                    </div>
                </div>
                <div class="body-2">
                    <i class="fa-regular fa-trash-can" data-id="${id}" ></i>
                </div>
            </div>
        </div>
    `
}

const calculateSummary = () => {
    let summary = 0;
    document.querySelectorAll(".price").forEach( item =>  summary += parseFloat(item.innerText.replace(/[^\d.-]/g, "")))


    document.getElementById("grossPrice").innerText = formatoMonedaSoles(summary);
    document.getElementById("shipmentPrice").innerText = formatoMonedaSoles(0);
    document.getElementById("igv").innerText = formatoMonedaSoles(summary*0.18);
    document.getElementById("totalPrice").innerText = formatoMonedaSoles(summary + (summary*0.18));
}

const ListenEachCartItem = () => {
    document.querySelectorAll(".fa-trash-can").forEach( itemTrash => {
        itemTrash.addEventListener("click", () => {
            const idItem = itemTrash.dataset.id;
            removeItemFromMyCart(idItem)
                .then( (resp) => {
                    if(resp){
                        document.querySelectorAll(".shoppingcart-item").forEach( item => item.dataset.id === idItem ? item.remove() : "" )
                        showAlert("Producto removido del carrito", "fa-solid fa-circle-check", "#55efc4")// esta funcion esta en alert.js
                        setItemsInCart()// esta funcion esta en cart.js
                        calculateSummary()
                        return
                    }
                    showAlert("No se pudo remover el producto", "fa-solid fa-xmark", "#FF7675")
                }  )
        })
    } )
    document.querySelectorAll(".boton-cantidad").forEach( itemBtn => {
        itemBtn.addEventListener("click", () => {
            const idItem = itemBtn.dataset.id;
            const action = itemBtn.dataset.action;
            let inputAmmount = null;
            let textPrice = null;
            document.querySelectorAll(".input-ammout").forEach( item => {
                if(item.dataset.id === idItem) inputAmmount = item
            })
            document.querySelectorAll(".price").forEach( item => {
                if(item.dataset.id === idItem) textPrice = item
            })

            if(!inputAmmount || !textPrice) return

            let newAmmount = parseInt(inputAmmount.value);

            if(action === "more") newAmmount = newAmmount + 1

            if(action === "less"){
                if(newAmmount > 1) newAmmount = newAmmount - 1
            }

            textPrice.innerText = formatoMonedaSoles(parseFloat(textPrice.dataset.unitprice) * newAmmount )
            inputAmmount.value = newAmmount;
            calculateSummary()
            document.querySelectorAll(".boton-cantidad").forEach( item => item.dataset.id === idItem ? item.setAttribute("disabled", true) : "" )
            updateItemFromCart({id: idItem, ammount: newAmmount})
                .finally( () => document.querySelectorAll(".boton-cantidad").forEach( item => item.dataset.id === idItem ? item.removeAttribute("disabled") : "" ) )
        })
    } )
}

const DrawListItems = async () => {
    ContainerItemShoppinCart.innerHTML= ""
    Loader.classList.remove = "d-none"
    const {data, total} = await getItemsFromMyCart()
    if(data.length === 0)  ContainerItemShoppinCart.innerHTML += `<p class="title-noproducts">Sin productos en el carrito</p>`
    data.map( (item) =>  ContainerItemShoppinCart.innerHTML += ShoopingCartItem(item.urllmage,item.title, item.price,item.ammount, item.itemID ) )
    calculateSummary()
    ListenEachCartItem()
}

DrawListItems()

function formatoMonedaSoles(numero) {
    var formatoNumero = numero.toLocaleString('es-PE', {
      style: 'currency',
      currency: 'PEN'
    });
    return formatoNumero;
}