const btnSignIn = document.querySelector(".btn-sign-in");
const modelWindowSignIn = document.querySelector(".model-window-signIn");
const modelWindowLogIn = document.querySelector('.model-window-login');
const btnLogIn = document.querySelector('.btn-log-in');
const crossLogin = document.querySelector('.cross-login');

btnSignIn.addEventListener('click',()=>{
    console.log("нажата кнопка войти");
    modelWindowSignIn.classList.add("model-window-signIn-open");
    btnLogIn.setAttribute('disabled', '');
});

btnLogIn.addEventListener('click',()=>{
    console.log("нажата кнопка зарегестрироваться");
    modelWindowLogIn.classList.add('model-window-login-open');
    btnSignIn.setAttribute('disabled', '');
});

crossLogin.addEventListener('click',(event)=>{
    modelWindowLogIn.classList.toggle("model-window-login-open");
    btnSignIn.removeAttribute('disabled');
});

document.querySelector('.cross-signIn').addEventListener('click',(event)=>{
    modelWindowSignIn.classList.toggle('model-window-signIn-open');
    btnLogIn.removeAttribute('disabled');
})
