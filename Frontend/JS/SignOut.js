const signOut = document.querySelector(".body-part nav .side-top .sign-out");

signOut.onclick = ()=>{
    location.href = "../../Baeckend/Logout.php?logout_id=admin";
}
