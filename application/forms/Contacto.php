<?php

class Application_Form_Contacto extends Zend_Form
{

    public function init()
    {
        $this->setMethod('post');
        
        $this->addElement('text','nombre',array(
            'label'=>'Nombre: ',
            'required'=>TRUE,
            'filters'=>array('StringTrim'),
//            'validators' => array('Alpha',)               
        ));
        $this->addElement('text','asunto',array(
            'label'=>'Asunto: ',
            'required'=>TRUE,
            'filters'=>array('StringTrim'),
//            'validators' => array('Alpha',) 
        ));
        
        $this->addElement('text','email',array(
            'label'=>'Email: ',
            'required'=>TRUE,
            'filters'=>array('StringTrim'),
            'validators' => array('EmailAddress',)
        ));
        
        $this->addElement('textarea','mensaje',array(
            'label'=>'Mensaje: ',
            'required'=>TRUE,
            'filters'=>array('StringTrim'),
//            'validators'=> array('Alpha',),
            'cols'=>'40',
            'rows'=>'6',
        ));
        
        $this->addElement('submit','Enviar',array('class'=>'btn btn-inverse'));
        $this->addElement('reset','Limpiar',array('class'=>'btn btn-inverse'));
    }


}

