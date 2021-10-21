
if (sessionStorage.getItem('AuthToken')){

}else{
    location.href = "../EncuestaCovid/login.php"
}

function logout(){
    sessionStorage.removeItem('AuthToken');
    location.href = "../EncuestaCovid/login.php"
}