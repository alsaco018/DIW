
//$('#name').focus();




var angle = 1;
$('.rotate').click(function() {
    if (angle > 3) {
        angle = 1;
        $('img.profile').removeClass('angle-1 angle-2 angle-3');
    } else {
        $('img.profile').addClass('angle-' + angle);
        angle ++;
    }
});

$('.remove').click(function(){
    $('img.profile').toggleClass('hide');
    $('.profile-img-container').addClass('active');
})