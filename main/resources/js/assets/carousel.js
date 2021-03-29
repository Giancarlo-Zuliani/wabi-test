let modals = document.getElementsByClassName('modal');
let prjBox = document.getElementsByClassName('prj-box');
let closecarousel = document.getElementsByClassName('close');

//CAROUSEL EVENT'S LISTENERS
for (let i = 0; i < modals.length; i++) {
    prjBox[i].addEventListener('click', function() {
        modals[i].style.display = "block";
        document.getElementsByTagName('body')[0].style.overflow = "hidden"
    })

    closecarousel[i].addEventListener('click', function() {
        modals[i].style.display = "none";
        document.getElementsByTagName('body')[0].style.overflow = "auto"
    })
}