const header = document.querySelector('header')
const menu = document.querySelector('.menu')
const nav = document.querySelector('.navbar')
const signup = document.querySelector('.signup_btn')
const signupPage = document.querySelector('.signup')
const signInPage = document.querySelector('.signin')
const signin = document.querySelector('.signin_btn')
const cross = document.querySelector('.cross')
const cross2 = document.querySelector('.cross2')
const signInLink = document.querySelector('[data-in]')
const signUpLink = document.querySelector('[data-up]')
const notice = document.querySelector('.notice')
const rentBtns = document.querySelectorAll('.featured .btn')
const submitBtn = document.querySelector('.submitBtn')

window.addEventListener('scroll', e=>{
    if(window.scrollY > 130){
        header.classList.add('active')
    }else{
        header.classList.remove('active')
    }
    menu.classList.remove('fa-times')
    nav.classList.remove('active')
    signupPage.classList.remove('active')
    signInPage.classList.remove('active')
})

menu.addEventListener('click', e=>{
    menu.classList.toggle('fa-times')
    nav.classList.toggle('active')
})

signup.addEventListener('click', e=>{
    signupPage.classList.add('active')
})

cross.addEventListener('click', e=>{
    signupPage.classList.remove('active')
})

cross2.addEventListener('click', e=>{
    signInPage.classList.remove('active')
})

signin.addEventListener('click', e=>{
    signInPage.classList.add('active')
})

signInLink.addEventListener('click', ()=>{
    signupPage.classList.remove('active')
    setTimeout(() => {
        signInPage.classList.add('active')    
    }, 200)
})

signUpLink.addEventListener('click', ()=>{
    signInPage.classList.remove('active')
    setTimeout(() => {
        signupPage.classList.add('active')    
    }, 200)
})

rentBtns.forEach(rentBtn=>{
    rentBtn.addEventListener('click', e=>{
        e.preventDefault()
        notice.classList.add('fromRight')

        setTimeout(()=>{
            notice.classList.remove('fromRight')
        },1500)
    })
})

submitBtn.addEventListener('click', (e)=>{
    window.location.href = 'available.html'
    e.preventDefault()
})