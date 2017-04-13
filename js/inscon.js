 var verif = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


 document.getElementById("lst").onfocus = function() {
    if ($("input[name=lastname]").val() == '') {
        $("input[name=lastname]").css('border-color', 'red');
    } else {
        $("input[name=lastname]").css('border-color', 'green');
    }
}
document.getElementById("fst").onfocus = function() {
    if ($("input[name=firstname]").val() == '') {
        $("input[name=firstname]").css('border-color', 'red');
    } else {
        $("input[name=firstname]").css('border-color', 'green');
    }
}
document.getElementById("mail").onfocus = function() {
    if ($("input[name=email]").val() == '') {
        $("input[name=email]").css('border-color', 'red');
    } else {
        $("input[name=email]").css('border-color', 'green');
    }
    if (!verif.test($("input[name=email]").val())) {
        $("input[name=email]").css('border-color', 'red');
    } else {
        $("input[name=email]").css('border-color', 'green');
    }
}

document.getElementById("pass").onfocus = function() {
    if ($("input[name=pass]").val() == '') {
        $("input[name=pass]").css('border-color', 'red');
    } else {
        $("input[name=pass]").css('border-color', 'green');
    }

}

document.getElementById("repass").onfocus = function() {
    if ($("input[name=pass_confirm]").val() == '') {
        $("input[name=pass_confirm]").css('border-color', 'red');
    } else {
        $("input[name=pass_confirm]").css('border-color', 'green');
    }
}


document.getElementById("lst").onkeyup = function() {
    if ($("input[name=lastname]").val() == '') {
        $("input[name=lastname]").css('border-color', 'red');
    } else {
        $("input[name=lastname]").css('border-color', 'green');
    }
}
document.getElementById("fst").onkeyup = function() {
    if ($("input[name=firstname]").val() == '') {
        $("input[name=firstname]").css('border-color', 'red');
    } else {
        $("input[name=firstname]").css('border-color', 'green');
    }
}

document.getElementById("mail").onkeyup = function() {
    var verif = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if ($("input[name=email]").val() == '') {
        $("input[name=email]").css('border-color', 'red');
    } else {
        $("input[name=email]").css('border-color', 'green');
    }
    if (!verif.test($("input[name=email]").val())) {
        $("input[name=email]").css('border-color', 'red');
    } else {
        $("input[name=email]").css('border-color', 'green');
    }
}

document.getElementById("pass").onkeyup = function() {
    if ($("input[name=pass]").val() == '') {
        $("input[name=pass]").css('border-color', 'red');
    } else {
        $("input[name=pass]").css('border-color', 'green');
    }

}

document.getElementById("repass").onkeyup = function() {
    if ($("input[name=pass_confirm]").val() == '') {
        $("input[name=pass_confirm]").css('border-color', 'red');
    } else {
        $("input[name=pass_confirm]").css('border-color', 'green');
    }

    if ($("input[name=pass_confirm]").val() !== $("input[name=pass]").val()) {
        $("input[name=pass_confirm]").css('border-color', 'red');
    } else {
        $("input[name=pass_confirm]").css('border-color', 'green');
    }

}



$("form").submit(function(e) {
    var log=this;
    e.preventDefault();
    if ($("input[name=lastname]").val() == '') {
        $("input[name=lastname]").css('border-color', 'red');
    }

    if ($("input[name=firstname]").val() == '') {
        $("input[name=firstname]").css('border-color', 'red');
    }

    if ($("input[name=email]").val() == '') {
        $("input[name=email]").css('border-color', 'red');
    }
    if (!verif.test($("input[name=email]").val())) {
        $("input[name=email]").css('border-color', 'red');
    }

    if ($("input[name=pass]").val() == '') {
        $("input[name=pass]").css('border-color', 'red');
    } 

    if ($("input[name=pass_confirm]").val() == '') {
        $("input[name=pass_confirm]").css('border-color', 'red');
    } 
    else{
       log.submit();
   }
});