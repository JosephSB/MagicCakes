function showAlert(mensaje, icono, color) {
    const alerta = document.createElement('div');
    alerta.classList.add('alerta');
    alerta.style.backgroundColor = color;
    alerta.style.opacity = '0';
    alerta.style.transform = 'translateY(-50px)';
  
    const iconoElemento = document.createElement('i');
    icono.split(' ').forEach(clase => iconoElemento.classList.add(clase.trim()));
    alerta.appendChild(iconoElemento);

    const espacio = document.createElement('span');
    espacio.innerHTML = '&nbsp;';
    alerta.appendChild(espacio);
  
    const mensajeElemento = document.createElement('span');
    mensajeElemento.textContent = mensaje;
    alerta.appendChild(mensajeElemento);
  
    document.body.appendChild(alerta);
  
    setTimeout(() => {
      alerta.style.opacity = '1';
      alerta.style.transform = 'translateY(0)';
    }, 10);
  
    setTimeout(() => {
      alerta.style.opacity = '0';
      alerta.style.transform = 'translateY(-50px)';
      setTimeout(() => {
        alerta.remove();
      }, 500);
    }, 5000);
  }