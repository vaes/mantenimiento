<!--
 /* ===========================
	FlavorPHP 2.0
	git repository: https://github.com/FlavorPHP/FlavorPHP-2.0

	FlavorPHP 2.0 is a free software licensed under the MIT license
	=========================== */
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $this->html->charsetTag("UTF-8"); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="FlavorPHP 2.0" />
    <title><?php echo $title_for_layout; ?></title>

	  <?php echo $this->html->includeCss("bootstrap/css/bootstrap.min"); ?>
    <?php echo $this->html->includeCss("bootstrap/css/bootstrap-theme.min"); ?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <?php  echo $this->html->includeCss("bootstrap/css/style") ?>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">var path = "<?php echo $this->path; ?>"</script>
	</head>
  <body>
    <div class="header">
       <div class="top-header">
         <div class="container">
           <div class="logo">
             <?php echo $this->html->image("logo.png","Pulpit Rock"); ?>
           <div class="clearfix"></div>
           </div>
           <span class="menu"> </span>
           <div class="m-clear"></div>
           <div class="top-menu">       
            <ul>       
               <li class="active"><?php echo $this->html->linkTo("HOTELES", "inicio"); ?></li> 
               <li><?php echo $this->html->linkTo("RESERVAS", "cancelar"); ?></li>    
               <li><?php echo $this->html->linkTo("CONTÁCTANOS", "contacto"); ?></li>
                <div class="clearfix"></div>
             </ul>
           </div>
          </div>
        </div>
    </div>

    <div class="container theme-showcase" role="main">
      <?php echo $content_for_layout ?>
		</div>
		<!-- ================================================== -->
      <?php echo $this->html->includeJs("jquery-1.11.3.min"); ?>
      <?php echo $this->html->includeJs("sort"); ?>
      <?php echo $this->html->includeJs("habitaciones"); ?>
      <?php echo $this->html->includeJs("descripcion"); ?>
      <?php echo $this->html->includeJs("reservar"); ?>
      <?php echo $this->html->includeJs("cancelar"); ?>
      <?php echo $this->html->includeJs("jquery.session"); ?>
		  <?php echo $this->html->includeJs("bootstrap.min"); ?>
		<!-- ============================================= -->

    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	</body>
</html>
