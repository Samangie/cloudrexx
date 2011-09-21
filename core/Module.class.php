<?php

class ModuleException extends Exception {}

class Module {
    protected $defaultAct = '';

    protected $act = '';
    protected $template = null;

    public function __construct($act, $template) {
        $this->act = $act;
        $this->template = $template;
	}

    public function getPage() {
        if($this->act == '') {
            $this->act = $this->defaultAct;
        }

        //prevent execution of non-act methods.
        if(substr($this->act, 0, 3) != 'act') {
            throw new ModuleException('acts start with "act", "' . $this->act . '" given');
        }

        //call the right act.
        $act = $this->act;
        if(method_exists($this, $act))
            $this->$act();
        else
            throw new ModuleException('unknown act: "' . $this->act . '"');
    }
}