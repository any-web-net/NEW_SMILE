(function( $ ) {

    // настройка
    wp.customize( 'link_color', function( value ) {
        value.bind( function( newVal ) {
            $( 'a' ).css( 'color', newVal );
        } );
    });

    // настройка
    wp.customize( 'display_header', function( value ) {
        value.bind( function( newVal ) {
            false === newVal ? $( '#header' ).hide() : $( '#header' ).show();
        } );
    });

    // настройка
    wp.customize( 'color_scheme', function( value ) {
        value.bind( function( newVal ) {
            if ( 'inverse' === newVal ) {
                $( 'body' ).css({
                    'background-color': '#000',
                    'color'           : '#fff'
                });
            }
            else {
                $( 'body' ).css({
                    'background-color': '#fff',
                    'color'           : '#000'
                });
            }
        });
    });

    // настройка
    var sFont;
    wp.customize( 'font', function( value ) {
        value.bind( function( newVal ) {
            switch( newVal.toString().toLowerCase() ) {
                case 'roboto':
                    sFont = 'Roboto, sans-serif';
                    break;
                case 'courier':
                    sFont = 'Courier New, Courier';
                    break;
                default:
                    sFont = 'Roboto, sans-serif';
                    break;
            }
            $( 'body' ).css({
                fontFamily: sFont
            });
        });

    });

    // настройка
    wp.customize( 'footer_copyright_text', function( value ) {
        value.bind( function( newVal ) {
            $( '#copyright' ).text( newVal );
        });
    });

    // настройка
    wp.customize( 'background_image', function( value ) {
        value.bind( function( newVal ) {
            0 === $.trim( newVal ).length ? $( 'body' ).css( 'background-image', '' ) : $( 'body' ).css( 'background-image', 'url( ' + newVal + ')' );
        });
    });
//=================Image Header===================================================================================
    // настройка
    wp.customize( 'header_bg', function( value ) {
        value.bind( function( newVal ) {
            0 === $.trim( newVal ).length ? $( 'header' ).css( 'background-image', '' ) : $( 'body' ).css( 'background-image', 'url( ' + newVal + ')' );
        });
    });
// ====================Slider=======================================================================================
    // настройка
    wp.customize('slider_images_1', function (value) {
                value.bind( function( newVal ) {
                     $( '.item_1' ).css( 'background', 'url( ' + newVal + ');' +
                                         'background-repeat: no-repeat;' +
                                         'background-position: center center;' +
                                         'background-size: cover;}' );
                });
            });

    wp.customize('slider_images_2', function (value) {
        value.bind( function( newVal ) {
            $( '.item_2' ).css( 'background', 'url( ' + newVal + ');' +
                                'background-repeat: no-repeat;' +
                                'background-position: center center;' +
                                'background-size: cover;}' );
        });
    });

    wp.customize('slider_images_3', function (value) {
        value.bind( function( newVal ) {
            $( '.item_3' ).css( 'background', 'url( ' + newVal + ');' +
                                'background-repeat: no-repeat;' +
                                'background-position: center center;' +
                                'background-size: cover;}' );
        });
    });


//================ Menu =============================================================================================

    wp.customize( 'display menu', function( value ) {
        value.bind( function( newVal ) {
            switch( newVal.toString().toLowerCase() ) {
                case 'top':
                    $('.main-navigation').css('display','none');
                    $('.top-navigation').css('display', 'block');
                    break;
                case 'main':
                    $('.main-navigation').css('display','block');
                    $('.top-navigation').css('display', 'none')
                    break;
                default:
                    $('.main-navigation').css('display','none');
                    $('.top-navigation').css('display', 'block');
                    break;
            }
        });
    });
//================ Aside =============================================================================================

    wp.customize( 'display aside', function( value ) {
        value.bind( function( newVal ) {
            switch( newVal.toString().toLowerCase() ) {
                case 'block':
                    $('.aside').css('display','block');
                    $('.main').css('width', '70%');
                    break;
                case 'none':
                    $('.aside').css('display','none');
                    $('.main').css('width', '90%')
                    break;
                default:
                    $('.aside').css('display','block');
                    $('.main').css('width', '70%');
                    break;
            }
        });
    });

})(jQuery);;