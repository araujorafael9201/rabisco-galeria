// Defining the functions
function showMessage(message) {
    formMessage.textContent = message
    form.addEventListener("input", () => {
        formMessage.textContent = ""
        form.removeEventListener("input")
    })
}


// Defining the elements to use
const inputFields = {
    "firstName": document.querySelector("form input[name='first_name']"),
    "lastName": document.querySelector("form input[name='last_name']"),
    "email": document.querySelector("form input[name='email']"),
    "subject": document.querySelector("form input[name='subject']")
}
const form = document.querySelector("form")
const formMessage = document.querySelector("form #message")

// Setting the RegEx
const emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
const nameRegex = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u

// Setting up the form event listener
form.addEventListener('submit', (e) => {
    // Verifying the fields
    if (!inputFields.firstName.value.match(nameRegex)) {
        showMessage("Preencha o campo de Primeiro Nome!")
        e.preventDefault()
        return
    }
    if (!inputFields.lastName.value.match(nameRegex)) {
        showMessage("Preencha o campo de Último Nome!")
        e.preventDefault()
        return
    }
    if (!inputFields.email.value.match(emailRegex)) {
        showMessage("Preencha o campo de Email corretamente!")
        e.preventDefault()
        return
    }
    if (!inputFields.subject.value) {
        showMessage("Preencha o campo de Assunto!")
        e.preventDefault()
        return
    }

    // If do not trigger anyone, the message is sent via email.
})
