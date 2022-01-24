document.addEventListener('DOMContentLoaded', function () {
    template_slider();
});
function template_slider(){
    var splide = new Splide( '#template-slider', {
        type   : 'loop',
        direction: 'rtl',
        lazyLoad: 'nearby',
    } );
    var thumbnails = document.querySelectorAll( '.thumbnail' );
    var current;

    for ( let i = 0; i < thumbnails.length; i++ ) {
        thumbnails[ i ].addEventListener( 'click', function () {
            splide.go( i );
        } );
    }

    splide.on( 'mounted move', function () {
        var thumbnail = thumbnails[ splide.index ];
        if ( thumbnail ) {
            if ( current ) {
                current.classList.remove( 'is-active' );
            }
            thumbnail.classList.add( 'is-active' );
            current = thumbnail;
        }
    } );
    splide.mount();
}
