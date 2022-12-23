function passToggle() {
    passwordInput.type = this.checked ? "text" : "password"
}
function removeMessage() {
    messageField.innerText = ""
}

const form = document.querySelector('main form')
const passwordInput = document.querySelector("#password")
const passwordToggle = document.querySelector("#passToggle")
const messageField = document.querySelector('strong')
const urlQuery = window.location.search
const paramsUrl = new URLSearchParams(urlQuery)


messageField.innerText = paramsUrl.get('message')
passwordToggle.addEventListener("click", passToggle)
form.addEventListener('click', removeMessage)