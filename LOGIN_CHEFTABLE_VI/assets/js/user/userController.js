import { createUserWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-auth.js";
import { sendPasswordResetEmail } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-auth.js";
import { signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-auth.js";
import { auth } from "../app/firebase.js";
import * as FunApp from "../app/functions.js";

const dashboardURL = "/PROYEC_CHEF-TABLE-VI/admin.html"; // Ruta completa hacia la página de administración

const idInputPasswordRP = "repeatPassword";
const idInputPassword = "password";
const btnPasswordRP = document.getElementById("btn-passwordRP");
const btnPassword = document.getElementById("btn-password");
const objForm = document.getElementById("formUser");
const objFormPasswordRecover = document.getElementById("formPasswordRecover");
const objFormLogin = document.getElementById("formLogin");

if (btnPassword)
  btnPassword.addEventListener("click", (e) => {
    FunApp.viewText(idInputPassword);
  });

if (btnPasswordRP)
  btnPasswordRP.addEventListener("click", (e) => {
    FunApp.viewText(idInputPasswordRP);
  });

if (objForm)
  objForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    let jsonUser = FunApp.sendData(objForm.id);
    if (
      typeof jsonUser.password !== "undefined" &&
      typeof jsonUser.user !== "undefined"
    ) {
      try {
        let pass = jsonUser.password;
        let user = jsonUser.user.toLowerCase();
        const userCredentials = await createUserWithEmailAndPassword(
          auth,
          user,
          pass
        ).then((data) => {
          alert("User Create");
          FunApp.cleanForm(objForm);
        });
      } catch (error) {
        const errorCode = error.code;
        const errorMessage = error.message;
        console.error(errorCode);
        console.error(errorMessage);
        alert("Validate the data entered");
      }
    } else {
      alert("Validate the data entered");
    }
  });

if (objFormPasswordRecover)
  objFormPasswordRecover.addEventListener("submit", async (e) => {
    e.preventDefault();
    let jsonUser = FunApp.sendData(objFormPasswordRecover.id);

    if (typeof jsonUser.user !== "undefined") {
      try {
        let user = jsonUser.user.toLowerCase();
        const userCredentials = await sendPasswordResetEmail(auth, user).then(
          (data) => {
            console.log(data);
            alert("Password reset email sent!");
            FunApp.cleanForm(objFormPasswordRecover);
          }
        );
        console.log(userCredentials);
      } catch (error) {
        const errorCode = error.code;
        const errorMessage = error.message;
        console.error(errorCode);
        console.error(errorMessage);
        alert("Validate the data entered");
      }
    } else {
      alert("Validate the data entered");
    }
  });

objFormLogin.addEventListener("submit", async (e) => {
  e.preventDefault();
  let jsonUser = FunApp.sendData(objFormLogin.id);
  if (
    jsonUser &&
    typeof jsonUser.password !== "undefined" &&
    typeof jsonUser.user !== "undefined"
  ) {
    try {
      let pass = jsonUser.password;
      let user = jsonUser.user.toLowerCase();
      await signInWithEmailAndPassword(auth, user, pass);
      // Redirige al usuario a tu panel de administración después de iniciar sesión correctamente
      window.location.href = dashboardURL; // Redirección a la página de administración con la URL completa
    } catch (error) {
      const errorCode = error.code;
      const errorMessage = error.message;
      console.error(errorCode);
      console.error(errorMessage);
      alert("Error al iniciar sesión. Por favor, verifica tus credenciales.");
    }
  } else {
    alert("Por favor, completa todos los campos.");
  }
});
