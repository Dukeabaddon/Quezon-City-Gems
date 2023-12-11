var x = document.getElementById("login1");
var y = document.getElementById("signup1");

function left() {
    login1.style.left = "0px";
    signup1.style.left = "0px";
}
function right() {
    login1.style.left = "-700px";
    signup1.style.left = "-650px";
}

// loading animations
const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)
        if (entry.isIntersecting) {
             entry.target.classList.add(show);
        }
    });
});

const hiddenElements = document.getElementById(hidden);
const hiddenElement = hiddenElements ? [hiddenElement] : document.querySelectorAll('.hidden');
hiddenElements.forEach((el) => observer.observe(el));
