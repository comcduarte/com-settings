<?php
namespace Settings\Controller;

use Components\Controller\AbstractBaseController;
use Laminas\View\Model\ViewModel;

class SettingsController extends AbstractBaseController
{
    public function indexAction()
    {
        $view = new ViewModel();
        $view = parent::indexAction();
        
        return $view;
    }
}