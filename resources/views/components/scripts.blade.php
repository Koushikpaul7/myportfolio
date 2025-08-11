<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Magnific Popup -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

<!-- Isotope -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

<!-- Animated Headline -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/animated-headline/1.0.0/animated-headline.min.js"></script>

<!-- Custom scripts -->
<script src="js/scrollIt.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/scripts.js"></script>

<!-- Additional functionality -->
<script>
    $(document).ready(function() {
        // Animated Headline
        $('.cd-headline').each(function(){
            var headline = $(this);
            var words = headline.find('.cd-words-wrapper b');
            var wordIndex = 0;
            
            function showNextWord() {
                words.removeClass('is-visible').addClass('is-hidden');
                words.eq(wordIndex).removeClass('is-hidden').addClass('is-visible');
                wordIndex = (wordIndex + 1) % words.length;
            }
            
            // Show first word
            words.first().addClass('is-visible');
            
            // Start animation
            setInterval(showNextWord, 2000);
        });

        // Smooth scrolling for navigation
        $('a[data-scroll-nav]').on('click', function(e) {
            e.preventDefault();
            var target = $('section[data-scroll-index="' + $(this).data('scroll-nav') + '"]');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
            }
        });

        // Magnific Popup for portfolio images
        $('.popimg').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });

        // Isotope for portfolio filtering
        $('.gallery').isotope({
            itemSelector: '.items',
            layoutMode: 'fitRows'
        });

        $('.filtering span').on('click', function() {
            var filterValue = $(this).attr('data-filter');
            $('.filtering span').removeClass('active');
            $(this).addClass('active');
            $('.gallery').isotope({ filter: filterValue });
        });

        // Navbar scroll effect
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.navbar').addClass('nav-scroll');
            } else {
                $('.navbar').removeClass('nav-scroll');
            }
        });
    });
    
</script> 