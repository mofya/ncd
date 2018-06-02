<?php

    if(!isset($_SESSION['token']))
        $_SESSION['token'] = sha1(rand()); // random token

?>

    <!-- Styles for the back-to-top button -->
<style>
    #myBtn {
        display: none; /* Hidden by default */
        position: fixed; /* Fixed/sticky position */
        bottom: 40px; /* Place the button at the bottom of the page */
        right: 40px; /* Place the button 30px from the right */
        z-index: 99; /* Make sure it does not overlap */
        border: none; /* Remove borders */
        outline: none; /* Remove outline */
        background-color: #456; /* Set a background color */
        color: white; /* Text color */
        cursor: pointer; /* Add a mouse pointer on hover */
        padding: 20px; /* Some padding */
        border-radius: 10px; /* Rounded corners */
    }

    #myBtn:hover {
        background-color: #555; /* Add a dark-grey background on hover */
    }

</style>

    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up"></i></button>

<!-- script that controls the back-to-top button -->
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Chrome, Safari and Opera
            document.documentElement.scrollTop = 0; // For IE and Firefox
        }
    </script>


	<!-- Footer -->
	<footer class="footer footer-static-bottom" style="color: black; background-color: #e7e7e7">
		<div class="container" style="text-align:center">
			<hr>
			<p class="text-muted"><span class="fa fa-copyright"></span> -
				<?php echo date('Y')." ". $set->site_name;?>
				<br> All rights reserved.
			</p>
		</div>
	</footer>

	<!-- Js scripts -->
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="js/wizard/jquery.bootstrap.wizard.js"></script>
	<script src="js/wizard/demo.js"></script>
<!--	<script src="js/jquery-2.1.4.min.js"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.0/metisMenu.min.js"></script>

	<script src="js/jquery.lwtCountdown-1.0.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/jquery.form.js"></script>
	<script src="js/jquery.nav.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/main.js"></script>

	<!-- form wizard script -->
	<script src="js/wizard.js"></script>
    <!-- dateTable scripts -->
    <script src="js/bootstrap-table.js"></script>

    <!-- datepicker script -->
    <script src="js/datepicker/js/bootstrap-datepicker.js"></script>


    <!-- custom table script -->
    <script>
        $(function () {
            $('#hover, #striped, #condensed').click(function () {
                var classes = 'table';

                if ($('#hover').prop('checked')) {
                    classes += ' table-hover';
                }
                if ($('#condensed').prop('checked')) {
                    classes += ' table-condensed';
                }
                $('#table-style').bootstrapTable('destroy')
                    .bootstrapTable({
                        classes: classes,
                        striped: $('#striped').prop('checked')
                    });
            });
        });

        function rowStyle(row, index) {
            var classes = ['active', 'success', 'info', 'warning', 'danger'];

            if (index % 2 === 0 && index / 2 < classes.length) {
                return {
                    classes: classes[index / 2]
                };
            }
            return {};
        }
    </script>

<!-- custom datepicker script -->
	<script>
		$( function() {
			// register all date field IDs here to use date picker
			$( "#datepicker, #date1, #date2, #date3, #date4" ).datepicker('hide');
		} );
	</script>

<!-- script that handles auto disappearing of alerts -->
	<script>
		$('div.alert').not('.alert-important').delay(6000).slideUp(300);
	</script>

    <script>
		var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>
	</body>
</html>
