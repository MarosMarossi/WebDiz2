
let mybutton = document.getElementById("back_top_btn");
window.onscroll = function() {scrollFunction()};

var navClass = document.getElementsByClassName("nav-link");
var path = window.location.href;
for (i = 0; i < navClass.length; i++) {
    if (path.includes(navClass[i].href)) {
        navClass[i].classList.add("active");
        vysledok = true;
    } 
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  };
function top_Function() {
    window.scrollTo({top: 0, behavior: 'smooth'});
};

const closeForm = document.getElementById("closeForm");
const addnewButton = document.getElementById("addnewButton");
const createForm = document.getElementById("createForm");
const uploadButton = document.getElementById("uploadButton");
const uploadForm = document.getElementById("uploadForm");
const closeUForm = document.getElementById("closeUForm");

addnewButton.addEventListener("click", function(){
    createForm.style.display="block";
});

closeForm.addEventListener("click", function(){
    createForm.style.display="none";
});

uploadButton.addEventListener("click", function(){
    uploadForm.style.display="block";
});
closeUForm.addEventListener("click", function(){
    uploadForm.style.display="none";
});

/*
	var clsfrm = "";
	function fCloseForm(){
		var clsfrm = document.getElementsByClassName("modal-container");
		clsfrm.style.display="none";
	};*/
 

//register form
/*
const signUpButton = document.getElementById("signUpButton");
const signInButton = document.getElementById("signInButton");
const signUpForm = document.getElementById("signUpForm");
const signInForm = document.getElementById("signInForm");

signUpButton.addEventListener("click", function(){
    signInForm.style.display="none";
    signUpForm.style.display="block";
})

signInButton.addEventListener("click",function(){
    signInForm.style.display="block";
    signUpForm.style.display="none";
})

*/
//create form
/*
const closeForm = document.getElementById("closeForm");
const addnewButton = document.getElementById("addnewButton");
const createForm = document.getElementById("createForm");

addnewButton.addEventListener("click", function(){
    createForm.style.display="block";
})

closeForm.addEventListener("click", function(){
    createForm.style.display="none";
})


//skusal som
addnewButton.addEventListener("click", addnewButton_Fun)
closeForm.addEventListener("click", closeForm_Fun)

signInButton.addEventListener("click", signInButton_Fun)
signUpButton.addEventListener("click", signUpButton_Fun)

function addnewButton_Fun(){
    createForm.style.display="block";
}

function closeForm_Fun(){
    createForm.style.display="none";
}

function signUpButton_Fun(){
    signInForm.style.display="none";
    signUpForm.style.display="block";
}

function signInButton_Fun(){
    signInForm.style.display="block";
    signUpForm.style.display="none";
}
*/