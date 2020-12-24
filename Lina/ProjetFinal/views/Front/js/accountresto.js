function verif ()
{
    var errors="<ul>";
  var resto = document.querySelector("#resto").value;
  var psw= document.querySelector("#psw").value;
  var psw-repeat = document.querySelector("#psw-repeat").value;
  var num = document.querySelector("#num").value;
  
if (resto.charAt(0) < "A" || resto.charAt(0) > "Z") {
    errors += "<li>Le nom doit commencer par une lettre Majuscule </li>";
  }
  if (psw !== psw-repeat || psw === "" || psw-repeat === "") {
    errors += "<li> Veuillez vérifier le mot de passe saisi </li>";
    document.querySelector("#psw").value = "";
    document.querySelector("#psw-repeat").value = "";
    document.querySelector("#psw").focus();
  }
  if (num.substring(0, 1) != "7" || num.length != 8) {
    errors += "<li>Numéro de téléphone erroné </li>";
  }
  if (errors !== "<ul>") {
    document.querySelector("#erreur").style.color = "red";
    errors += "</ul>";
    document.getElementById("erreur").innerHTML = errors;
    return false;
  } else {
    var msg = "Bienvenue " + nom + " " + prenom + ".\n Vos préférences: " + p;
    alert(msg);
  } }