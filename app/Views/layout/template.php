<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Favicon -->
	<link rel="icon" type="image/png" href="/images/favicon.png">
	
	<!-- Css Style -->
	<link rel="stylesheet" href="/css/bootstrap.css">
	<link rel="stylesheet" href="/css/scrollbar.css">
	<link rel="stylesheet" href="/css/font-awesome.css">
	<link rel="stylesheet" href="/css/styles.css">
	<link rel="stylesheet" href="plugins/jstree/dist/themes/default/style.min.css">
	
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900|Open+Sans:300,400,600,700,800|Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <!-- Bootstrap CSS -->

    <title><?= $title; ?> </title>
  </head>
  <body data-spy="scroll" data-target=".nav-bar" data-offset="50">
  
  <?= $this->include('layout/navbar'); ?>
    <?= $this->renderSection('content'); ?>


</div>

 <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/smoothscroll.js"></script>
    <script src="/js/jquery.scrollTo.min.js"></script>
    <script src="/js/jquery.localScroll.min.js"></script>
    <script src="/js/load.js"></script>
    <script src="/js/custom.js"></script>
    <script src="/js/scrollbar.min.js"></script>
    <script src="plugins/jstree/dist/jstree.min.js"></script>
    <script>
    // prettyPhoto
    jQuery(document).ready(function(){
        jQuery('.dzClickload').click(function(){
            jQuery('.dzClickload').removeClass('active');
            jQuery(this).addClass('active');
        });
        
        jQuery(".content-scroll").mCustomScrollbar({
            setWidth:false,
            setHeight:false,
            axis:"y"
        });	
            
        $(".full-height").css("height", $(window).height());
        
        $("#dz_tree, #dz_tree_rtl").jstree({
            "core": {
                "themes": {
                    "responsive": false
                }
            },
            "types": {
                "default": {
                    "icon": "fa fa-folder"
                },
                "file": {
                    "icon": "fa fa-file-text"
                }
            },
            "plugins": ["types"]
        });
    });
</script>
</body>
</html>