<?php
session_start(); ob_start(); ?><?php require_once('conexion.php'); if ($_SESSION['identificacion'] == NULL){echo "<script>location.href='insearch.php'</script>"; } /*var_dump($_SESSION['identificacion']);*/ ?> <!DOCTYPE html> <html lang="es"> <head> <meta charset="utf-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1"> <meta name="En estes espacio podras descargar tu certificación" content=""> <meta name="UNAD @darwinyusef" content="Certificación Jornada de Actualización en tecnología"> <title>Certificación Jornada de Actualización en tecnología</title> <!-- Bootstrap Core CSS --> <link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Custom CSS --> <link href="css/2-col-portfolio.css" rel="stylesheet"> <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --> <!-- WARNING: Respond.js doesn't work if you view the page via file:// --> <!--[if lt IE 9]> <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> <![endif]--> </head> <body> <?php $identprincipal = $_SESSION['identificacion']; $consulta = "SELECT principal.idcedula, principal.pnombre, principal.papellido, principal.papellido2, principal.pcorreo, principal.ptel, principal.centro_ubica_idcentro_ubica, principal.unidad_estado_idunidad_estado, principal.tipo_idtipo, unidad_estado.idunidad_estado, unidad_estado.nunidad_es, unidad_estado.unidad_tipo, centro_ubica.idcentro_ubica, centro_ubica.nubicacion, centro_ubica.tipo_centro, tipo.idtipo, tipo.ntipo FROM principal , unidad_estado , centro_ubica , tipo WHERE principal.idcedula = '$identprincipal' AND unidad_estado.idunidad_estado = principal.unidad_estado_idunidad_estado AND centro_ubica.idcentro_ubica = principal.centro_ubica_idcentro_ubica AND tipo.idtipo = principal.tipo_idtipo" or die("Error in the consulta.." . mysqli_error($link)); $result = mysqli_query($link, $consulta); while($row = mysqli_fetch_array($result , MYSQLI_ASSOC)) {$c3dula = $row["idcedula"]; $nombre = $row["pnombre"]; $apellido = $row["papellido"]; $apellido2 = $row["papellido2"]; $mail = $row["pcorreo"]; $nameunidad = $row["nunidad_es"]; $tipounidad = $row["unidad_tipo"]; $ubicacion = $row["nubicacion"]; $tcentro = $row["tipo_centro"]; $tipo = $row["ntipo"]; } ?> <img alt="" class="imagenactiva"> <!-- Navigation --> <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"> <div class="container import"> <!-- Brand and toggle get grouped for better mobile display --> <div class="navbar-header"> <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Navegación Principal</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="#">Certificación Jornada de Actualización en tecnología</a> </div> <!-- Collect the nav links, forms, and other content for toggling --> <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> <ul class="nav navbar-nav"> <li> <a href="close.php">Salir</a> </li> </ul> </div> <!-- /.navbar-collapse --> </div> <!-- /.container --> </nav> <!-- Page Content --> <div class="container"> <div class="col-lg-3"> <div class="row"> <div class="col-lg-12 portfolio-item"> <h2 class="page-header">Importante:<br/></h2> <h2><p class="im">1. Para descargar el Certificado de un click sobre en el enlace que corresponda al año de participación</p> <p class="im">2. Agradecemos verifique si sus datos básicos que se muestran a continuación, se encuentran correctamente diligenciados antes de realizar la publicación del certificado.</p></h2> <div class="col-lg-12 tul"> <p><strong>Nombre:</strong> <?php echo $nombre." ".$apellido." ".$apellido2; ?><br> <strong>Identificación:</strong> <?php echo $c3dula; ?><br> <strong>Email:</strong> <?php echo $mail; ?> <br> <strong>Unidad:</strong> <?php echo $nameunidad; ?> <br> <strong>Tipo de Unidad:</strong> <?php echo $tipounidad; ?> <br> <strong>Centro/Ubicación:</strong> <?php echo $ubicacion; ?> <br> </div> <div class="col-lg-12"><br/><a href="modificar.php" style="color:#fff"> <button type="button" class="btn btn-success"> Modificar Información</button></a> </div> </div> </div> </div> <div class="col-lg-9"> <!-- Page Header --> <div class="row"> <div class="col-lg-12"> <!-- <?php echo $c3dula; ?> <?php echo $nombre; ?> <?php echo $apellido; ?> <?php echo $apellido2; ?> <?php echo $mail; ?> <?php echo $nameunidad; ?> <?php echo $tipounidad; ?> <?php echo $ubicacion; ?> <?php echo $tipo; ?>--> <h1 class="page-header">Identificación: <?php echo $c3dula; ?> <br/> <small>Nombre: <?php echo $nombre." ".$apellido." ".$apellido2; ?></small> </h1> </div> </div> <!-- /.row --> <?php $imgvalidacion = "SELECT principal.idcedula, cantidad_anio.idcantidad_anio, cantidad_anio.principal_idprincipal, cantidad_anio.codigo, imgreg.imganio, imgreg.localimagen, imgreg.idimgreg FROM principal , cantidad_anio , imgreg WHERE principal.idcedula = '$identprincipal' AND cantidad_anio.principal_idprincipal = principal.idcedula AND imgreg.idimgreg = cantidad_anio.imgreg_idimgreg ORDER BY imgreg.imganio ASC" or die("Error in the consulta.." . mysqli_error($link)); $imgresult = mysqli_query($link, $imgvalidacion); $i = 0; while ($imgrow = mysqli_fetch_array($imgresult, MYSQLI_ASSOC)) {$idimgt[$i] = $imgrow["idimgreg"]; $aniot[$i] = $imgrow["imganio"]; $aniof[$i] = $imgrow["codigo"]; /*echo  $idimgt[$i];*/ /*echo $aniof[$i]; var_dump($aniot[$i]);*/ $i++; } for($j = 0; $j <= 6; $j++){if(isset($aniot[$j])){/*echo $aniot[$j] ."<br>"; echo  $idimgt[$j]."<br>";*/ if ($idimgt[$j] == 1 or $aniot[$j] == 2009) {$arrayimg[1] = 2009; } else {$arrayimg[1] = 0; } if ($idimgt[$j] == 2 or $aniot[$j] == 2011) {$arrayimg[2] = 2011; } else {$arrayimg[2] = 0; } if ($idimgt[$j] == 3 or $aniot[$j] == 2012) {$arrayimg[3] = 2012; } else {$arrayimg[3] = 0; } if ($idimgt[$j] == 4 or $aniot[$j] == 2013) {$arrayimg[4] = 2013; } else {$arrayimg[4] = 0; } if ($idimgt[$j] == 5 or $aniot[$j] == 2014) {$arrayimg[5] = 2014; } else {$arrayimg[5] = 0; } /*echo $arrayimg[1]." array 1".$arrayimg[2]." array 2".$arrayimg[3]." array 3".$arrayimg[4]." array 4".$arrayimg[5]." array 5" ."<br>"; */ if($arrayimg[1] == 2009) {$anio2009 =   'style="visibility: none;"'; $an2009 = 2009; } else if ($arrayimg[1] == 0) {$anio2009 =   'style="display: none;"'; } if($arrayimg[2] == 2011) {$anio2011 =   'style="visibility: none;"'; $an2011 = 2011; } else if ($arrayimg[2] == 0) {$anio2011 =   'style="display: none;"'; } if($arrayimg[3] == 2012) {$anio2012 =   'style="visibility: none;"'; $an2012 = 2012; } else if ($arrayimg[3] == 0) {$anio2012 =   'style="display: none;"'; } if($arrayimg[4] == 2013) {$anio2013 =   'style="visibility: none;"'; $an2013 = 2013; } else if ($arrayimg[4] == 0) {$anio2013 =   'style="display: none;"'; } if($arrayimg[5] == 2014) {$anio2014 =   'style="visibility: none;"'; $an2014 = 2014; } else if ($arrayimg[5] == 0) {$anio2014 =   'style="display: none;"'; } ?> <!-- Projects Row --> <div class="row"> <div class="col-md-12 portfolio-item" <?php echo $anio2011; ?>> <a href="#"> <img class="img-responsive" src="http://placehold.it/700x100" alt=""> </a> <h3> <a href="#"><?php echo $an2011; ?></a> </h3> </div> <div class="col-md-12 portfolio-item" <?php echo $anio2012; ?>> <a href="#"> <img class="img-responsive" src="http://placehold.it/700x100" alt=""> </a> <h3> <a href="#"><?php echo $an2012; ?></a> </h3> </div> </div> <!-- /.row --> <!-- Projects Row --> <div class="row"> <div class="col-md-12 portfolio-item" <?php echo $anio2013; ?>> <a href="#"> <img class="img-responsive" src="http://placehold.it/700x100" alt=""> </a> <h3> <a href="#"><?php echo $an2013; ?></a> </h3> </div> <div class="col-md-12 portfolio-item" <?php echo $anio2014; ?>> <a href="select2014.php" target="_blank"> <img class="img-responsive" src="img/2014_ban.jpg" alt=""> </a> <h3> <a href="select2014.php" target="_blank"><?php echo $an2014; ?></a> </h3> </div> </div> <!-- /.row --> <?php } } ?> </div> <!-- /.container --> <!-- jQuery Version 1.11.0 --> <script src="js/jquery-1.11.0.js"></script> <!-- Bootstrap Core JavaScript --> <script src="js/bootstrap.min.js"></script> </body> </html>