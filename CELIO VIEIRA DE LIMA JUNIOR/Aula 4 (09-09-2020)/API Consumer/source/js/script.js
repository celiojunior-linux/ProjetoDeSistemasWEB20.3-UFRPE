/*
    OBS: Decidi utilizar a função fetch ao invés da XMLHttpResponse, pois estava dando
    erros de permissão. A funcionalidade é essencialmente a mesma.
*/
var link =  "https://api.arcsecond.io/exoplanets/";

function load_data(search=false, url = link){
    fetch(url, { method:"GET"})
    .then(res => res.json())
    .then(data => {
        $("#planet-list").empty();
       for(let i =0; i < data["results"].length - 1; i ++){
            element = data["results"][i];
            if (search && $("#search").val()){
                if(!element.name.toUpperCase().includes($("#search").val().toUpperCase())){
                    continue;
                }
            }
        let child = `\
        <div class='planet-stats'>
            <span>
                <hr>
                <div class='inline'>
                    <h1 class='topic-title'>Nome</h1>
                    <p>${element.name}</p>
                </div>
                <hr>
                <div class='container'>
                    <h1 class='topic-title'>Coordenadas</h1>
                    <span class='inline'>
                        <p>Sistema</p>
                        <p>${element.coordinates.system}</p>
                    </span>
                    <span class='inline'>
                        <p>Ascenção R.</p>
                        <p>${element.coordinates.right_ascension? element.coordinates.right_ascension + " " + element.coordinates.right_ascension_units : "desconhecida"}</p>
                        </span>
                    <span class='inline'>
                        <p>Declinação</p>
                        <p>${element.coordinates.declination? element.coordinates.declination + " " + element.coordinates.declination_units : "desconhecida"}</p>
                    </span>
                    <span class='inline'>
                    </span> 
                </div>
                <hr>
                <div class='inline'>
                    <h1 class='topic-title'>Massa</h1>
                    <p>${element.mass && element.mass.value? element.mass.value + " " + element.mass.unit: "desconhecida"}</p>
                </div>
                <hr>
                <div class='inline'>
                    <h1 class='topic-title'>Gravidade</h1>
                    <p>${element.surface_gravity && element.surface_gravity.value? element.surface_gravity.value + " " + element.surface_gravity.unit: "desconhecida"}</p>
                </div>
                <hr>
            </span>
                <img class='planet-face' src='./assets/img/planet.png'>
            <span>

            </span>
        </div>`
        $("#planet-list").append(child);
       }
       if ($("#planet-list").is(":empty")){
           $("#planet-list").append("<h1 class='not-found'> Nenhum resultado encontrado! </h1>")
       }
    })
}

load_data();