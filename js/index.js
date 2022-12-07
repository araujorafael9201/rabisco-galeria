// Just to close the modal
function closeModal() {
    modal.style.display = "none"
}

// Getting all the info about the selected post and display the modal
function changeModal() {
    // Getting every information about the post
    let title = this.querySelector('.info .title').textContent
    let date = this.querySelector('.info .date').textContent
    let author = this.querySelector('.info .author').textContent
    let description = this.querySelector('.info .description').textContent
    let img = this.querySelector('img').src

    // Verifying if has no empty
    title = !title ? "vazio" : title
    date = !date ? "vazio" : date
    author = !author ? "vazio" : author
    // description = !description ? "vazio" : description
    img = !img ? "vazio" : img


    // Changing in the modal info include the image link
    let modalImg = modal.querySelector('.img-container img')
    let infoTab = modal.querySelector('.info')
    infoTab.querySelector('.title').textContent = title
    infoTab.querySelector('.date').textContent = date
    infoTab.querySelector('.author').textContent = author
    infoTab.querySelector('.description').textContent = description
    modalImg.src = img

    // Displaying the modal
    modal.style.display = "block"
}

let pageOn = 0;
let stop = false;
async function loadPosts() {
    try {
        let response = await fetch('./php/get-publi.php', {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({"page": pageOn})
        }).then((data) => data.text())
        
        if (!response) {
            stop = true
            return
        }

        let htmlResponse = new DOMParser().parseFromString(response, 'text/html')
        for (const post of htmlResponse.querySelectorAll('.post')) {
            post.addEventListener('click', changeModal)
            postContainer.append(post)
        }

        pageOn++
    } catch {}
}

// Getting all the elements to be used
const modal = document.querySelector('.modal')
const modalContent = document.querySelector('.modal-content')
const modalCloseButton = document.querySelector('.close-modal')
const postContainer = document.querySelector('.gallery-grid')
let posts = document.querySelectorAll('.post')

// Close function for the modal
window.addEventListener('click', e => {
    clickedElement = e.target.classList[0]
    if (["modal", "close-modal"].includes(clickedElement)) {
        closeModal()
    }
})

window.addEventListener('scroll', () => {
    if (!(window.scrollY + window.innerHeight >= document.documentElement.scrollHeight)) return
    if (stop) return

    loadPosts()
})

// Getting every post to have the modal function
posts.forEach((post) => { post.addEventListener('click', changeModal) })