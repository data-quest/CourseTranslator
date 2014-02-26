<?php

class EnglishTitle extends DBMigration {

    function up() {
        $query = "INSERT IGNORE INTO `datafields` (`datafield_id`, `name`, `object_type`, `object_class`, `edit_perms`, `view_perms`, `priority`, `mkdate`, `chdate`, `type`, `typeparam`) VALUES
('d2e71598fe9429367d2c3ff2d9dd8063', 'Titel Englisch', 'sem', NULL, 'tutor', 'user', 1, 1392982801, 1392982801, 'textline', '');
 ";
        DBManager::Get()->exec($query);
        
    }

}
