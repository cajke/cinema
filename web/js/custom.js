$(document).ready(function () {
    $( ".table-responsive" ).children().first().DataTable();
});
function validateForm() {
    var email = document.forms["createUserForm"]["email"].value;
    var reg_email = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!reg_email.test(email)) {
        document.getElementById('emailError').style.display = 'block';
        return false;
    }
    var password = document.forms["createUserForm"]["password"].value;
    if (password.length <= 4) {
        document.getElementById('passwordError').style.display = 'block';
        return false;
    }
}

$(document).ready(function(){
    $('#footer').css('margin-top', $(document).height() - (($('.body-content').height()) + $('#footer').height()));
})