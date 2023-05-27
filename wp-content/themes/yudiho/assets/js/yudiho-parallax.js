$(document).ready(function () {
    $(window).on('scroll', onScroll);
});
function onScroll() {
    let wst = $(window).scrollTop(),
        dh = $(document).height(),
        wh = $(window).height();

    let scrollPercent = (wst / (dh - wh)) * 100;

    $('.yudiho-parallax').each((i, e) => {
        let zoom = $(e).attr('data-zoom');
    let variant = ((+zoom) * scrollPercent / 100);
    let bgSize = `${100 + variant}%`;


    $(e).css('background-size', bgSize);
});

}