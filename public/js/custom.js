function openMenu()
{
    if (document.getElementById("menu_list").style.visibility == "visible") {
        document.getElementById("menu_list").style.visibility = "hidden";
    }
    else {
        document.getElementById("menu_list").style.visibility = "visible";
    }
}


function OnWindowResized(){
    if(getWidth() > 900){
        document.getElementById("menu_list").style.visibility = "visible";
    }
    else{
        document.getElementById("menu_list").style.visibility = "hidden";
    }
}


function getWidth() {
  return Math.max(
    document.body.scrollWidth,
    document.documentElement.scrollWidth,
    document.body.offsetWidth,
    document.documentElement.offsetWidth,
    document.documentElement.clientWidth
  );
}