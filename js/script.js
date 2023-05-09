const body = document.querySelector("body"),
      modeToggle = body.querySelector(".mode-toggle");
      sidebar = body.querySelector("nav");
      sidebarToggle = body.querySelector(".sidebar-toggle");

let getMode = localStorage.getItem("mode");
if(getMode && getMode ==="dark"){
    body.classList.toggle("dark");
}

let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    sidebar.classList.toggle("close");
}

modeToggle.addEventListener("click", () =>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        localStorage.setItem("mode", "dark");
    }else{
        localStorage.setItem("mode", "light");
    }
});
sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    }else{
        localStorage.setItem("status", "open");
    }
})



// var divs = ["Menu1", "Menu2", "Menu3", "Menu4","Menu5"];
// var visibleDivId = null;
// function toggleVisibility(divId) {
//   if(visibleDivId === divId) {
//     //visibleDivId = null;
//   } else {
//     visibleDivId = divId;
//   }
//   hideNonVisibleDivs();
// }
// function hideNonVisibleDivs() {
//   var i, divId, div;
//   for(i = 0; i < divs.length; i++) {
//     divId = divs[i];
//     div = document.getElementById(divId);
//     if(visibleDivId === divId) {
//       div.style.display = "block";
//     } else {
//       div.style.display = "none";
//     }
//   }
// }



const form = document.querySelector("form"),
        nextBtn = form.querySelector(".nextBtn"),
        backBtn = form.querySelector(".backBtn"),
        allInput = form.querySelectorAll(".first input");


nextBtn.addEventListener("click", ()=> {
    allInput.forEach(input => {
        if(input.value != ""){
            form.classList.add('secActive');
        }else{
            form.classList.remove('secActive');
        }
    })
})

backBtn.addEventListener("click", () => form.classList.remove('secActive'));