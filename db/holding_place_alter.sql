CREATE  TABLE IF NOT EXISTS `chickenfarm`.`holding_capacity` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `type` VARCHAR(150) NULL ,
  `size` INT NULL ,
  `created` DATETIME NULL ,
  `breeder_site_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_holding_capacity_breeder_site` (`breeder_site_id` ASC) ,
  CONSTRAINT `fk_holding_capacity_breeder_site`
    FOREIGN KEY (`breeder_site_id` )
    REFERENCES `chickenfarm`.`breeder_site` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8