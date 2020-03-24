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
  var profileName = $('#profileName').html()
  var profileId = $('#profileId').html()
  $('#nombre_facebook').val(profileName)
  $('#id_facebook').val(profileId)
}
window.showCarton = showCarton;

function cambiarNumeros() {
  var $suma = 0
  $(".carton__number").each(function() {
    $(this).val(Math.floor(Math.random() * 11) + $suma)
    $suma = $suma + 10
  })
}
window.cambiarNumeros = cambiarNumeros;

function numeroActivo(elem) {
  $('#' + elem.id).toggleClass('carton__number--selected') 
}
window.numeroActivo = numeroActivo;

function updateForm() {
  // var dataString = 'name='+ name + '&email=' + email + '&phone=' + phone;
  //var dataString = 'id_facebook=1234&cartonNumber1=1&cartonNumber2=2&cartonNumber3=3&cartonNumber4=4&cartonNumber5=5&cartonNumber6=6';
  $.ajax({
    type: "POST",
    url: "form_noreload.php",
    data: dataString,
    success: function() {
      $('#message').html("aaaaaaaaaa");
    }
  });
  return false;
}
window.updateForm = updateForm;
