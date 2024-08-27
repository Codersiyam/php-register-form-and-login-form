$(document).ready(function(){
 //jquery for toggle sub manus//
 $('.sub_btn').click(function(){
    $(this).next('.sub_manu').slideToggle();
    $(this).find('.dropdown').toggleClass('rotate')
 });
//jquery for expand and collapse the sidfebar//
$('.manu_btn').click(function(){
$('.side_bar').addClass('active');
$('.manu_btn').css("visibility", "hidden");
});
$('.close_btn').click(function(){
    $('.side_bar').removeClass('active');
    $('.manu_btn').css("visibility", "visible");
    });
});