<?php

class Modal
{
    private $db;

    private $id;
    private $title;

    private $isStatic;
    private $closeButton;

    private $content;
    private $additionalClasses;

    private $buttons = [];

    function __construct($db, $id, $title, $content, $buttons = [], $isStatic = false, $closeButton = true, $additionalClasses = "") {
        $this->db = $db;
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->buttons = $buttons;
        $this->isStatic = $isStatic;
        $this->closeButton = $closeButton;
        $this->additionalClasses = $additionalClasses;
    }

    function getId()
    {
        return $this->id;
    }

    function getModal(){
        $closeButton = "";
        if($this->closeButton){
            $closeButton = '<div class="closeModal"><svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="9.89941" y1="25.4559" x2="25.4558" y2="9.89956" stroke="#666666" stroke-width="3" stroke-linecap="round"/>
                <line x1="25.4558" y1="25.4559" x2="9.89948" y2="9.89955" stroke="#666666" stroke-width="3" stroke-linecap="round"/>
            </svg></div>';
        }
        if(sizeof($this->buttons) > 0){
            $buttons = '<div class="modal-footer">';
            foreach ($this->buttons as $button) {
                $buttons .= $button;
            }
            $buttons .= '</div>';
        } else {
            $buttons = "";
        }
        $isStatic = "";
        if($this->isStatic){
            $isStatic = " static";
        }
        $modal = 
        '<div class="modal-container'.$isStatic.'" id="'.$this->id.'">
            <div class="modal '.$this->additionalClasses.'">
            <div class="modal-header">
                <div class="modal-title">'.$this->title.'</div>'.$closeButton.'
            </div>
            <div class="modal-body">
                <div class="modal-content">'.$this->content.'</div>
            </div>
            '.$buttons.'
            </div>
        </div>';
        return $modal;
    }

    function setContent($content) {
        $this->content = $content;
    }
}

?>