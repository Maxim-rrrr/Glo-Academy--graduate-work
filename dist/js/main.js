$(document).ready(function(){var e=$(".button-wrapper"),a=$(".wrapper");e.on("click",()=>{a.toggleClass("wrapper--active")});var l=$(".modal");$("[data-toggle=modal]").on("click",()=>{l.toggleClass("modal--visible")}),l.on("click",()=>{"modal modal--visible"===event.target.className&&l.removeClass("modal--visible")}),window.addEventListener("keydown",function(e){27==e.keyCode&&(l.removeClass("modal--visible"),o.removeClass("modal--visible"))},!0);var o=$(".modal-thanks");function i(e){e.target.playVideo()}o.on("click",()=>{"modal-thanks modal--visible"===event.target.className&&o.removeClass("modal--visible")}),$("[type=tel]").mask("+7 (000) 000-00-00"),$(".modal__form").validate({rules:{modalName:{required:!0,minlength:2,maxlength:15},modalPhone:{required:!0,minlength:18}},errorClass:"invalid",messages:{modalName:{required:"Имя обязательно",minlength:"Длина имени 2-15 символов",maxlength:"Длина имени 2-15 символов"},modalPhone:{required:"Телефон обязательно",minlength:"Введите телефон полностью"}},submitHandler:function(e){$.ajax({type:"POST",url:"send.php",data:$(e).serialize(),success:function(a){console.log("Ajax сработал, ответ с сервера",a),$(e)[0].reset(),l.removeClass("modal--visible"),o.toggleClass("modal--visible")}})}}),$(".figures__video-play").on("click",function(){new YT.Player("figuresPlayer",{height:"465",width:"100%",videoId:"3wPeND2gvqc",events:{onReady:i}})})});