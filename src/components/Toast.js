/* 
    You have to import Toastify CDN in your html to can use Toast component 

    Styles - <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    JS - <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
*/
export function Toast({ text, duration = 5000 }) {
  return Toastify({
    text,
    duration,
    close: true,
    gravity: "top",
    position: "right",
    stopOnFocus: true,
    style: {
      width: "fit-content",
      display: "flex",
      gap: "16px",
      marginTop: "180px",
      background: "linear-gradient(to right, rgba(0, 0, 0, 0.95), #374a57)",
    },
    onClick: function () {},
  }).showToast();
}
