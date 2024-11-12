$(document).ready(function() {
    console.log("View Event JS file loaded");

    // Add click event listener to each "View" button
    $('.view-btn').on('click', function() {
        const eventId = $(this).data('id');  // Get the data-id of the clicked button
        console.log("Clicked View Btn: ", eventId);

        // Send AJAX request to get event details
        $.ajax({
            url: 'php/fetch-event-details.php',   // Your PHP script that fetches event details
            type: 'GET',
            data: { id: eventId },            // Send event ID to the PHP script
            success: function(response) {
                console.log("AJAX Response:", response);  // Log the response to check if it's JSON
            
                // Try parsing the response if it's a string
                try {
                    const data = JSON.parse(response); // Only parse if response is a string
            
                    if (data.status === 'success') {
                        console.log(data.eventData.Event_ID);
                        window.location.href = "event-details.php?id=" + data.eventData.Event_ID; // Redirect
                    } else {
                        console.log('Failed to fetch event details:', data.message);
                    }
                } catch (error) {
                    console.error('Error parsing JSON:', error);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX error:", status, error);  // Log any error
            }
        });
    });





        // Add click event listener to each "Delete" btn
        $('.delete-btn').on('click', function() {
            const eventId = $(this).data('id');  // Get the data-id of le clicked button
            console.log("Clicked delete Btn: ", eventId);
        
            // Show confirmation dialog to person
            const isConfirmed = confirm("Are you sure you want to delete this event?");

            // If (Yes)
            if (isConfirmed) {
                // Send AJAX req to delete event from database
                $.ajax({
                    url: 'php/delete-event.php',   // PHP script that deletes the event
                    type: 'GET',
                    data: { id: eventId },         // Send event ID to the PHP script
                    success: function(response) {
                        console.log("AJAX Response:", response);  // Log the response to check if it's JSON

                        // Try parsing the response if it's a string
                        try {
                            const data = JSON.parse(response); // Only parse if response is a string

                            if (data.status === 'success') {
                                console.log("Event deleted successfully!");
                                alert("Event deleted successfully!");
                                // Optionally, remove the row from the table (or reload the page)
                                location.reload();  // Reload the page to update the list
                            } else {
                                console.log('Failed to delete event:', data.message);
                                alert("Failed to delete event: " + data.message);
                            }
                        } catch (error) {
                            console.error('Error parsing JSON:', error);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX error:", status, error);  // Log any error
                        alert("An error occurred while deleting the event.");
                    }
                });
            } else {
                console.log("Deletion cancelled.");
                // If user presses "No", you can add any other handling here, like showing a message
                alert("Event deletion cancelled.");
            }
        });




        // Add click event listener to each "Update" button
        $('.update-btn').on('click', function() {
            const eventId = $(this).data('id');  // Get the data-id of the clicked button
            console.log("Clicked update Btn: ", eventId);
    
            // Send AJAX request to get event details
            $.ajax({
                url: 'php/fetch-event-details.php',   // Your PHP script that fetches event details
                type: 'GET',
                data: { id: eventId },            // Send event ID to the PHP script
                success: function(response) {
                    console.log("AJAX Response:", response);  // Log the response to check if it's JSON
                
                    // Try parsing the response if it's a string
                    try {
                        const data = JSON.parse(response); // Only parse if response is a string
                
                        if (data.status === 'success') {
                            console.log(data.eventData.Event_ID);
                            window.location.href = "event-details.php?id=" + data.eventData.Event_ID; // Redirect
                        } else {
                            console.log('Failed to fetch event details:', data.message);
                        }
                    } catch (error) {
                        console.error('Error parsing JSON:', error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX error:", status, error);  // Log any error
                }
            });
        });












});
