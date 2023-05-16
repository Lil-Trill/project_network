const blockBooks = document.querySelectorAll(".book-container");
const btnSignIn = document.querySelector(".btn-sign-in");
const modelWindowSignIn = document.querySelector(".model-window-signIn");

blockBooks.forEach((blockBook)=>{
    blockBook.addEventListener('click',()=>{
        console.log("привет мой дорогой мир!!!");
    })
});

btnSignIn.addEventListener('click',()=>{
    modelWindowSignIn.classList.add("model-window-signIn-open");
});