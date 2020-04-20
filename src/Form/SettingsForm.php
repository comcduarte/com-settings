<?php
namespace Settings\Form;

use Components\Form\AbstractBaseForm;
use Laminas\Form\Element\Text;

class SettingsForm extends AbstractBaseForm
{
    public function init()
    {
        parent::init();
        
        $this->add([
            'name' => 'MODULE',
            'type' => Text::class,
            'attributes' => [
                'class' => 'form-control',
                'id' => 'MODULE',
                'required' => 'true',
                'placeholder' => '',
            ],
            'options' => [
                'label' => 'Module',
            ],
        ],['priority' => 100]);
        
        $this->add([
            'name' => 'SETTING',
            'type' => Text::class,
            'attributes' => [
                'class' => 'form-control',
                'id' => 'SETTING',
                'placeholder' => '',
            ],
            'options' => [
                'label' => 'Setting',
            ],
        ],['priority' => 100]);
        
        $this->add([
            'name' => 'VALUE',
            'type' => Text::class,
            'attributes' => [
                'class' => 'form-control',
                'id' => 'VALUE',
                'placeholder' => '',
            ],
            'options' => [
                'label' => 'Value',
            ],
        ],['priority' => 100]);
    }
}