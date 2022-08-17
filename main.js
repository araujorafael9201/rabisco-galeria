const headerContent = document.querySelector('.header-content')
const logoCollapsed = document.querySelector('.logo-collapsed')
const linksDiv = document.querySelector('.links')
  

// Controla Header responsivo
function toggleContent() {
    // headerContent.style.display != 'flex' significa que o header está fechado
    if (headerContent.style.display != 'flex') {
        // Organiza items do header para aparecer
        headerContent.style.display = 'flex'
        headerContent.style.flexDirection = 'column'
    
        linksDiv.style.flexDirection = 'column'
    
        logoCollapsed.style.display = 'none'
    } else {
        // Deixa os items do header invisíveis de novo
        headerContent.style.display = 'none'

        logoCollapsed.style.display = 'block'
    }
}