document.addEventListener('DOMContentLoaded', function(){
    
    eventListeners();
    darkMode();
});

function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);

    //muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto));



}

function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar');
      
}

function darkMode(){
    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    });
}

function mostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector('#contacto');

    if(e.target.value === 'telefono'){
        contactoDiv.inner = `
        <label for="telefono">Numero Telefono:</label> 
        <input type="tel" name="contacto[telefono]" placeholder="Tu Telefono" id="telefono"></input>    
        <p>Elija la fecha y la hora para ser contactado</p> 
        <label for="fecha">Fecha:</label> 
        <input type="date" id="fecha" name="contacto[fecha]">
        <label for="hora">Hora:</label> 
        <input type="time" id="hora" min="09:00" max="19:00" name="contacto[hora]">
        `;
    }else{
        contactoDiv.textContent = `
        <label for="email">E-mail:</label> 
        <input required type="email" name="contacto[email]" placeholder="Tu Email" id="email">
       
        `;
    }
}