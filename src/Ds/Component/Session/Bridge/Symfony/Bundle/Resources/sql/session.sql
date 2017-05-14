CREATE TABLE `ds_session` (
    `id` VARCHAR(128) NOT NULL PRIMARY KEY,
    `data` BLOB NOT NULL,
    `time` INTEGER UNSIGNED NOT NULL,
    `lifetime` MEDIUMINT NOT NULL
) COLLATE utf8_bin, ENGINE = InnoDB;
