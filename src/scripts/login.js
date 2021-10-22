import { Auth } from "./auth.js";

window.addEventListener("load", () => {
  if (Auth.getToken()) {
    location.href = "./staff.php";
  }
});
