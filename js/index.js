const modal = document.querySelector('.modal')
const modalContent = document.querySelector('.modal-content')
const modalCloseButton = document.querySelector('.close-modal')
let posts = document.querySelectorAll('.post')

// Close function for the modal
window.addEventListener('click', e => {
    clickedElement = e.target.classList[0]
    if (["modal", "close-modal"].includes(clickedElement)) {
        closeModal()
    }
})

function closeModal() {
    modal.style.display = "none"
}