const ContainerDeliverys = document.getElementById("list-deliverys");

const GetListDeliverys = async (data) => {
    const options = {
        method: "POST",
        body: data ? JSON.stringify(data) : JSON.stringify({}),
        headers: {
            "Content-Type": "application/json",
            "Authorization": "6841-190109-84c1989b-be57-4f7a-6173-55ee20d4aa48"
        },
        mode: "cors"
    };
    try {
        const res = await fetch(`https://courier-api.pedidosya.com/v3/shippings/estimates`, options) /*NO ENTIENOD*/
        const resp = await res.json()

        if (resp.status === 200) {
            return resp.data.deliveryOffers
        }
        return []
    } catch (error) {
        console.error(error)
        return []
    }
}

const CardDelivery = (price, mode, id) => {
    return `
        <div class="delivery-option" data-id="${id}">
            <div><i class="fa-solid fa-truck fa-2x"></i></div>
            <div>
                <p class="text-option"><strong>${formatoMonedaSoles(price)}</strong></p>
                <p class="text-option">MODO: ${mode}</p>
                <p class="text-option">ESPERA: 5 MIN</p>
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

const DrawList = async () => {
    ContainerDeliverys.innerHTML = ""

    const data = await GetListDeliverys({
        "referenceId": "6841-190109-84c1989b-be57-4f7a-6173-55ee20d4aa48",
        "isTest": false,
        "notificationMail": "356947-9tjvg@courierapi.com",
        "items": [
            {
                "type": "STANDARD",
                "value": 68.6,
                "description": "cake.",
                "quantity": 1,
                "volume": 10.01,
                "weight": 4.00
            }
        ],
        "waypoints": [
            {
                "type": "PICK_UP",
                "addressStreet": "A, Villa EL Salvador 15842",
                "addressAdditional": "esperar afuera",
                "city": "San juan de miraflores",
                "latitude": -12.1736139,
                "longitude": -76.9807175,
                "phone": "+51963032870",
                "name": "Joseph Silva",
                "instructions": "esperar afuera de la u."
            },
            {
                "type": "DROP_OFF",
                "addressStreet": ContainerDeliverys.dataset.addressStreet || "",
                "addressAdditional": ContainerDeliverys.dataset.aditionalAdress || "",
                "city": ContainerDeliverys.dataset.city || "",
                "latitude": parseFloat(ContainerDeliverys.dataset.x || 0),
                "longitude": parseFloat(ContainerDeliverys.dataset.y || 0),
                "phone": ContainerDeliverys.dataset.phone || "",
                "name": ContainerDeliverys.dataset.client || "",
                "instructions": "Entregar en mano",
                "collectMoney": 0
            }
        ]
    })
    if (data.length === 0) ContainerDeliverys.innerHTML += `<p class="title-noproducts">Sin deliverys disponibles</p>`
    data.map((item) => ContainerDeliverys.innerHTML += CardDelivery(item.pricing.total, item.deliveryMode, item.deliveryOfferId))

}

DrawList()