ALTER TABLE `chickenfarm`.`breeder_site` DROP COLUMN `description` , ADD COLUMN `holding_place_id` VARCHAR(45) NULL DEFAULT NULL  AFTER `site_type` , ADD COLUMN `holding_place_name` VARCHAR(150) NULL DEFAULT NULL  AFTER `holding_place_id` , ADD COLUMN `holding_place_zip` INT(11) NULL DEFAULT NULL  AFTER `holding_place_name` , ADD COLUMN `holding_place_address` VARCHAR(255) NULL DEFAULT NULL  AFTER `holding_place_zip` , ADD COLUMN `holding_data_type` VARCHAR(150) NULL DEFAULT NULL  AFTER `holding_place_address` , ADD COLUMN `holding_data_start` DATETIME NULL DEFAULT NULL  AFTER `holding_data_type` , ADD COLUMN `holding_data_end` DATETIME NULL DEFAULT NULL  AFTER `holding_data_start` , ADD COLUMN `holding_data_count` INT(11) NULL DEFAULT NULL  AFTER `holding_data_end` , ADD COLUMN `holding_data_utilization` VARCHAR(150) NULL DEFAULT NULL  AFTER `holding_data_count` , CHANGE COLUMN `breeder_id` `breeder_id` INT(11) NULL DEFAULT NULL  AFTER `id` , CHANGE COLUMN `registration_number` `registration_number` VARCHAR(255) NULL DEFAULT NULL  AFTER `breeder_id` , CHANGE COLUMN `registered` `registered` DATETIME NULL DEFAULT NULL  AFTER `code` , CHANGE COLUMN `name` `name` VARCHAR(255) NULL DEFAULT NULL  AFTER `registered` , CHANGE COLUMN `mgszh` `mgszh` VARCHAR(10) NULL DEFAULT NULL  AFTER `enar_fax` , CHANGE COLUMN `is_deleted` `is_deleted` INT(11) NULL DEFAULT NULL  AFTER `mgszh` , CHANGE COLUMN `postal_address` `postal_address` INT(11) NULL DEFAULT NULL  , 

  ADD CONSTRAINT `fk_breeder_site_postal_zip`

  FOREIGN KEY (`postal_zip` )

  REFERENCES `chickenfarm`.`postal_code` (`id` )

  ON DELETE NO ACTION

  ON UPDATE NO ACTION, 

  ADD CONSTRAINT `fk_breeder_site_holding_place_zip`

  FOREIGN KEY (`holding_place_zip` )

  REFERENCES `chickenfarm`.`postal_code` (`id` )

  ON DELETE NO ACTION

  ON UPDATE NO ACTION

, ADD INDEX `fk_breeder_site_postal_zip` (`postal_zip` ASC) 

, ADD INDEX `fk_breeder_site_holding_place_zip` (`holding_place_zip` ASC) ;




ALTER TABLE `chickenfarm`.`breeder_site` DROP COLUMN `description` , ADD COLUMN `holding_place_id` VARCHAR(45) NULL DEFAULT NULL  AFTER `site_type` , ADD COLUMN `holding_place_name` VARCHAR(150) NULL DEFAULT NULL  AFTER `holding_place_id` , ADD COLUMN `holding_place_zip` INT(11) NULL DEFAULT NULL  AFTER `holding_place_name` , ADD COLUMN `holding_place_address` VARCHAR(255) NULL DEFAULT NULL  AFTER `holding_place_zip` , ADD COLUMN `holding_data_type` VARCHAR(150) NULL DEFAULT NULL  AFTER `holding_place_address` , ADD COLUMN `holding_data_start` DATETIME NULL DEFAULT NULL  AFTER `holding_data_type` , ADD COLUMN `holding_data_end` DATETIME NULL DEFAULT NULL  AFTER `holding_data_start` , ADD COLUMN `holding_data_count` INT(11) NULL DEFAULT NULL  AFTER `holding_data_end` , ADD COLUMN `holding_data_utilization` VARCHAR(150) NULL DEFAULT NULL  AFTER `holding_data_count` , CHANGE COLUMN `breeder_id` `breeder_id` INT(11) NULL DEFAULT NULL  AFTER `id` , CHANGE COLUMN `registration_number` `registration_number` VARCHAR(255) NULL DEFAULT NULL  AFTER `breeder_id` , CHANGE COLUMN `registered` `registered` DATETIME NULL DEFAULT NULL  AFTER `code` , CHANGE COLUMN `name` `name` VARCHAR(255) NULL DEFAULT NULL  AFTER `registered` , CHANGE COLUMN `mgszh` `mgszh` VARCHAR(10) NULL DEFAULT NULL  AFTER `enar_fax` , CHANGE COLUMN `is_deleted` `is_deleted` INT(11) NULL DEFAULT NULL  AFTER `mgszh` , CHANGE COLUMN `postal_address` `postal_address` INT(11) NULL DEFAULT NULL ;


