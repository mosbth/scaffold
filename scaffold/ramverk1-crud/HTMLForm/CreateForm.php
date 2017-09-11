<?php

namespace NAMESPACE\HTMLForm;

use \Anax\HTMLForm\FormModel;
use \Anax\DI\DIInterface;
use \NAMESPACE\CLASSNAME;

/**
 * Form to create an item.
 */
class CreateForm extends FormModel
{
    /**
     * Constructor injects with DI container.
     *
     * @param Anax\DI\DIInterface $di a service container
     */
    public function __construct(DIInterface $di)
    {
        parent::__construct($di);
        $this->form->create(
            [
                "id" => __CLASS__,
                "legend" => "Details of the item",
            ],
            [
                "column1" => [
                    "type" => "text",
                    "validation" => ["not_empty"],
                ],
                        
                "column2" => [
                    "type" => "text",
                    "validation" => ["not_empty"],
                ],

                "submit" => [
                    "type" => "submit",
                    "value" => "Create item",
                    "callback" => [$this, "callbackSubmit"]
                ],
            ]
        );
    }



    /**
     * Callback for submit-button which should return true if it could
     * carry out its work and false if something failed.
     *
     * @return boolean true if okey, false if something went wrong.
     */
    public function callbackSubmit()
    {
        $cLASSNAME = new CLASSNAME();
        $cLASSNAME->setDb($this->di->get("db"));
        $cLASSNAME->column1  = $this->form->value("column1");
        $cLASSNAME->column2 = $this->form->value("column2");
        $cLASSNAME->save();
        $this->di->get("response")->redirect("cLASSNAME");
    }
}
