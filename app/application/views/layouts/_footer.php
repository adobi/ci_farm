                <?php if ($this->session->userdata('current_user_id') && $this->uri->segment(1) !== 'welcome'): ?>
			        <p class="span-20"><a href="<?= $_SERVER['HTTP_REFERER']; ?>"><span style="font-familye:'lucida grande';font-size:1.1em">&laquo;</span> vissza az előző oldalra</a></p>
			    <?php endif ?>
			    
		        </div> <!-- content -->
		       
			<div id="footer" class = "span-24 hidden">
    		</div> <!-- footer -->
		
		</div> <!-- container -->
        <div id="loading-global">Kis türelmet...</div>
		
	</body>

</html>
