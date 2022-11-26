function verifyPassword() {
    if (
        passwordInput.value === passwordInputConfirm.value ||
        passwordInput.value == "" ||
        passwordInputConfirm.value == ""
    ) {
        messageForm.innerText = ""
    } else {
        messageForm.innerText = "As senhas não são iguais!"
        return true
    }
}

function alertBox(color, message="") {
    alertBoxElement.classList.add("show")

    if (color === 1) {
        alertBoxElement.classList.remove("red")
        alertBoxElement.classList.add("green")
    }
    if (color === 2) {
        alertBoxElement.classList.remove("green")
        alertBoxElement.classList.add("red")
    }
    alertBoxElement.innerText = message

    setTimeout(() => {
        alertBoxElement.classList.remove("show")
    }, 2000);
}

const form = document.querySelector("form")
const nameInput = form.querySelector("input[name='name']")
const emailInput = form.querySelector("input[name='email']")
const passwordInput = form.querySelector("input[name='password']")
const passwordInputConfirm = form.querySelector("input[name='passwordConfirm']")
const messageForm = form.querySelector("span")
const alertBoxElement = document.querySelector(".alert-box")

form.addEventListener("change", verifyPassword)
form.addEventListener("submit", (e) => {
    e.preventDefault();
    // if (verifyPassword()) return


    // let formData = {
    //     name: nameInput.value,
    //     email: emailInput.value,
    //     password: passwordInput.value
    // }

    // fetch("./php/registerUser.php", {
    //     method: "POST",
    //     headers: {
    //         'Accept': 'application/json',
    //         'Content-Type': 'application/json'
    //     },
    //     body: JSON.stringify( formData )
    // }).then(res => {
    //     console.log(res)
    // })
})
