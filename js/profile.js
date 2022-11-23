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