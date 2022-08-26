<?php

namespace itzdapakrep/lightningtp;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase {


    public $data;

    public function onEnable(){
        $this->data = new Config($this->getDataFolder() . "data.json", Config::JSON, array());
    }

    public function onDisable(){

    }

}