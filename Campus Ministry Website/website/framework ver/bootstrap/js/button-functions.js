document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("registerForm");

    form.addEventListener("submit", function (event) {
        event.preventDefault();

       
        const formData = new FormData(form);

        
        fetch("php/register-staff.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                form.reset();
                //direct to stafflist
                window.location.href = "staff-list.php";
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("An error occurred. Please try again.");
        });
    });
});
