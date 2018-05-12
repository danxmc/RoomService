<!-- jQuery -->
<script src="/js/jquery.min.js"></script>
        <!-- Bootstrap js-->
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <!--easing plugin for smooth scroll-->
        
        <script src="/js/jquery.easing.1.3.min.js" type="text/javascript"></script>
        <script src="/js/jquery.backstretch.min.js" type="text/javascript"></script>
        <script src="/js/jquery.sticky.js" type="text/javascript"></script>
<!-- jQuery UI -->
<script type="text/javascript" src="/js/jquery-ui.min.js"></script>
        <!--pace plugin-->
        <script src="/js/pace.min.js" type="text/javascript"></script>
        <!--on scroll animation-->
        <script src="/js/wow.min.js" type="text/javascript"></script> 
        <script src="/js/restaurant-custom.js" type="text/javascript"></script>
        <script>
        jQuery( window ).resize(function() {
    jQuery(".navbar-collapse").css({ maxHeight: $(window).height() - $(".navbar-header").height() + "px" });
});
//sticky header on scroll
jQuery(document).ready(function () {
    $(window).load(function () {
        jQuery(".sticky").sticky({topSpacing: 0});
    });
});
</script>
<script src="/js/jquery.flexslider-min.js" type="text/javascript"></script>
<script src="/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
@yield('scripts')