$('.submit-login').click(function(event){
    event.preventDefault();
    let lname = $('input[name="lname-login"]').val();
    let fname = $('input[name="fname-login"]').val();
    let surname = $('input[name="surname-login"]').val();
    let login = $('input[name="login-login"]').val();
    let password = $('input[name="password-login"]').val();

    console.log(lname);
    console.log(fname);
    console.log(surname);
    console.log(login);
    console.log(password);

    $.ajax({
        url: "api/registration.php",
        type: "POST",
        dataType: "json",
        data:{
            lname : lname,
            fname : fname,
            surname : surname,
            login : login,
            password : password
        },
        success : function(response){
            console.log(response.message);
        }
    })
})