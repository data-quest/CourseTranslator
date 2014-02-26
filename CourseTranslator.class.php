<?php

require_once __DIR__ . '/vendor/autoload.php';

class CourseTranslator extends StudIPPlugin implements SystemPlugin {

    public function __construct() {
        parent::__construct();
        if(!$this->isTranslator()) return false;
        $this->pluginClass = strtolower(__CLASS__);


        $navigation = new AutoNavigation($this->getDisplayTitle());
        $navigation->setUrl(PluginEngine::getURL($this->pluginClass . '/course/list/'), array());
        $navigation->setImage($this->getPluginURL()
                . '/public/images/header.png', array('title' => $this->getDisplayTitle()));
        Navigation::addItem('/translator', $navigation);
        $cssPath    = $this->getPluginURL() . '/assets/css/style.css';
        PageLayout::addStylesheet($cssPath);
    }

    public function getDisplayTitle() {
        return _('Course Translator');
    }

    /**
     * This method dispatches all actions.
     *
     * @param string   part of the dispatch path that was not consumed
     */
    function perform($unconsumed_path) {
        $trails_root                = $this->getPluginPath();
        $dispatcher                 = new Trails_Dispatcher($trails_root, NULL, NULL);
        $dispatcher->current_plugin = $this;
        $dispatcher->dispatch($unconsumed_path);
    }
    private function isTranslator(){
        
        if (RolePersistence::isAssignedRole($GLOBALS['user']->id, 'Translator')) {
            return true;
        }
         if ($GLOBALS['perm']->have_perm('root')) {
            return true;
        }
        return false;
    }
}
