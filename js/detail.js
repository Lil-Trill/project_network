const image = document.querySelector('.image-book-detail');

let obj = JSON.parse(localStorage.getItem('book'));
console.log(obj);
let img = document.createElement('img');
console.log(obj.name);
if(obj.image_path == null)obj.image_path = "images/nf.png";
img.setAttribute('src', obj.image_path);