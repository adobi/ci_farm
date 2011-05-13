<!DOCTYPE html>
<html xml:lang="hu">

	<head>
		
		<title>Chickenfarm</title>

		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
		
		<link rel="stylesheet" href="<?= base_url() ?>css/screen.css" type="text/css" media="screen"charset="utf-8">
		<link rel="stylesheet" href="<?= base_url() ?>css/print.css" type="text/css" media="print"charset="utf-8">
		<!--[if lt IE 8]><link rel="stylesheet" href="<?= base_url() ?>css/ie.css" type="text/css" media="screen, projection"><![endif]-->
		
        <link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui-1.8.7.custom.css" type="text/css" media="screen"charset="utf-8">
        
        <link rel="stylesheet" href="<?= base_url() ?>css/page.css" type="text/css" media="screen"charset="utf-8">
        
		<script type="text/javascript" charset="utf-8" src = "http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript" charset="utf-8" src = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.js"></script>
        
        <script type="text/javascript" charset="utf-8" src = "<?= base_url() ?>app.js"></script>
        
        
        
        <script type="text/javascript" charset="utf-8" src = "<?= base_url() ?>bootstrap.js"></script>
	</head>
	
	<body>
	    
		<div id="container" class = "container">
			<?php if ($this->session->userdata('current_user_id')) : ?>
        		<div id = "header" class = "span-24">
        		    <div class = "prepend-3 span-18 append-3">
            			<ul id = "header-menu" class = "span-18">
            			    <li>
            			        <a href="<?= base_url(); ?>">kezdolap</a>
            			    </li>
            			    <li>
            			        <a href="<?= base_url(); ?>">tojastermeles</a>
            			    </li>
            			    <li>
            			        <a href="<?= base_url(); ?>">keltetes</a>
            			    </li>
            			    <li>
            			        <a href="<?= base_url(); ?>">neveles</a>
        			        </li>
        			        <li>
        			            <a href="<?= base_url(); ?>">ertekesites</a>
        			        </li>
        			        <li>
        			            <a href="<?= base_url(); ?>auth/logout">kilepes</a>
        			        </li>			        
            			</ul>
        		    </div>
        		</div> <!-- header -->
        		
    			<div id = "sidebar" class = "span-4">
    
                    <?php require_once '_sidebar.php'; ?>
    
    			</div> <!-- sidebar -->
    		<?php else: ?>
    		    <p>&nbsp;</p>
			<?php endif; ?>
			<div id="content" class = "span-20 last">
			    