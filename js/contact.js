// Defining the functions
function showMessage(message) {
    formMessage.textContent = message
    form.addEventListener("input", () => {
        formMessage.textContent = ""
        form.removeEventListener("input")
    })
}

function alertBox(color, message="") {
    alertBoxElement.style.display = "flex"
    
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
        alertBoxElement.classList.add("show")
    }, 100);
    setTimeout(() => {
        alertBoxElement.classList.remove("show")
    }, 2100);
    setTimeout(() => {
        alertBoxElement.style.display = "none"
    }, 2600)
}


// Defining the elements to use
const inputFields = {
    "firstName": document.querySelector("form input[name='first_name']"),
    "lastName": document.querySelector("form input[name='last_name']"),
    "email": document.querySelector("form input[name='email']"),
    "subject": document.querySelector("form input[name='subject']"),
    "message": document.querySelector("form textarea[name='text_message']")
}
const form = document.querySelector("form")
const formMessage = document.querySelector("form #message")
const alertBoxElement = document.querySelector(".alert-box")

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

    
    e.preventDefault()
    let formData = {
        "first_name": inputFields.firstName.value,
        "last_name": inputFields.lastName.value,
        "email": inputFields.email.value,
        "subject": inputFields.subject.value,
        "message": inputFields.message.value ?? ""
    }

    fetch("./php/contact-email.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify( formData ) 
    }).then((res) => {
        let message = res.json()
        alertBox(message["id"], message["message"])
    })
})
