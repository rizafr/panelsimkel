<html>
<head>
	<title>Sistem Informasi Manajemen Kelurahan Leuwi Gajah</title>
<!-- For ease i'm just using a JQuery version hosted by JQuery- you can download any version and link to it locally -->
		<meta name="description" content="Sistem Informasi Manajemen Kelurahan" />
		<meta name="keywords" content="sim, simkel, sistem informasi, Sistem Informasi Kelurahan" />
		<meta name="author" content="Ratih & Riza" />
		<link rel="shortcut icon" href="images/cimahi.png"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/easySlider1.7.js"></script>
		<script src="js/modernizr.custom.js"></script>
		
		
<style type="text/css">
		#loading{
			display:none;
			position:fixed;
			top:50%;
			left:50%;
			margin:-35px 0px 0px -35px;
			background:#fff url(loader.gif) no-repeat center center;
			width:70px;
			height:70px;
			z-index:999;
			opacity:0.7;
			-moz-border-radius:10px;
			-webkit-border-radius:10px;
			border-radius:10px;
			
			opacity:0;  /* make things invisible upon start */
			animation:fadeIn ease-in 1; /* call our keyframe named fadeIn, use animattion ease-in and repeat it only 1 time */

			animation-fill-mode:forwards;  /* this makes sure that after animation is done we remain at the last keyframe value (opacity: 1)*/

			animation-duration:1s;
			animation-delay: 1.5s
			}
			
			/* make keyframes that tell the start state and the end state of our object */
			@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
			@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
			@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
			 
			.fade-in {
				opacity:0;  /* make things invisible upon start */
				-webkit-animation:fadeIn ease-in 1;  /* call our keyframe named fadeIn, use animattion ease-in and repeat it only 1 time */
				-moz-animation:fadeIn ease-in 1;
				animation:fadeIn ease-in 1;
			 
				-webkit-animation-fill-mode:forwards;  /* this makes sure that after animation is done we remain at the last keyframe value (opacity: 1)*/
				-moz-animation-fill-mode:forwards;
				animation-fill-mode:forwards;
			 
				-webkit-animation-duration:1s;
				-moz-animation-duration:1s;
				animation-duration:1s;
			}
			 
			.fade-in.one {
			-webkit-animation-delay: 0.7s;
			-moz-animation-delay: 0.7s;
			animation-delay: 0.7s;
			}
			 
			.fade-in.two {
			-webkit-animation-delay: 1.2s;
			-moz-animation-delay:1.2s;
			animation-delay: 1.2s;
			}
			 
			.fade-in.three {
			-webkit-animation-delay: 1.6s;
			-moz-animation-delay: 1.6s;
			animation-delay: 1.6s;
			}
			
			
</style>
<script src="js/loader.js"></script>
<script>
(function($)
{
    $(document).ready(function()
    {
        $.ajaxSetup(
        {
            cache: false,
            beforeSend: function() {
                $('#content').hide();
                $('#loading').show();
            },
            complete: function() {
                $('#loading').hide();
                $('#content').show();
            },
            success: function() {
                $('#loading').hide();
                $('#content').show();
            }
        });
        var $container = $("#content");
        $container.load("full.php");
        var refreshId = setInterval(function()
        {
            $container.load('full.php');
        }, 39000); //5menit
    });
})(jQuery);
</script>
</head>
<body onload="setInterval('displayServerTime()', 1000);">
 
<div id="wrapper">
	    <div id="content"></div>
    <img src="loader.gif" id="loading fade-in.three" alt="loading" style="display:none;" />
</div>

 
</body>
</html>