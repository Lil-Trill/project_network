const bookContainer = document.querySelector(".book-container");
console.log("hello");
$('.btn-sort-authors').click(function(event){
    event.preventDefault();
    
    let fname = $('input[name = "authors"]:checked').closest('p').text();
    let idAuthor = $('input[name = "authors"]:checked').val();

    $.ajax({
        url: 'api/sortAuthors.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id: idAuthor
        },
        success: function(data){
            bookContainer.innerHTML = " ";
            data.forEach(function(item){
                pushBooks(item);
            });
        }
    });
}); 

function pushBooks(item){
            let bookItem = document.createElement('div');
            let img = document.createElement('img');
            let name = document.createElement('h2');
            let title = document.createElement('p');
            let authorName = document.createElement('div');
            let lname = document.createElement('p');
            let fname = document.createElement('p');
            let surname = document.createElement('p');
            bookItem.classList.add('item-book');

            name.classList.add('book-name');
            img.classList.add('book-image');
            title.classList.add('book-title');
            authorName.classList.add('author-name');
            lname.classList.add('lname');
            fname.classList.add('fname');
            surname.classList.add('surname');

            bookItem.dataset.id = item[8];
            if(item[3] == null) item[3] = "./images/nf.png";
            img.setAttribute('src', item[3]);
            name.innerHTML = item[1];
            title.innerHTML = item[2];
            lname.innerHTML = item[12];
            fname.innerHTML = item[11];
            surname.innerHTML = item[13];
            authorName.append(lname);
            authorName.append(fname);
            authorName.append(surname);
            bookItem.append(img);
            bookItem.append(name);
            bookItem.append(title);
            bookItem.append(authorName);
            bookContainer.append(bookItem);
}