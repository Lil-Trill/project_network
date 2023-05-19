$('.submit-signIn').click(function(event){
    event.preventDefault();
    $('input').removeClass('error');
   
    let login = $('input[name = "login-signIn"]').val(),
    password = $('input[name = "password-signIn"]').val();

    $.ajax({
        url: 'api/signIn.php', //url - ссылка, куда отправляем данные
        type: 'POST', //тип формы отправки
        dataType: 'json', //указываем какого типа переменные получим с сервера
        data: {
            login: login,
            password: password
        }, //объект в который мы и помещаем переменные
        success: function(data){
            if(data.status === "admin"){
                document.location.href = "adminPanel.php";
                return;
            }

            if(data.status)
            document.location.href = "index.php";
            else{
                if(data.type === 1){
                    data.fields.forEach(function(field){
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }
                $('.msg-signIn').addClass("show-message").text(data.message);
            } 

            // $('.msg-signIn').addClass("show-message").text(data);
        }//метод с параметром, который является данными с сервера
    });
    //в результате выполнения ajax был отправлен в файл api/signIn.php форма метода POST с объектами: lname, fname, surname, login, password
    // и получили назад data, которая получила информацию из api/signIn.php через echo
});