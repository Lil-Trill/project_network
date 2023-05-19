const textContent = document.querySelector('.text-content-detail');

$('.book-container').on('click',function(event){
    let book = event.target.closest('.item-book');
    let idBook = book.dataset.id;
    $.ajax({
        url: 'api/detailBookDB.php',
        type: 'POST',
        dataType: 'json',
        data: {
            idBook: idBook
        },
        success: function(data){
            console.log(data.name);
            localStorage.setItem('book', JSON.stringify(data));
            document.location.href = 'detailBook.php';
        }
    })
})