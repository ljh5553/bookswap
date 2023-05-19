/*
    Author : 박정웅
    File Name : signup.js
    Format : JavaScript
    Description : 회원가입 페이지의 동적 기능을 수행하는 자바스크립트
*/

window.onload=function(){
    const input_id = document.querySelector('#user_id')
    const input_pw = document.querySelector('#user_pw')

    const notice_id = document.querySelector('.newId')
    const notice_pw = document.querySelector('.newPw')
   
    const input_next_pw = document.querySelector('#next_pw')
    const notice_next_pw =  document.querySelector('.next_pw')

    input_id.addEventListener('click',function(){
       notice_id.style.display='block' 
    })

    input_pw.addEventListener('click',function(){
        notice_pw.style.display='block' 
    })

    input_next_pw.addEventListener('click',function(){
        notice_next_pw.style.display='block' 
    })

}// onload end