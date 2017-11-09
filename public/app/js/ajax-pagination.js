$(document).ready(function () {

    var $button = $('#load-more-button');

    var page_num = 1;
    var max_pages = 3;
    var next_link = $button.data('load-link');

    var loaded_text = 'That\'s all';

    var containerID = $button.data('container');

    var $container = $('#' + containerID );
    var container_has_isotope = false;


    if (page_num > max_pages) {
        $button.addClass('last-page').children('span').text(loaded_text);
    }

    $button.on('click', function () {

        if (page_num <= max_pages && !$(this).hasClass('loading') && !$(this).hasClass('last-page')) {

            $.ajax({
                type: 'GET',
                url: next_link,
                dataType: 'html',
                beforeSend: function () {
                            $button.addClass('loading');
                },
                complete: function (XMLHttpRequest) {
                   $button.removeClass('loading');
                    if (XMLHttpRequest.status == 200 && XMLHttpRequest.responseText != '') {

                        page_num++;

                        if (page_num > max_pages) {
                            $button.addClass('last-page').children('.load-more-text').text(loaded_text);
                        }

                        if ($(XMLHttpRequest.responseText).length > 0) {
                            container_has_isotope = (typeof($container.isotope) === 'function');
                            $(XMLHttpRequest.responseText).children().each(function () {
                                var elem = $(this);
                                if (!container_has_isotope) {
                                    elem.css('opacity',0);
                                    $container.append(elem);
                                    elem.addClass('animate');
                                } else {
                                    $container.append( elem )
                                        .isotope( 'appended', elem )
                                        .isotope('layout');
                                    $container.imagesLoaded(function () {
                                        $container.isotope('layout');
                                    });
                                }

                            });
                        }
                    }
                }
            });
        }
        return false;
    });
});
