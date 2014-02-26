<?php
require_once 'app/controllers/studip_controller.php';
class IndexController extends StudipController {

    /**
     * @var CourseTranslator 
     */
    protected $plugin;
    protected $config;

    public function before_filter(&$action, &$args) {
        parent::before_filter($action, $args);
        $layout       = $GLOBALS['template_factory']->open('layouts/base');
        $this->set_layout($layout);
        $this->plugin = $this->dispatcher->current_plugin;
        //no chance to inject configs into controller
        $this->config  = require_once __DIR__ . '/../config/production.php';
        
       
    }
    public function url_for($to,array $params = array()) {
        return PluginEngine::getURL($this->plugin->pluginClass,$params,$to);
       
    }
}
