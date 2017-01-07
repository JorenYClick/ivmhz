<?php
namespace Controllers;

use Core\View;
use Core\Controller;

/*
 * Welcome controller
 *
 * @author David Carr - dave@simplemvcframework.com
 * @version 2.2
 * @date June 27, 2014
 * @date updated May 18 2015
 */
class Contact extends Controller
{

    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->language->load('Welcome');
    }

    /**
     * Define Index page title and load template files
     */
    public function index()
    {
		
        $data['title'] = $this->language->get('welcome_text');
        $data['welcome_message'] = $this->language->get('welcome_message');

        View::renderTemplate('header', $data);
        View::render('pages/contact');
        View::renderTemplate('footer', $data);
    }
	
	public function sendmail($data)
	{
		$Naam = $_POST['naam'];
		$Achternaam = $_POST['achternaam'];
		$Email = $_POST['email'];
		$Phone = $_POST['phone'];
		$Message = $_POST['message'];
		
		echo $_POST['naam'];
		
		$message = '<b>Naam:</b> '.$Naam.' '.$Achternaam.'<br><b>Telefoon:</b> '.$Phone.'<br><b>Bericht:</b> '.$Message;
		
		$mail = new \Helpers\PhpMailer\Mail();
		$mail->setFrom($Email);
		$mail->addAddress('info@markgrave.be');
		$mail->subject($Naam.' '.$Achternaam.' heeft een bericht verzonden');
		$mail->body($message);
		$mail->send();
		// use Helpers\PhpMailer\Mail;
		
		
		
		
		// $mail->send();
	}

}
