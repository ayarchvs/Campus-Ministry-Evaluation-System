$(document).ready(function() {
    console.log("Update Delete Staff JS file loaded");



        // Add click Staff listener to each "Delete" btn
        $('.staff-delete-btn').on('click', function() {
            const staffId = $(this).data('id');  // Get the data-id of le clicked button
            console.log("Clicked delete Btn: ", staffId);
        
            // Show confirmation dialog to person
            const isConfirmed = confirm("Are you sure you want to delete this Staff?");

            // If (Yes)
            if (isConfirmed) {
                // Send AJAX req to delete Staff from database
                $.ajax({
                    url: 'php/delete-staff.php',   // PHP script that deletes the Staff
                    type: 'GET',
                    data: { id: staffId },         // Send Staff ID to the PHP script
                    success: function(response) {
                        console.log("AJAX Response:", response);  // Log the response to check if it's JSON

                        // Try parsing the response if it's a string
                        try {
                            const data = JSON.parse(response); // Only parse if response is a string

                            if (data.status === 'success') {
                                console.log("Staff deleted successfully!");
                                alert("Staff deleted successfully!");
                                // Optionally, remove the row from the table (or reload the page)
                                location.reload();  // Reload the page to update the list
                            } else {
                                console.log('Failed to delete Staff:', data.message);
                                alert("Failed to delete Staff: " + data.message);
                            }
                        } catch (error) {
                            console.error('Error parsing JSON:', error);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX error:", status, error);  // Log any error
                        alert("An error occurred while deleting the Staff.");
                    }
                });
            } else {
                console.log("Deletion cancelled.");
                // If user presses "No", you can add any other handling here, like showing a message
                alert("Staff deletion cancelled.");
            }
        });







/*


    // ================= For Update Staff ===================
    // Open the modal and populate fields when "Update" button is clicked
    $('.update-btn').on('click', function () {
        const staffId = $(this).data('id');
        console.log("Clicked Update Btn: ", staffId);

        // Fetch current Staff details using AJAX
        $.ajax({
            url: 'php/fetch-Staff-details.php',
            type: 'GET', // Ensure this matches your PHP script's expected method
            data: { id: staffId },
            success: function (response) {
                try {
                    const data = JSON.parse(response);
                    if (data.status === 'success') {
                        // Populate modal fields with the existing Staff data
                        $('#updateEventId').val(data.eventData.Event_ID);
                        $('#updateEventMonth').val(data.eventData.E_Month); // Populate month based on the fetched data
                        $('#updateEventDay').val(data.eventData.E_Day);
                        $('#updateEventYear').val(data.eventData.E_Year);
                        $('#updateEventType').val(data.eventData.E_Type); // Set Staff Type based on the fetched data
                        $('#updateEventReligion').val(data.eventData.E_Religion); // Set Religion based on the fetched data
                        $('#updateEventLocation').val(data.eventData.E_Location);
    
                        // Show the modal
                        $('#updateEventModal').modal('show');
                    } else {
                        alert('Failed to fetch Staff details: ' + data.message);
                    }
                } catch (error) {
                    console.error('Error parsing JSON:', error);
                    alert('Error processing the response from the server.');
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX error:", status, error);
                alert('An error occurred while fetching Staff details.');
            }
        });
    });

    // Submit the updated data when the form in the modal is submitted
    $('#updateEventForm').on('submit', function (e) {
        e.preventDefault();

        // Gather updated data from form
        const updatedData = {
            eventId: $('#updateEventId').val(),
            eventYear: $('#updateEventYear').val(),
            eventMonth: $('#updateEventMonth').val(),
            eventDay: $('#updateEventDay').val(),
            eventType: $('#updateEventType').val(),
            religion: $('#updateEventReligion').val(),
            location: $('#updateEventLocation').val()
        };

        // Send update request via AJAX
        $.ajax({
            url: 'php/update-event.php',
            type: 'POST',
            data: updatedData,
            success: function (response) {
                try {
                    const data = JSON.parse(response);
                    if (data.status === 'success') {
                        alert('Event updated successfully!');
                        location.reload();  // Reload the page to show updated data
                    } else {
                        alert('Failed to update event: ' + data.message);
                    }
                } catch (error) {
                    console.error('Error parsing JSON:', error);
                    alert('Error processing the update response.');
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX error:", status, error);
                alert('An error occurred while updating the event.');
            }
        });
    });



*/








});
