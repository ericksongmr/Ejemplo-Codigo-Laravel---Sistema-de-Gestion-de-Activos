<?php

return [

	'title_app'      => 'Blog de Entrenimiento Manga y Anime!',
	'title_articles' => 'Gestión de Artículos',
	'save-message'   => 'Registro guardado exitosamente!',
	'update-message' => 'Registro actualizado exitosamente!',
	'delete-message' => 'Registro eliminado exitosamente!',
	'new_article'    => 'Nuevo Artículo',
	'update_article' => 'Actualizar Artículo',
	'header' => '
	<!DOCTYPE html>
	<html lang="es">
	  <head>
	    <meta charset="utf-8">
	    <title>:title</title>
	    <link rel="stylesheet" href="./app/plugins/pdf-invoice/export.css" media="all" />
	  </head>
	  <body>
	    <header class="clearfix">
	      <div id="logo">
	        <img src="./app/img/logo.png"><br>
	        CORPORACIÓN JUJEDU E.I.R.L.
	      </div>
	      <h1>:title</h1>
	      <div id="company" class="clearfix">
	        <div>CORPORACIÓN JUJEDU E.I.R.L.</div>
	        <div>A-H Jose Aberlardo Quiñones,<br />MZ-12A, Talara, Piura</div>
	        <div>Telf: (073) 384766</div>
	        <div><a href="mailto:corporacionjujedu@outlook.com">corporacionjujedu@outlook.com</a></div>
	      </div>
	      <div id="project">
	        <div><span>USUARIO</span> <div class="user">'.Auth::user()->name.'</div></div>
	        <div><span>E-MAIL</span> <div class="user">'.Auth::user()->email.'</div></div>
	        <div><span>TIPO</span> <div class="user">'.Auth::user()->type.'</div></div>
	        <div><span>FECHA</span> <div class="user">'.date('d-m-Y').'</div></div>
	        <div><span>HORA</span> <div class="user">'.date('H:i').'</div></div>
	      </div>
	    </header>
	    <main>',
	      
	    'footer' => '</main>
	    <footer>
	      CORPORACIÓN JUJEDU E.I.R.L. A-H Jose Aberlardo Quiñones MZ-12A, Talara, Piura - Telf: (073) 384766
	    </footer>
	  </body>
	</html>
	'
];