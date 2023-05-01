const slider = document.getElementById("imagesSlider")
const sliderContainer = document.getElementById("ContainerImagesSlider")
const sliderNav = document.getElementById("itemsSlider")
const sliderBtnPrev = document.getElementById("boxPrevSlider")
const sliderBtnNext = document.getElementById("boxNextSlider")
let navIcons = []

const images_slider = [
    "https://smashinglogo.com/v3/envision/image.jpg?id=7606339b-4914-4d80-8cc6-38d09755a721&format=desktop",
    "https://smashinglogo.com/v3/envision/image.jpg?id=cad4c843-348a-4c62-93ab-a6f992691305&format=desktop",
    "https://smashinglogo.com/v3/envision/image.jpg?id=73e51079-6036-4070-98f7-c1e5a2960d64&format=desktop",
    "https://smashinglogo.com/v3/envision/image.jpg?id=4337a897-4e74-4868-a066-7315976f9c94&format=desktop",
    "https://smashinglogo.com/v3/envision/image.jpg?id=6de7eb6e-faeb-4a4e-adb8-820f8f2c6b70&format=desktop",
    "https://smashinglogo.com/v3/envision/image.jpg?id=88bfa8f6-ceac-4fe3-94c7-a09f0aa2c3e7&format=desktop",
];

slider.style.width = images_slider.length * 100 + "%";
let active = true;
let cont = 0
const secondsXslide = 4000;

const drawImagesInSlider = () => {
    images_slider.forEach( (src, index) => {
        slider.innerHTML += `<img src="${src}" class="slider_img" style="width: 100%;">`; 
    
        sliderNav.innerHTML += `<span class="${index==0 ?'slider-nav slider-nav-active': 'slider-nav'}" id ="slider-nav-${index}">`;
    } )
    navIcons = [...document.getElementsByClassName("slider-nav")]
}

function setActive(id){
	navIcons.map(
        idValue => idValue.attributes.id.nodeValue.slice(-1) == id 
        ? idValue.classList.add("slider-nav-active")
        : idValue.classList.remove("slider-nav-active")
	)
}

function counter(){
	if (active){
		cont++
		if(cont >= images_slider.length) cont=0;
		setInterval(slideImage(cont), secondsXslide);
		setInterval(setActive(cont), secondsXslide)
	}
}

function slideImage(id){
	if (!active) {
		cont= id;
		setActive(id);
	}
	slider.style.left = "-"+id+"00%";
}

drawImagesInSlider()
const startInterval = () => setInterval(counter, secondsXslide);
startInterval();

sliderContainer.addEventListener("mouseover", () => {
	if(active) active = false;
})

sliderContainer.addEventListener("mouseout", () => {
	if(!active) active = true;
})

sliderNav.addEventListener("click", (e) => {
    cont=e.target.id.slice(-1);
    slideImage(e.target.id.slice(-1))
    setActive(e.target.id.slice(-1))
})

sliderBtnPrev.addEventListener("click", () =>{
    if(cont === 0) return
    let tempCont = cont - 1;
    slideImage(tempCont)
    setActive(tempCont)
    cont = tempCont;
})

sliderBtnNext.addEventListener("click", () =>{
    if(cont === (images_slider.length -1)) return
    let tempCont = cont + 1;
    slideImage(tempCont)
    setActive(tempCont)
    cont = tempCont;
})

slider.style.maxHeight = "500px";