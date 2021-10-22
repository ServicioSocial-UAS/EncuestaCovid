import { Toast } from "../components/Toast.js";

const BtnSend = getDocumentElement("btn-send");
// const Form = getDocumentElement("form");
const NumCuenta = getDocumentElement("Id_NumCuenta");
const Nombre = getDocumentElement("Nombre");
const Ape_Pat = getDocumentElement("Ape_Pat");
const Ape_Mat = getDocumentElement("Ape_Mat");
// const Sexo = getDocumentElement("Sexo");
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
const today = new Date().toISOString().split("T")[0];

window.addEventListener("load", () => {
  date.max = today;
  handleCareerStatus(Unidad_Academica.value.includes("Preparatoria"), true);
  handleGroupStatus(false);
  handleChangeAcademicUnitOptions(false);
});

BtnSend.addEventListener("click", (ev) => {
  validarNumCuenta(ev);
  validarNombres(ev);
  validarApe_Pat(ev);
  validarApe_Mat(ev);
  validarEdad(ev);
  validarCarrera(ev);
  validarGrupo(ev);
  validarCorreo(ev);
  validarTel1(ev);
  validarTel2(ev);
  validarColonia(ev);
  validarCalle(ev);
  validarNumero(ev);
});

Unidad_Academica.addEventListener("selected", (ev) => {});

Tipo.addEventListener("change", (ev) => {
  const isPersonal = ev.target.value === "Personal";
  handleCareerStatus(
    Unidad_Academica.value.includes("Preparatoria"),
    !isPersonal
  );
  handleGroupStatus(isPersonal);
  handleChangeAcademicUnitOptions(isPersonal);
});

Unidad_Academica.addEventListener("change", (ev) => {
  const isHighSchool = ev.target.value.includes("Preparatoria");
  handleCareerStatus(isHighSchool, Tipo.value === "Estudiante");
});

function handleCareerStatus(isHighSchool, isStudent) {
  if (!isStudent || (isStudent && isHighSchool)) {
    Carrera.style.display = "none";
    Carrera.value = ".";
    return;
  }

  Carrera.style.display = "initial";
  Carrera.value = "";
}

function handleGroupStatus(isPersonal) {
  if (isPersonal) {
    Grupo.style.display = "none";
    Grupo.value = ".";
    return;
  }

  Grupo.style.display = "initial";
  Grupo.value = "";
}

function handleChangeAcademicUnitOptions(isPersonal) {
  const academicUnitOptions = Unidad_Academica.children;

  for (let i = 0; i < academicUnitOptions.length; i++) {
    const option = academicUnitOptions[i];

    option.style.display =
      !isPersonal && option.value.includes("Personal") ? "none" : "initial";
  }
}

function validarNumCuenta(form) {
  const exp = /^[0-9]+$/;

  if (exp.test(NumCuenta.value)) {
    if (NumCuenta.value.length < 11) {
      resetInput(NumCuenta);
      return;
    }
  }

  form.preventDefault();
  sendInputAlert(NumCuenta, "No. Cuenta inválido: SÓlo nÚmeros.");
}

function validarNombres(form) {
  const exp = /^[a-zA-ZÀ-ÖØ-Þß-öø-ÿ\s]+$/;

  if (exp.test(Nombre.value)) {
    resetInput(Nombre);
    return;
  }

  form.preventDefault();
  sendInputAlert(Nombre, "Nombre inválido: Sólo letras y espacios.");
}

function validarApe_Pat(form) {
  const exp = /^[a-zA-ZÀ-ÖØ-Þß-öø-ÿ\s]+$/;

  if (exp.test(Ape_Pat.value)) {
    resetInput(Ape_Pat);
    return;
  }

  form.preventDefault();
  sendInputAlert(Ape_Pat, "Apellido 1 inválido: Sólo letras y espacios.");
}

function validarApe_Mat(form) {
  const exp = /^[a-zA-ZÀ-ÖØ-Þß-öø-ÿ\s]+$/;

  if (exp.test(Ape_Mat.value)) {
    resetInput(Ape_Mat);
    return;
  }

  form.preventDefault();
  sendInputAlert(Ape_Mat, "Apellido 2 inválida: Sólo letras y espacios.");
}

function validarEdad(form) {
  const exp = /^[0-9]+$/;

  if (exp.test(Edad.value)) {
    if (Edad.value >= 17 && Edad.value < 100) {
      resetInput(Edad);
      return;
    }
  }

  form.preventDefault();
  sendInputAlert(NumCuenta, "Edad inválida: 17-99");
}

function validarCarrera(form) {
  const exp = /^[a-zA-ZÀ-ÖØ-Þß-öø-ÿ\s]+$/;

  if (exp.test(Carrera.value)) {
    resetInput(Carrera);
    return;
  }

  form.preventDefault();
  sendInputAlert(Carrera, "Carrera inválida: Sólo letras y espacios");
}

function validarGrupo(form) {
  const exp = /^[a-zA-ZÀ-ÖØ-Þß-öø-ÿ\s]+$/;

  if (exp.test(Grupo.value)) {
    resetInput(Grupo);
    return;
  }

  form.preventDefault();
  sendInputAlert(Grupo, "Grupo inválido: Sólo letras y espacios");
}

function validarCorreo(form) {
  const exp = /^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/;

  if (exp.test(Correo.value)) {
    resetInput(Correo);
    return;
  }

  form.preventDefault();
  sendInputAlert(Correo, "Correo inválido");
}

function validarTel1(form) {
  const exp = /^[0-9]+$/;

  if (exp.test(Tel1.value)) {
    if (Tel1.value.length < 11) {
      resetInput(Tel1);
      return;
    }
  }

  form.preventDefault();
  sendInputAlert(Tel1, "Celular inválido");
}

function validarTel2(form) {
  const exp = /^[0-9]+$/;

  if (exp.test(Tel2.value)) {
    if (Tel2.value.length < 11) {
      resetInput(Tel2);
      return;
    }
  }

  form.preventDefault();
  sendInputAlert(Tel2, "Teléfono de casa inválido");
}

function validarColonia(form) {
  const exp = /^[a-zA-ZÀ-ÖØ-Þß-öø-ÿ\s0-9]+$/;

  if (exp.test(Colonia.value)) {
    resetInput(Colonia);
    return;
  }

  form.preventDefault();
  sendInputAlert(Colonia, "Colonia inválida: Sólo letras y espacios");
}

function validarCalle(form) {
  const exp = /^[a-zA-ZÀ-ÖØ-Þß-öø-ÿ\s0-9]+$/;

  if (exp.test(Calle.value)) {
    resetInput(Calle);
    return;
  }

  form.preventDefault();
  sendInputAlert(Calle, "Calle inválida: Sólo letras y espacios");
}

function validarNumero(form) {
  const exp = /^[0-9]+$/;

  if (exp.test(Numero.value)) {
    if (Numero.length < 6) {
      resetInput(Numero);
      return;
    }
  }

  form.preventDefault();
  sendInputAlert(Numero, "Número: Sólo números.");
}

function resetInput(element) {
  element.setCustomValidity("");
  element.style.borderColor = "#ced4da";
}

function sendInputAlert(element, message) {
  element.style.borderColor = "red";
  element.focus();
  Toast({ text: message });
}

function getDocumentElement(elementId) {
  return document.getElementById(elementId);
}
