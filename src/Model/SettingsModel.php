<?php
namespace Settings\Model;

use Components\Model\AbstractBaseModel;

class SettingsModel extends AbstractBaseModel
{
    public $MODULE;
    public $SETTING;
    public $VALUE;
    
    public function __construct($adapter = NULL)
    {
        parent::__construct($adapter);
        $this->setTableName('settings');
    }
    
    public function get_module_settings()
    {
        $records = $this->fetchAll();
        $settings = [];
        
        foreach ($records as $record) {
            $settings[$record['SETTING']] = $record['VALUE'];
        }
        
        return $settings;
    }
}