const BtnSend = getDocumentElement("btn-send");
const Form = getDocumentElement("form");
const NumCuenta = getDocumentElement("Id_NumCuenta");
const Nombre = getDocumentElement("Nombre");
const Ape_Pat = getDocumentElement("Ape_Pat");
const Ape_Mat = getDocumentElement("Ape_Mat");
const Sexo = getDocumentElement("Sexo");
const Edad = getDocumentElement("Edad");
const Tipo = getDocumentElement("Tipo");
const Unidad_Academica = getDocumentElement("Unidad_Academica");
const Carrera = getDocumentElement("Carrera");
const Grupo = getDocumentElement("Grupo");
const Correo = getDocumentElement("Correo");
const Tel1 = getDocumentElement("Tel1");
const Tel2 = getDocumentElement("Tel2");
const Colonia = getDocumentElement("Colonia");
const Calle = getDocumentElement("Calle");
const Numero = getDocumentElement("Numero");
const date = getDocumentElement("date");


window.addEventListener("load", () => {
    handleCareerStatus(Unidad_Academica.value.includes("Preparatoria"), true);
    handleGroupStatus(false)
    handleChangeAcademicUnitOptions(false);
})

BtnSend.addEventListener("click", (ev) => {  
    console.log(Unidad_Academica.value)
    validarNumCuenta();
    validarNombres();
    validarApe_Pat();
    validarApe_Mat();
    validarEdad();
    validarCarrera();
    
})

Tipo.addEventListener("change", (ev) => {
    const isPersonal = ev.target.value === "Personal"
    handleCareerStatus(Unidad_Academica.value.includes("Preparatoria"), !isPersonal)
    handleGroupStatus(isPersonal)
    handleChangeAcademicUnitOptions(isPersonal)
    
})

Unidad_Academica.addEventListener("change", (ev) => {
    const isHighSchool = ev.target.value.includes("Preparatoria")
    handleCareerStatus(isHighSchool, Tipo.value === "Estudiante")    
})

function handleCareerStatus(isHighSchool, isStudent){
    if(!isStudent || (isStudent && isHighSchool)){
        Carrera.style.display = "none";
        Carrera.value = "."
        return
    }
        
    Carrera.style.display = "initial";
    Carrera.value = ""
}

function handleGroupStatus(isPersonal){
    if(isPersonal){
        Grupo.style.display = "none";
        Grupo.value = "."
        return
    }
        
    Grupo.style.display = "initial";
    Grupo.value = ""
}


function handleChangeAcademicUnitOptions(isPersonal){

    const academicUnitOptions = Unidad_Academica.children;

    for (let i=0; i < academicUnitOptions.length; i++){
        const option = academicUnitOptions[i];

        option.style.display = !isPersonal && option.value.includes("Personal") ? "none" : "initial";
    }
}

function validarNumCuenta(){ //Validar input Número de cuenta
    const exp = /^[0-9]+$/;

    if (exp.test(NumCuenta.value)) {
        if (NumCuenta.value.length < 11) {
            resetInput(NumCuenta);
            return
        }
    }
    
    sendInputAlert(NumCuenta, "Solo numeros.");
}

function validarNombres(){ //Validar input Nombre
    const exp = /^[a-zA-ZÀ-ÖØ-Þß-öø-ÿ\s]+$/;

    if (exp.test(Nombre.value)) {
        resetInput(Nombre);
        return
    }

    sendInputAlert(Nombre, "Solo letras y espacios.");
}

function validarApe_Pat(){ //Validar input Apellido paterno
    const exp = /^[a-zA-ZÀ-ÖØ-Þß-öø-ÿ\s]+$/;

    if (exp.test(Ape_Pat.value)) {
        resetInput(Ape_Pat);
        return
    }

    sendInputAlert(Ape_Pat, "Solo letras y espacios.");
}

function validarApe_Mat(){ //Validar input Apellido Materno
    const exp = /^[a-zA-ZÀ-ÖØ-Þß-öø-ÿ\s]+$/;

    if (exp.test(validarApe_Mat.value)) {
        resetInput(validarApe_Mat);
        return
    }

    sendInputAlert(validarApe_Mat, "Solo letras y espacios.");
}

function validarEdad(){ //Validar input Edad
    const exp = /^[0-9]+$/;
    
    if (exp.test(Edad.value)) {
        if (Edad.value >=17 && Edad.value < 100) {
            resetInput(Edad);
            return
        }
    }

    sendInputAlert(NumCuenta, "Debe ser mayor a 16 y menos a 100");
}

function validarCarrera(){ //Validar input Carrera
    const exp = /^[a-zA-ZÀ-ÖØ-Þß-öø-ÿ\s]+$/;
    
    if (exp.test(Carrera.value)) {
        resetInput(Carrera);
        return
    }

    sendInputAlert(NumCuenta, "Solo letras y espacios.");
}

function validarCorreo(){ //Validar input Correo
    const exp = /^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/;

    if (exp.test(Correo.value)) {
        resetInput(Correo);
        return
    }

    sendInputAlert(Correo, "Digite su correo.");

}

function validarTel1(){ //Validar input Telefono1
    const exp = /^[0-9]+$/;

    if (exp.test(Tel1.value)) {
        if(Tel1.value.length<11){
            resetInput(Tel1);
            return
        }
    }

    sendInputAlert(Tel1, "Escriba correctamente su número.");
}


function validarTel2(){ //Validar input Telefono1
    const exp = /^[0-9]+$/;

    if (exp.test(Tel2.value)) {
        if(Tel2.value.length<11){
            resetInput(Tel2);
            return
        }
    }

    sendInputAlert(Tel2, "Escriba correctamente su número.");
}


function resetInput(element) {
    element.setCustomValidity("");
    element.style.borderColor = "#ced4da";  
}

function sendInputAlert(element, message) {
    
    element.style.borderColor = "red";
    element.focus();
    element.setCustomValidity(message);    
}


function getDocumentElement(elementId) {
    return document.getElementById(elementId)
}