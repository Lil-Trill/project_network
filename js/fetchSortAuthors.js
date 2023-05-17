const bookContainer = document.querySelector(".book-container");

$('.btn-sort-authors').click(function(event){
    event.preventDefault();
    
    let fname = $('input[name = "authors"]:checked').closest('p').text();
    let idAuthor = $('input[name = "authors"]:checked').val();

    $.ajax({
        url: 'api/sortAuthors.php',
        type: 'POST',
        dataType: 'text',
        data: {
            id: idAuthor
        },
        success: function(data){
            console.log("data",data);
        }
    });
}); 