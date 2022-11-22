function passToggle() {
    passwordInput.type = this.checked ? "text" : "password"
}

const passwordInput = document.querySelector("#password")
const passwordToggle = document.querySelector("#passToggle")

passwordToggle.addEventListener("click", passToggle)