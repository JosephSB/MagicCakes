const MyCart = document.getElementById("mycart");

const getTotalItemsInCart = async () => {
    const options = {
        method: "GET",
        headers: {
            "Content-Type": "application/json"
        },
    };
    try {

        const res = await fetch(`${URL_WEB}/api/cart/getTotalProductsInCart`, options) /*NO ENTIENOD*/
        const data = await res.json()

        if(data.status === 200 && data.operation === true){
            return data.data
        }
        return 0
    } catch (error) {
        console.error(error)
        return 0
    }
}

const setItemsInCart = async () => {
    const items = await getTotalItemsInCart()
    if(items > 0) {
        MyCart.classList.remove("d-none")
        MyCart.innerText = items
    }
}

setItemsInCart()