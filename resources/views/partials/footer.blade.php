
<!--End main_content-->


<!-- Footer -->
<footer class="page-footer mt-5">
        <div class="row">
            <div class="col-8">
                <div class="footer-logo"><span>Domino's</span><br />
                    <span class="nutrition">Nutrition</span>
                </div>
                <div class="footer-para">
                    <p>
                        We choose our ingredients on the basis of safety, taste, and nutritional<br />
                        content to bring our consumers what they want. Dominos Pizza dedicates<br />
                        its attention, energy, and resourses to one mission: deliver a delicious,<br />
                        hot and fresh pizza every time.
                    </p>
                </div><!-- footer-para ends -->
            </div><!-- col ends -->

            <div class="row">
                <div class="col-auto">
                    <span class="footer-links"><a href="/about">About us</a></span><br />
                    <span class="footer-links"><a href="/content/privacy">Privacy</a></span><br />
                    <span class="footer-links"><a href="/content/terms">Term of use</a></span><br />
                </div><!-- col ends -->


                <div class="col-auto">
                    <span class="footer-links"><a href="/contact">Contact us</a></span><br />
                    <span class="footer-links"><a href="/content/nutricion-guide">Nutrition guide</a></span><br />
                    <span class="footer-links"><a href="/content/gift-card">Gift cards</a></span><br />
                </div><!-- col ends -->
            </div><!-- row ends -->
        </div><!-- row ends -->
        <!-- Copyright -->

        <hr class="footer-line">
        <div class="row">

            <div class="col-sm-4">
                <div class="footer-copyright">©2019 Domino's IP Holder LLC. Domino's&reg;<br />
                    Domino's&reg; Pizza<br />
                    The modular logo are registered trademarks of<br />
                    Domino's&reg; IP Holder LLC
                </div><!-- Copyright -->
            </div>

            <div class="col-sm-4">
                <img src="/img/logo_footer.png" 
                     style="margin-left: 170px; 
                            margin-bottom: 25px;  
                            margin-top: 20px;
                            width: 35%;" 
                            alt="footer logo">
            </div>

            <div class="col-sm-4">
                <a href="https://www.facebook.com/dominoswinnipeg/" target="_blank">
                    <img src="/img/fb.png" 
                         alt="facebook icon" 
                         style="margin-left: 70px;
                                padding-left: 30px;">
                </a>
                    <img src="/img/twitter.png" 
                         alt="twitter icon" 
                         style="padding-left: 30px;">
                    <img src="/img/instagram.png" 
                         alt="instagram icon"
                         style="padding-left: 30px;">
            </div>

        </div><!-- /row-->

    

    <noscript>
        This page required JavaScript. Please enable it
    </noscript>

    <script>
    $(document).ready(function() {
        $(".flash").hide()
            .slideDown()
            .delay(2000)
            .slideUp('slow');

        $(".password").bind('copy paste cut', function(e) {
            e.preventDefault();
            alert('cut,copy & paste options are disabled !');
        });
    });// .document.ready



$(".btn-refresh").click(function(){

    $.ajax({
     
    type:'GET',

    url:'/refresh_captcha',

    success:function(data){
      
        $(".captcha span").html(data.captcha); 
        
     }

    });// .ajax

});// .click event


    </script>

</footer>

</div><!-- /container -->

<!-- Footer -->