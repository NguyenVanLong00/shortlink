$("#info").submit(function (event) {
    var ajaxRequest;

    /* Stop form from submitting normally */
    event.preventDefault();

    /* Clear result div*/
    
    /* Get from elements values */
    var values = $(this).serialize();
    values=values.replace(/https%3A%2F%2F|https%3A%2F%2F|www./gi,"");
    console.log(values);
    ajaxRequest = $.ajax({
        url: "../geturl.php",
        type: "post",
        data: values,
        success:(shortlink)=>{
            shortlink=shortlink.replace("")
            console.log(shortlink)
        },
    });
});