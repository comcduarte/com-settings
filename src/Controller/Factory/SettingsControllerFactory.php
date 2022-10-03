<?php
namespace Settings\Controller\Factory;

use Psr\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Settings\Controller\SettingsController;
use Settings\Form\SettingsForm;
use Settings\Model\SettingsModel;

class SettingsControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $adapter = $container->get('settings-model-adapter');
        
        $controller = new SettingsController();
        $model = new SettingsModel($adapter);
        $form = $container->get('FormElementManager')->get(SettingsForm::class);;
        
        $controller->setModel($model);
        $controller->setForm($form);
        $controller->setDbAdapter($adapter);
        return $controller;
    }
}