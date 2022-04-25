const header = document.querySelector('header')
const menu = document.querySelector('.menu')
const nav = document.querySelector('.navbar')
const notice = document.querySelector('.notice')
const rentBtns = document.querySelectorAll('.featured .btn')
const submitBtn = document.querySelector('.submitBtn')
const fromDate = document.querySelector('.from input')
const toDate = document.querySelector('.to input')

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

// submitBtn.addEventListener('mousedown', e=>{
//     const today = new Date()
//     const currentDate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
//     console.log(new Date(currentDate))
//     console.log(new Date('2022-03-20'))
//     console.log(new Date('2022-03-20') < new Date(currentDate))
//     const utDatum = fromDate.value()
//     console.log(utDatum)
//     if(2===2){
//         e.preventDefault()
//     }else{
//         return
//     }
// })