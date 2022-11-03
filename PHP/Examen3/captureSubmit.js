$("#form").submit(function pasarPHP() {
    console.log($('#numero').val());
    $.ajax({
        method: "POST",
        url: "service.php",
        dataType : 'text',
        success: function (data) {
            console.log(data);
            $('<div>').append(data).appendTo('body');
        }
    });
});