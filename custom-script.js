// File: js/custom-script.js
jQuery(document).ready(function($) {
    console.log('Custom script is loaded and document is ready.');

    // Function to add custom icon
    function addCustomIcon() {
        console.log('Adding custom icon.');
        var customIcon = '<i class="fas fa-home" title="New Icon"></i>'; // Assuming you're using Font Awesome for icons
        $('.e-view.elementor-add-new-section').prepend(customIcon);
    }

    // Call the function when the document is ready
    addCustomIcon();
});
