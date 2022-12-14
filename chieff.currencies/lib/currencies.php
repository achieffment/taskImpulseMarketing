<?php

namespace chieff\currencies;

use \Bitrix\Main\Entity;
use \Bitrix\Main\Type;

class CurrenciesTable extends Entity\DataManager {

    public static function getTableName() {
        return "chieff_currencies_currencies_table";
    }

    public static function getConnectionName() {
        return "default";
    }

    public static function getMap() {
        return Array(
            new Entity\IntegerField(
                "ID",
                Array(
                    "primary" => true,
                    "autocomplete" => true,
                )
            ),
            new Entity\StringField(
                "CODE",
                Array(
                    "required" => true,
                )
            ),
            new Entity\DatetimeField(
                "DATE",
                Array(
                    "required" => true,
                )
            ),
            new Entity\FloatField(
                "COURSE",
                Array(
                    "required" => true,
                )
            ),
        );
    }

    public static function onAfterAdd(Entity\Event $event) {
        CurrenciesTable::clearCache();
    }

    public static function onAfterUpdate(Entity\Event $event) {
        CurrenciesTable::clearCache();
    }

    public static function onAfterDelete(Entity\Event $event) {
        CurrenciesTable::clearCache();
    }

    public function clearCache() {
        global $CACHE_MANAGER;
        $CACHE_MANAGER->clearByTag('currencies_tag');
    }

}