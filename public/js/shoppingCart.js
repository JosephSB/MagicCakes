const BtnAdd = document.getElementById("btn-add");
const BtnLess = document.getElementById("btn-less");
const Ammount = document.getElementById("ammount");
const FinalPrice = document.getElementById("finalPrice");
const BtnAddToCart = document.getElementById("btn-addToCart");
const IconMyCart = document.getElementById("mycart");

const addToCart = async (data) => {
    const options = {
        method: "POST",
        body: data ? JSON.stringify(data) : JSON.stringify({}),
        headers: {
            "Content-Type": "application/json"
        },
    };
    try {

        const res = await fetch(`${URL_WEB}/api/cart/addProduct`, options) /*NO ENTIENOD*/
        const data = await res.json()

        if(data.status === 200){
            return data
        }

        throw new Error("Error")
    } catch (error) {
        console.error(error)
        return {
            operation: false,
            data: "Ocurrio un error"
        }
    }
}

function currencyFormatter(value) {
    const formatoMoneda = {
        style: 'currency',
        currency: 'PEN',
    };

    return value.toLocaleString('es-PE', formatoMoneda);
}

function getProductID() {
    const url = new URL(window.location.href);
    const path = url.pathname;
    const params = path.split('/').filter(item => item !== '');
    const lastParam = params.pop();
    return lastParam
}

const handleFinalPrice = (newAmmount) => {
    const currentPrice = parseFloat(FinalPrice.dataset.init.replace(/[^\d.-]/g, ""))
    const newPrice = newAmmount * currentPrice;
    FinalPrice.innerText = currencyFormatter(newPrice)
}

if(BtnAddToCart){
    BtnAddToCart.addEventListener("click", (e) => {
        BtnAddToCart.innerHTML=`<div class="loader"></div>`
        const data = {
            ammount: parseInt(Ammount.value || "1"),
            productID:  getProductID(),
        }
        addToCart(data)
            .then( resp => {
                if(resp.operation){
                    showAlert("Producto agregado exitosamente", "fa-solid fa-circle-check", "#55efc4")
                    BtnAddToCart.innerHTML=`Producto Agregado`
                    BtnAddToCart.setAttribute("disabled", true)
                    IconMyCart.classList.remove("d-none")
                    IconMyCart.innerText = parseInt(IconMyCart.innerText || "0") + 1;
                    return
                }
                showAlert(resp.data, "fa-solid fa-xmark", "#FF7675")
                BtnAddToCart.innerHTML=`Agregar al carrito`
            } )
    })
}

if(BtnAdd){
    BtnAdd.addEventListener("click", (e) => {
        const currentAmmount = parseInt(Ammount.value || "1");
        const newAmmount = currentAmmount + 1
        Ammount.value =newAmmount;
        handleFinalPrice(newAmmount)
    })
}
if(BtnLess){
    BtnLess.addEventListener("click", (e) => {
        const currentAmmount = parseInt(Ammount.value || "1");
        const newAmmount = currentAmmount - 1
        if (currentAmmount > 1) {
            Ammount.value = newAmmount;
            handleFinalPrice(newAmmount)
        }
    })
}


