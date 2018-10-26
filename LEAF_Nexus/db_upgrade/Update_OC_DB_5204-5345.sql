START TRANSACTION;

INSERT INTO `indicators` (`indicatorID`, `name`, `format`, `description`, `default`, `parentID`, `categoryID`, `html`, `jsSort`, `required`, `sort`, `timeAdded`, `encrypted`, `disabled`) VALUES ('27', 'Exclude from Vacancy Summary', 'radio\r\nYes\r\nNo', NULL, 'No', NULL, 'position', NULL, NULL, '1', '25', CURRENT_TIME(), '0', '0');
INSERT IGNORE INTO `indicator_privileges` (`indicatorID`, `categoryID`, `UID`, `read`, `write`, `grant`) VALUES ('27', 'group', '1', '1', '1', '1'), ('27', 'group', '2', '1', '0', '0');

UPDATE `settings` SET `data` = '5345' WHERE `settings`.`setting` = 'dbversion';
COMMIT;
