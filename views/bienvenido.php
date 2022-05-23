<div class="contenedor">
    <div class="slider-contenedor">
        <section class="contenido-slider">
            <div>
                <h2>Servicios en Soporte Tecnico</h2>
                <a href="#">Contactar </a>
            </div>
            <img src="dist/img/soporte.jpg" alt="">

        </section>
            <section class="contenido-slider">
                <div>
                    <h2>Servicios en arte y diseño</h2>
                    <a href="#">Contactar</a>
                </div>
                <img src="dist/img/art.jpg" alt="">

            </section>
        <section class="contenido-slider">
            <div>
                <h2>Servicios en Transporte</h2>
                <a href="#">Contact us</a>
            </div>
            <img src="dist/img/transporte.jpg" alt="">

        </section>
        <section class="contenido-slider">
            <div>
                <h2>Servicios en Mecanica</h2>
                <a href="#">Contact us</a>
            </div>
            <img src="dist/img/mecanica.jpg" alt="">

        </section>
    </div>
</div>

<script>

let slider = document.querySelector(".slider-contenedor")
let sliderIndividual = document.querySelectorAll(".contenido-slider")
let contador = 1;
let width = sliderIndividual[0].clientWidth;
let intervalo = 3000;

window.addEventListener("resize", function(){
    width = sliderIndividual[0].clientWidth;
})

setInterval(function(){
    slides();
},intervalo);


function slides(){
    slider.style.transform = "translate("+(-width*contador)+"px)";
    slider.style.transition = "transform .8s";
    contador++;

    if(contador == sliderIndividual.length){
        setTimeout(function(){
            slider.style.transform = "translate(0px)";
            slider.style.transition = "transform 0s";
            contador=1;
        },1500)
    }
}

</script>