                <ul id = "side-navigation">
                    <?php if (in_array(
                                $this->uri->segment(1), 
                                array('cast', 'stockyard', 'backgrounddata', 'eggtype', 'chickentype', 'breeder', 'breedersite', 'fakkgroup', 'stock', 'machine', 'delivery', 'chickenstock'))): ?>
                        <?php require_once '_sidebar_backgrounddata.php'; ?>
                    <?php endif ?>
                    <?php if (in_array(
                                $this->uri->segment(1), 
                                array('egg', 'eggproduction'))): ?>
                        <?php require_once '_sidebar_egg.php'; ?>
                    <?php endif ?>
                    <?php if (in_array(
                                $this->uri->segment(1), 
                                array('hatching'))): ?>
                        <?php require_once '_sidebar_hatching.php'; ?>
                    <?php endif ?>
                    <?php if (in_array(
                                $this->uri->segment(1), 
                                array('education', 'fakk'))): ?>
                        <?php require_once '_sidebar_education.php'; ?>
                    <?php endif ?>                    
                </ul>