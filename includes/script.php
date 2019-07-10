<script src="public/js/jquery-3.3.1.min.js"></script>
<script src="public/js/jquery-migrate-3.0.1.min.js"></script>
<script src="public/js/jquery-ui.js"></script>
<script src="public/js/popper.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/owl.carousel.min.js"></script>
<script src="public/js/jquery.stellar.min.js"></script>
<script src="public/js/jquery.countdown.min.js"></script>
<script src="public/js/jquery.magnific-popup.min.js"></script>
<script src="public/js/aos.js"></script>
<script src="public/js/main.js"></script>
<script>
   window.addEventListener('load', e => {
       var menu = $('.menu-link-item');
       for(var i = 0; i < menu.length; i++)
       {
           var anchorMenu = menu[i].children[0].pathname;
           if(anchorMenu == window.location.pathname)
           {
               menu[i].setAttribute('class', 'active');
           }
           else
           {
               menu[i].removeAttribute('class', 'active');
           }
       }
   });
</script>  