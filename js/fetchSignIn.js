$('.submit-signIn').click(function(event){
    event.preventDefault();

    let lname = $('input[name = "lname-signIn"]').val(),
     fname = $('input[name = "fname-signIn"]').val(),
     surname = $('input[name = "surname-signIn"]').val(),
     login = $('input[name = "login-signIn"]').val(),
    password = $('input[name = "password-signIn"]').val();

    $.ajax({
        url: 'api/signIn.php', //url - ссылка, куда отправляем данные
        type: 'POST', //тип формы отправки
        dataType: 'text', //указываем какого типа переменные получит сервер
        data: {
            lname: lname,
            fname: fname,
            surname: surname,
            login: login,
            password: password
        }, //объект в который мы и помещаем переменные
        success: function(data){
            $('.msg-signIn').addClass("show-message").text(data);
        }//метод с параметром, который является данными с сервера
    });
    //в результате выполнения ajax был отправлен в файл api/signIn.php форма метода POST с объектами: lname, fname, surname, login, password
    // и получили назад data, которая получила информацию из api/signIn.php через echo
});