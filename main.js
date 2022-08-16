const headerContent = document.querySelector('.header-content')
const logoCollapsed = document.querySelector('.logo-collapsed')
const linksDiv = document.querySelector('.links')

function toggleContent() {
    if (headerContent.style.display != 'flex') {
        headerContent.style.display = 'flex'
        headerContent.style.flexDirection = 'column'
    
        linksDiv.style.flexDirection = 'column'
    
        logoCollapsed.style.display = 'none'
    } else {
        headerContent.style.display = 'none'

        logoCollapsed.style.display = 'block'
    }
}