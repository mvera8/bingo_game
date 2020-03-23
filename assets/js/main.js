import '../scss/main.scss'
import 'bootstrap'

var window = require('window')
window.$ = window.jQuery = window.jquery = $

$(window).on('load', function () {
  // know if working
  $('body').addClass('bbb')
})

$(document).ready(function () {
  // know if working
  $('body').addClass('ccc')  
})

function showCarton() {
  $('#carton').show()
  $('#participar').hide()
}
window.showCarton = showCarton;

function cambiarNumeros() {
	/*
	var cartonNumber = document.getElementsByClassName("carton__number");
	cartonNumber[0].innerHTML = Math.floor(Math.random() * 11);
	cartonNumber[1].innerHTML = Math.floor(Math.random() * 11) + 10;
	cartonNumber[2].innerHTML = Math.floor(Math.random() * 11) + 20;
	cartonNumber[3].innerHTML = Math.floor(Math.random() * 11) + 30;
	cartonNumber[4].innerHTML = Math.floor(Math.random() * 11) + 40;
	cartonNumber[5].innerHTML = Math.floor(Math.random() * 11) + 50;
	*/
  var $suma = 0
  $(".carton__number").each(function() {
    $(this).val(Math.floor(Math.random() * 11) + $suma)
    $suma = $suma + 10
  })
}
window.cambiarNumeros = cambiarNumeros;
