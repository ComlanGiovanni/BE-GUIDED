$.getJSON('php/flash.php', function (data) {
    console.log("data :");
    console.log(data);
    $.each(data, function(key, type){
        console.log(type);
        $.each(type,function (key, value) {
            console.log(key);
            console.log(value);
            $.each(value, function (msg_key, msg) {
                console.log(msg);
                $(".flashes").append('<div class="text-center alert alert-' + key + '"><button type="button" class="close"'
                    + ' data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
                    + msg + '<div/>');
            })
        })
    })
});