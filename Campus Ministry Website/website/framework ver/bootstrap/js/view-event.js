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
});
