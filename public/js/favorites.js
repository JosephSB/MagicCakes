
const favProduct = async (idProduct) => {
    const options = {
        method: "GET",
        headers: {
            "Content-Type": "application/json"
        },
    };
    try {
        const res = await fetch(`${URL_WEB}/api/products/favProduct/${idProduct}`, options)
        const data = await res.json()
        if(data.status === 200 && data.operation === true){
            return {
                isFav: data.data,
                operation: true
            }
        }
        return {
            operation: false
        }
    } catch (error) {
        console.error(error)
        return {
            operation: false
        }
    }
}

const listenAllBtnsFav = () => {
    document.querySelectorAll('.card-product-icon').forEach(item => {
        item.addEventListener('click', async () => {
            const idProduct = item.dataset.id;
            const resp = await favProduct(idProduct)
            if(resp.operation) {
                item.className = resp.isFav 
                ? "fa-solid fa-heart card-product-icon active"
                : "fa-regular fa-heart card-product-icon"
            }
        });
    });
}
