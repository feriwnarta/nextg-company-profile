

document.addEventListener('DOMContentLoaded', function() {
    let buttonScrollTop = document.getElementById("btn-back-to-top");

    if(isMobile()) {
        buttonScrollTop.innerHTML = '<i class="arrow-up"></i>';
    }

});

function isMobile() {
    const viewportWidth = window.innerWidth || document.documentElement.clientWidth;
    const mobileWidth = 767;
    return viewportWidth < mobileWidth;
}



//Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}