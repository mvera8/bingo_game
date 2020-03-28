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
  bingo()
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
    var newValue = Math.floor(Math.random() * 11) + $suma;
    $(this).val(newValue)
    $(this).prev().val(newValue)
    $suma = $suma + 10
  })
}
window.cambiarNumeros = cambiarNumeros;

function bingo() {
  var numItems = $('.carton__number--selected').length
  if (numItems == 6) {
    $('#buttonBingo').removeClass('d-none')
  }
}


function numeroActivo(elem) {
  var id_facebook = $('#profileId').html()
  var xValue = ($(elem).prev().val())
  console.log(id_facebook)
  console.log(xValue)
  console.log(elem.id)
  var dataString = 'id_facebook='+ id_facebook + '&name=' + elem.id + '&value=' + xValue
  $.ajax({
    type: "POST",
    url: "form_noreload.php",
    data: dataString,
    success: function() {
      //$('#message').html("numero seleccionado: " + xValue);
      $('#' + elem.id).toggleClass('carton__number--selected')
      bingo()
    }
  });
  return false;
}
window.numeroActivo = numeroActivo;
