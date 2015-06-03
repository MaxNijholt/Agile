/**
 * Created by toinebakkeren on 28/05/15.
 */
function getComments(contentID){

}

$(document).ready(function() {

    // process the form
    $('form').submit(function(event) {

        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        // $_POST['comment_body'], $_POST['comment_author'], $_POST['content_id']
        var formData = {
            'comment_body'          : $("#comment_body").val(),
            'comment_author'        : $('input[name=comment_author]').val(),
            'content_id'            : $('input[name=content_id]').val()
        };

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : '/Reacties/postComment', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode          : true
        })
            // using the done promise callback
            .done(function(data) {

                // log data to the console so we can see
                console.log(data);

                // here we will handle errors and validation messages
                if ( ! data.success) {
                        $('#message-box').addClass('has-error'); // add the error class to show red input
                        $('#message-box').append('<div class="alert alert-danger">' + data.message + '</div>'); // add the actual error message under our input
                } else {

                    // ALL GOOD! just show the success message!
                    $('#message-box').append('<div class="alert alert-success">' + data.message + '</div>');

                    $('#comments').append('<div')


                    // usually after form submission, you'll want to redirect
                    // window.location = '/thank-you'; // redirect a user to another page
                    //alert('success'); // for now we'll just alert the user

                }
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});