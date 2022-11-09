const inputFields = {
    "firstName": document.querySelector("form input[name='first_name']")
}

const submitButton = document.querySelector("form input[type='submit']")
const form = document.querySelector("form")

form.addEventListener('submit', (e) => {
    e.preventDefault()
})

submitButton.addEventListener('click', () => { console.log(inputFields.firstName.value) })
