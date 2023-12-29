/*
function main(){

}

function openModal(info){
    let modal = document.getElementById("modal");
    modal.style.display = "flex";

    let modalContent = document.getElementById("modal-content")

    modalContent.innerHTML = '<div id="close" onclick="closeModal()">&times;</div>'
    

    var divStyleHoraire = document.createElement('div');
    divStyleHoraire.id = 'styleHoraire';
    
    for(var i=0; i<info.length/14; i++){
        
        divStyleHoraire.innerHTML += info[i*14].date + " : ";

        for(j=0; j<14; j++){
            var divStyleHeure = document.createElement('span');
            divStyleHeure.id = "spanHeure";

            divStyleHeure.innerHTML += info[j].horaire + " ";


            divStyleHeure.onclick = function() {
                console.log("TEST");
            };

            console.log(divStyleHeure.onclick)


            divStyleHoraire.appendChild(divStyleHeure);
        }
        
        divStyleHoraire.innerHTML += '<br>';
    }
    
    divStyleHoraire.innerHTML += '</div>';
    modalContent.appendChild(divStyleHoraire);

}

function selectedHour(element){
    element.style.color = "red"; 
    console.log("fonctionne");
}

function closeModal(){
    let modal = document.getElementById("modal");
    modal.style.display = "none";
}

window.onload = () => {
    main();
}
*/