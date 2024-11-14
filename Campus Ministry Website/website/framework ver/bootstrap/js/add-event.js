document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");

    form.addEventListener("submit", function(event) {
        event.preventDefault();

        // Pop up
        const userConfirmed = confirm("Are you sure you want to add this event?");

        if (userConfirmed) {
            form.submit();  // This will submit the form to add-event.php
        }
        
    });
});
