document.addEventListener("DOMContentLoaded", function () {
    const registerForm = document.getElementById("registerForm");
    const createAccBtn = document.getElementById("createAccBtn");
    
    createAccBtn.addEventListener("click", function (event) {
       
        event.preventDefault();

      //popup
        const confirmation = confirm("Are you sure to create this account?");
        
        if (confirmation) {
            //If user confirms, submit form data via AJAX or standard form submission
            registerForm.submit();
            // direct to staff list.php
            window.location.href = "staff-list.php";
        }
        // If the user presses no, the form submission is canceled and nothing happens
    });
});
