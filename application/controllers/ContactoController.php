<?php

class ContactoController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
//        $this->view->estado4 = 'active';
        
        $contacto = new Application_Form_Contacto();
        $this->view->formulario = $contacto;
        if($this->getRequest()->isPost())
        {
            $formData = $this->getRequest()->getPost();
            if($contacto->isValid($formData))
            {
                
                
                
                $nombre=$this->_getParam('nombre', '');
                $asunto=$this->_getParam('asunto', '');
                $email=$this->_getParam('email', '');
                $mensaje=$this->_getParam('mensaje', '');

                $mail = new Zend_Mail();
    //            $mail->setBodyText('My Nice Test Text');
                $mail->setBodyHtml($mensaje);
                $mail->setFrom($email, $nombre);
                $mail->addTo('contacto@saboresdelapatagonia.cl', 'Contacto Sabores de la Patagonia');
                $mail->setSubject($asunto);
                $mail->send();
                
                $this->_redirect('/contacto/enviado');
            }
        else
            { 
                $contacto->populate($formData); 
            }         
        }
    }


}

