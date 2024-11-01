jQuery(document).ready(function() {
    var $j = jQuery;
    $j("a.vtg-loadmore").click(function() {
        vtgInstagramPagination($j(this).attr('data-url'), $j(this).attr('id'));
        return false;
    });
    vtgInitMasonry();
    $j('.vetrogram').each(function() {
        var $this = $j(this);
        $this.waitForImages(function() {
            $this.addClass('vtg-loaded');
            vtgInitMasonry();
        });
    });
});
jQuery(window).resize(function() {
    vtgInitMasonry();
});
jQuery(window).bind('scroll', function() {
    var $j = jQuery,
        scrollTop = $j(this).scrollTop(),
        h = $j(window).height();
    $j('.vtg-infinite-scroll .vtg-loadmore').each(function() {
        $j(this).css('height', ($j(this).parent().find('.vtg-loading').outerHeight())).css('width', ($j(this).parent().find('.vtg-loading').outerWidth()));
        if (!$j(this).hasClass('vtg-is-loading')) {
            var offsetTop = $j(this).offset().top;
            if (offsetTop - h < scrollTop && offsetTop + (h / 2) > scrollTop) $j(this).click();
        }
    });
});

function vtgInitMasonry() {
    var $j = jQuery;
    if ($j('.vtg-masonry-holder').length) {
        $j('.vtg-masonry-holder').isotope({
            masonry: {
                columnWidth: '.vtg-masonry-item',
            },
            itemSelector: '.vtg-masonry-item',
            layoutMode: 'masonry',
            transitionDuration: 0,
        });
    }
}

function vtgInstagramPagination(URL, ID) {
    var $j = jQuery,
        ID = '.' + ID,
        moreButton = ID + ' .vtg-loadmore';
    if (!$j(moreButton).hasClass('vtg-is-loading')) {
        $j(moreButton).addClass('vtg-is-loading vtg-fade-out');
        $j(ID + ' .vtg-loading').addClass('vtg-fade-in');
        var oReq = new XMLHttpRequest();
        oReq.open("GET", URL);
        oReq.addEventListener("loadend", function() {
            $j(ID + ' .vetrogram-holder').css('height', $j(ID + ' .vetrogram-holder').outerHeight());
            var doc = document.createElement("html");
            doc.innerHTML = this.responseText;
            var newPosts = $j(ID + ' .vetrogram-inner', doc),
                $i = 0;
            $j(ID + ' .vetrogram-inner .vtg-post', doc).each(function() {
                $j(this).addClass('vtg-hide');
                var index = (($i / 2)) / 10;
                if ($j(ID + ' .vtg-masonry-holder').length) index = index + 0.1;
                if (index > 0) $j(this).css('animation-delay', index + 's');
                $i++;
            });
            newPosts.waitForImages(function() {
                $j(ID + ' .vtg-masonry-holder').length ? $j(ID + ' .vetrogram-inner').isotope('insert', $j(newPosts.html())) : $j(ID + ' .vetrogram-inner').append(newPosts.html());
                $j(ID + ' .vetrogram-holder').css('height', ($j(ID + ' .vetrogram-inner').outerHeight() + (2 * parseFloat($j(ID + ' .vetrogram-inner').css('margin-top')))));
                setTimeout(function() {
                    $j(ID + ' .vetrogram-holder').css('height', 'auto');
                }, 700);
                setTimeout(function() {
                    if ($j(ID + ' .vtg-masonry-holder').length) $j(ID + ' .vtg-masonry-holder').isotope('layout');
                }, 100);
                if ($j(moreButton, doc).length) {
                    $j(moreButton).attr('data-url', $j(moreButton, doc).attr('data-url'));
                    $j(moreButton).removeClass('vtg-is-loading vtg-fade-out');
                    $j(ID + ' .vtg-loading').removeClass('vtg-fade-in');
                } else {
                    setTimeout(function() {
                        var height = Math.max($j(this).find(ID + ' .vtg-loading').outerHeight(), $j(this).find(ID + ' .vetrogram-loadmore').outerHeight());
                        $j(ID + ' .vtg-pagination').css('height', height);
                        $j(ID + ' .vtg-pagination-inner').fadeOut(200, function() {
                            $j(this).remove();
                            $j(ID + ' .vtg-pagination').slideUp(200);
                        });
                    }, 700);
                }
            });
        });
        oReq.addEventListener("error", function() {
            $j(moreButton).removeClass('vtg-is-loading vtg-fade-out');
            $j(ID + ' .vtg-loading').removeClass('vtg-fade-in');
        });
        oReq.send();
    }
}
