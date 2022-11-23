const imageTag = document.querySelector('label[for="sendImage"]')
const imageInput = document.querySelector("#sendImage")
const imageSpan = document.querySelector("#imageName")

imageInput.addEventListener("change", () => {
    let imageFile = imageInput.files[0]
    imageSpan.innerText = `Imagem: ${imageFile.name}`
})