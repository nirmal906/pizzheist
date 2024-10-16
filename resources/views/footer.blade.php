<div class="fixed-bottom d-flex justify-content-center align-items-center navfooter">
    <span>Sorry we're currently not accepting orders</span>
</div>
<script type="text/javascript" src='/jquery/jquery-3.7.1.js'></script>
<script type="text/javascript" src='/bootstrap/js/bootstrap.js'></script>
<script type="text/javascript" src='/fontawesome/all.min.js'></script>
<script type="text/javascript" src="/splide/splide.min.js"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script>
    // SPLIDE
    document.addEventListener('DOMContentLoaded', function(){
        new Splide('#splide_carousel_container',{
            type: 'slide',
            gap: 16,
            perPage: 3
        }).mount();
    });
    // PRODUCT BAR FOCUS
    function handleClickScroll(event,itemId){
        event.preventDefault();
        const targetElement = document.getElementById(itemId);
        if(targetElement){
            targetElement.scrollIntoView({
                behavior: 'smooth', 
                block: 'start' 
            });
            targetElement.focus({ preventScroll: true }); 
        }
    }
</script>
</body>
</html>