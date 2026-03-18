/**
 * DolSaaS Theme - Title Mover Script
 * Moves the page title into the top navigation bar (Vendus style)
 * and colors the active FontAwesome menu icon.
 */
document.addEventListener('DOMContentLoaded', function() {

    // === 1. Move page title to topbar ===
    var titleTable = document.querySelector('table.table-fiche-title');
    var topbar = document.getElementById('id-top');
    
    if (titleTable && topbar) {
        // Extract the title text
        var titreDiv = titleTable.querySelector('.titre');
        if (titreDiv) {
            var titleText = titreDiv.textContent.trim();
            
            // Create a clean title element
            var titleEl = document.createElement('div');
            titleEl.id = 'dolisaas-topbar-title';
            titleEl.textContent = titleText;
            titleEl.style.cssText = 'position:fixed;top:14px;left:340px;z-index:999999;' +
                'font-size:1.25rem;font-weight:600;color:#0f172a;' +
                'white-space:nowrap;overflow:hidden;text-overflow:ellipsis;' +
                'max-width:50vw;pointer-events:none;';
            
            // Append to body (not inside any transformed parent)
            document.body.appendChild(titleEl);
            
            // Hide the original title table
            titleTable.style.display = 'none';
        }
    }

    // === 2. Color the active menu icon (FontAwesome) ===
    var activeLinks = document.querySelectorAll('a.tmenusel');
    activeLinks.forEach(function(link) {
        // Color FA icons
        var icons = link.querySelectorAll('.fas, .far, .fa, [class*="fa-"]');
        icons.forEach(function(icon) {
            icon.style.color = '#6366f1'; // Indigo 500
            icon.style.textShadow = 'none';
        });
        // Clean background
        link.style.background = 'transparent';
        link.style.boxShadow = 'none';
    });

});
