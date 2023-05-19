/*
    Author : 박정웅
    File Name : login.js
    Format : JavaScript
    Description : 로그인 페이지의 동적 기능을 수행하는 자바스크립트
*/

window.onload=function(){
    const input_id = document.querySelector('input[type=text]')
    const input_pw = document.querySelector('input[type=password]')
    const id_error = document.querySelector('.id_error')
    const pw_error = document.querySelector('.pw_error')
    console.log(input_id,input_pw,id_error,pw_error)


    input_id.addEventListener('click',function(){
        id_error.style.display='block' // 테스트용, 해당 코드로 에러메시지를 나타낼 수 있다.
    })

    input_pw.addEventListener('click',function(){
        pw_error.style.display='block' // 테스트용, 해당 코드로 에러메시지를 나타낼 수 있다.
    })

}// onload end