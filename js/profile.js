const imageTag = document.querySelector('label[for="sendImage"]')
const imageInput = document.querySelector("#sendImage")
const imageSpan = document.querySelector("#imageName")

const deleteButton = document.querySelector("#deleteButton")

imageInput.addEventListener("change", () => {
    let imageFile = imageInput.files[0]
    imageSpan.innerText = `Imagem: ${imageFile.name}`
})

deleteButton.addEventListener("click", () => {
    console.log("Deletar publicação")
})

/*** If admin ***/
const passwordToggleInputs = document.querySelectorAll("#showPasswordInput")
passwordToggleInputs.forEach((toggle) => {
    toggle.addEventListener("click", passwordToggle)
})
function passwordToggle() {
    const showHideIcon = this.parentElement
    
    // el < label < option - info > password > input
    const referencePasswordInput = 
        this.parentElement
            .parentElement
            .previousElementSibling
            .querySelector(".info .password > input")

    referencePasswordInput.type = this.checked ? "text" : "password"
    showHideIcon.classList.toggle("close")
}
