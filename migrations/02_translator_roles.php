<?php

class TranslatorRoles extends DBMigration {

    function up() {
        $role       = new Role();
        $role->setRolename('Translator');
        $persitence = new RolePersistence();
        $persitence->saveRole($role);
    }

}
