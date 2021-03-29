let pictureForms = document.getElementsByClassName('hidden-picture-form');
let addButtons = document.getElementsByClassName('fa-plus-square');

for (let i = 0; i < addButtons.length; i++) {
    addButtons[i].addEventListener('click', function() {
        pictureForms[i].style.display === "block" ?
            pictureForms[i].style.display = "none" :
            pictureForms[i].style.display = "block";
    })
}