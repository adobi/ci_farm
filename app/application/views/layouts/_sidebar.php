                <ul id = "side-navigation">
                    <?php if (in_array(
                                $this->uri->segment(1), 
                                array('stockyard', 'backgrounddata', 'eggtype', 'chickentype', 'breeder', 'breedersite', 'fakk', 'fakkgroup', 'stock', 'machine'))): ?>
                        <?php require_once '_sidebar_backgrounddata.php'; ?>
                    <?php endif ?>
                    <?php if (in_array(
                                $this->uri->segment(1), 
                                array('egg', 'eggproduction'))): ?>
                        <?php require_once '_sidebar_egg.php'; ?>
                    <?php endif ?>
                </ul>