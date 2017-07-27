$(document).ready(function(){
    $(".button-collapse").sideNav();
    // comando para inicializar o slider
    $(".slider").slider({full_width: true});
    // comando para inicializar os campos de entrada de select
    $('select').material_select();
});

function sliderPrev(){
  $('.slider').slider('pause');
  $('.slider').slider('prev');
}

function sliderNext(){
  $('.slider').slider('pause');
  $('.slider').slider('next');
}
