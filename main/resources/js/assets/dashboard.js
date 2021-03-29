let pictureForms = document.getElementsByClassName('hidden-picture-form');
let addButtons = document.getElementsByClassName('fa-plus-square');

for (let i = 0; i < addButtons.length; i++) {
    addButtons[i].addEventListener('click', function() {
        pictureForms[i].style.display === "block" ?
            pictureForms[i].style.display = "none" :
            pictureForms[i].style.display = "block";
    })
}

let deleteProjectsButtons = document.getElementsByClassName('dashboard-delete-button');
let deleteModals = document.getElementsByClassName('dashboard-delete-project-modal');
let closeModal = document.getElementsByClassName('dashboard-close-modal-button');

for (let i = 0; i < deleteProjectsButtons.length; i++) {
    deleteProjectsButtons[i].addEventListener('click', function() {
        deleteModals[i].style.display = "block";
    })
    closeModal[i].addEventListener('click', function() {
        deleteModals[i].style.display = "none";
    })
}