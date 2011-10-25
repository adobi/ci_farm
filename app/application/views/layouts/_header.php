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
        <script type="text/javascript" charset="utf-8" src = "<?= base_url() ?>js/jquery.watermark.min.js"></script>
        <script type="text/javascript" charset="utf-8" src = "<?= base_url() ?>js/jquery.scrollto.min.js"></script>
        
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
		    <?php if ($this->uri->segment(1) === 'welcome') : ?>
		        style = "background:#f1f1f1;"
		    <?php endif; ?>
		>
			<?php if ($this->session->userdata('current_user_id')) : ?>
        		<div id = "header" class = "span-24 _ui-widget-header ui-corner-all">
        		    <div class = "prepend-2 span-20 append-2">
            			<ul id = "header-menu" class = "span-20">
            			    <li>
            			        <a href="<?= base_url(); ?>welcome"><img src="<?= base_url(); ?>img/home.png" alt="" width=24 height=24></a>
            			    </li>
            			    <li>
            			        <a href="<?= base_url(); ?>" <?= $this->uri->segment(1) === "egg" ? 'class = "selected-header-menu-item"' : ''; ?>>tojástermelés</a>
            			    </li>
            			    <li>
            			    <!-- hatching -->
            			        <a href="<?= base_url(); ?>" <?= $this->uri->segment(1) === "hatching" ? 'class = "selected-header-menu-item"' : ''; ?>>keltetés</a>
            			    </li>
            			    <li>
            			        <a href="#">nevelés</a>
        			        </li>
        			        <li>
        			            <a href="#">értékesítés</a>
        			        </li>
        			        <li>
        			            <a href="<?= base_url(); ?>backgrounddata" <?= in_array(
                                $this->uri->segment(1), 
                                array('stockyard', 'backgrounddata', 'eggtype', 'chickentype', 'breeder', 'breedersite', 'fakk', 'fakkgroup', 'stock', 'machine')) ? 'class = "selected-header-menu-item"' : ''; ?>>háttér adatok</a>
        			        </li>
        			        <li>
        			            <a href="<?= base_url(); ?>auth/logout" style="color:#554444;">kilépes <span style="font-family:'lucida grande'">&raquo;</span></a>
        			        </li>			        
            			</ul>
        		    </div>
        		</div> <!-- header -->
        		<?php if ($this->uri->segment(1) !== 'welcome'): ?>
        		    
        			<div id = "sidebar" class = "span-4 ui-corner-all">
        
                        <?php require_once '_sidebar.php'; ?>
        
        			</div> <!-- sidebar -->
        		<?php else: ?>
                    <div class="prepend-4"></div>
        		<?php endif ?>
    		<?php else: ?>
    		    
			<?php endif; ?>
			<div id="content" class = "span-<?= $this->uri->segment(1) === 'welcome' ? '24' : '20 box-shadow' ?> last"
    		    <?php if (!$this->session->userdata('current_user_id')) : ?>
    		        style = "width: 950px;"
    		    <?php endif; ?>			
			>
			    <?php if ($this->session->userdata('current_user_id') && $this->uri->segment(1) !== 'welcome'): ?>
			        <p class="span-20"><a href="<?= @$_SERVER['HTTP_REFERER']; ?>"><span style="font-familye:'lucida grande';font-size:1.1em">&laquo;</span> vissza az előző oldalra</a></p>
			    <?php endif ?>
			        