alert('AjaxContact')
$(document).ready(function() {
    $('#contactForm').submit(function(event) {
        event.preventDefault();
    })

});

//Ajax Contact Form
$(document).ready(function() {

    // Get the form.
    var form = $('#ajax-contact');

    // Get the messages div.
    var formMessages = $('#form-messages');
    var formErrors = $('#form-messages-error');
    var formSuccess = $('#form-messages-success');

    // Set up an event listener for the contact form.
    $(form).submit(function(event) {
        // Stop the browser from submitting the form.
        event.preventDefault();

        // Serialize the form data.
        var formData = $(form).serialize();

        // Submit the form using AJAX.
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData
        }).done(function(response) {

            // Make sure that the formMessages div has the 'success' class.
            //$(formMessages).removeClass('error');
            $(formErrors).removeClass('active');
            $(formSuccess).addClass('active');

            // Set the message text.
            $(formSuccess).text(response);

            // Clear the form.
            $('#name').val('');
            $('#email').val('');
            $('#message').val('');
        }).fail(function(data) {

            // Make sure that the formMessages div has the 'error' class.
            $(formSuccess).removeClass('active');
            $(formErrors).addClass('active');

            // Set the message text.
            if (data.responseText !== '') {
                $(formErrors).text(data.responseText);
            } else {
                $(formErrors).text('Oops! An error occured and your message could not be sent.');
            }
        });

    });



});