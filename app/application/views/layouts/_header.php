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

        <!--
		<script type="text/javascript" charset="utf-8" src = "http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
        <script type="text/javascript" charset="utf-8" src = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.js"></script>
        -->
		<script type="text/javascript" charset="utf-8" src = "<?= base_url() ?>js/jquery.min.js"></script>
        <script type="text/javascript" charset="utf-8" src = "<?= base_url() ?>js/jquery-ui.min.js"></script>
        <script type="text/javascript" charset="utf-8" src = "<?= base_url() ?>js/jquery.cookie.js"></script>

        <script type="text/javascript" charset="utf-8" src = "<?= base_url() ?>js/app.js"></script>
        <script type="text/javascript" charset="utf-8" src = "<?= base_url() ?>js/egg.js"></script>
        <script type="text/javascript" charset="utf-8" src = "<?= base_url() ?>js/hatching.js"></script>
        <script type="text/javascript" charset="utf-8" src = "<?= base_url() ?>js/run.js"></script>

        <script type="text/javascript">
            App.URL = '<?= base_url() ?>';
        </script>
	</head>
	
	<body>
	    
		<div id="container" class = "container" 
		    <?php if (!$this->session->userdata('current_user_id')) : ?>
		        style = "background:#f1f1f1;"
		    <?php endif; ?>
		>
			<?php if ($this->session->userdata('current_user_id')) : ?>
        		<div id = "header" class = "span-24 _ui-widget-header ui-corner-all">
        		    <div class = "prepend-2 span-20 append-2">
            			<ul id = "header-menu" class = "span-20">
            			    <!--<li>
            			        <a href="<?= base_url(); ?>welcome">kezdőlap</a>
            			    </li>-->
            			    <li>
            			        <a href="<?= base_url(); ?>egg" <?= $this->uri->segment(1) === "egg" ? 'class = "selected-header-menu-item"' : ''; ?>>tojástermelés</a>
            			    </li>
            			    <li>
            			        <a href="<?= base_url(); ?>hatching" <?= $this->uri->segment(1) === "hatching" ? 'class = "selected-header-menu-item"' : ''; ?>>keltetés</a>
            			    </li>
            			    <li>
            			        <a href="<?= base_url(); ?>">nevelés</a>
        			        </li>
        			        <li>
        			            <a href="<?= base_url(); ?>">értékesítés</a>
        			        </li>
        			        <li>
        			            <a href="<?= base_url(); ?>backgrounddata" <?= in_array(
                                $this->uri->segment(1), 
                                array('stockyard', 'backgrounddata', 'eggtype', 'chickentype', 'breeder', 'breedersite', 'fakk', 'fakkgroup', 'stock', 'machine')) ? 'class = "selected-header-menu-item"' : ''; ?>>háttér adatok</a>
        			        </li>
        			        <li>
        			            <a href="<?= base_url(); ?>auth/logout">kilépes</a>
        			        </li>			        
            			</ul>
        		    </div>
        		</div> <!-- header -->
        		
    			<div id = "sidebar" class = "span-4 ui-corner-all">
    
                    <?php require_once '_sidebar.php'; ?>
    
    			</div> <!-- sidebar -->
    		<?php else: ?>
    		    
			<?php endif; ?>
			<div id="content" class = "span-20 last"
    		    <?php if (!$this->session->userdata('current_user_id')) : ?>
    		        style = "width: 940px;"
    		    <?php endif; ?>			
			>
			    