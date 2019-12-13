let tabPanelSignIn = document.querySelector('.sign-in');
let tabPanelSignUp = document.querySelector('.sign-up');
let signInPage = document.querySelector('#sign-in-page');
let signUpPage = document.querySelector('#sign-up-page');
let signUpSection = document.querySelector('.sign-up-section');

tabPanelSignUp.addEventListener('click', function () {
    tabPanelSignIn.classList.remove('active');
    tabPanelSignUp.classList.add('active');
    signInPage.style.display = 'none';
    signUpPage.style.display = 'block';

})

tabPanelSignIn.addEventListener('click',function () {
    tabPanelSignUp.classList.remove('active');
    tabPanelSignIn.classList.add('active');
    signInPage.style.display = 'block';
    signUpPage.style.display = 'none';
})