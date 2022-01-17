const header = document.querySelector('header')
const menu = document.querySelector('.menu')
const nav = document.querySelector('.navbar')
const notice = document.querySelector('.notice')
const rentBtns = document.querySelectorAll('.featured .btn')

window.addEventListener('scroll', e=>{
    if(window.scrollY > 130){
        header.classList.add('active')
    }else{
        header.classList.remove('active')
    }
    menu.classList.remove('fa-times')
    nav.classList.remove('active')
})

menu.addEventListener('click', e=>{
    menu.classList.toggle('fa-times')
    nav.classList.toggle('active')
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