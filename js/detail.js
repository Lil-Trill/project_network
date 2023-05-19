const image = document.querySelector('.image-book-container-detail');
const textContent = document.querySelector('.text-content-detail');

let book = JSON.parse(localStorage.getItem('book'));
console.log(book);
let img = document.createElement('img');
img.classList.add('image-book-detail');
if(book.image_path == null)book.image_path = "images/nf.png";
img.setAttribute('src', book.image_path);
image.append(img);

let nameBook = document.createElement('h2');
nameBook.classList.add('name-detail');
nameBook.innerHTML = book.name;

let title = document.createElement('p');
title.classList.add('title-detail');
title.innerHTML = book.title;

let authorNameContainer = document.createElement('div');
authorNameContainer.classList.add("author-name-container");
let fname = document.createElement('p');
fname.innerHTML = book.fname;
let lname = document.createElement('p');
lname.innerHTML = book.lname;
let surname = document.createElement('p');
surname.innerHTML = book.surname;
authorNameContainer.append(lname);
authorNameContainer.append(fname);
authorNameContainer.append(surname);

let date = document.createElement('p');
date.classList.add('date-detail');
date.innerHTML = book.the_year_of_publishing;

textContent.append(nameBook);
textContent.append(title);
textContent.append(authorNameContainer);
textContent.append(date);
