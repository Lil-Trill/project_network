$('.btn_exit').click(function(event){

    $.ajax({
        url: "api/exit.php",
        type: "POST",
        dataType: "text",
        data:{

        },
        success: function(data){
            console.lof(data)
            location.reload();
        }
    });
    location.reload();
});
