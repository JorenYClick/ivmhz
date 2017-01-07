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
class Whise extends Controller
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
		$data['url'] = $this->getData('1','10');
		$data['test'] = 'testerdetest';
        View::renderTemplate('header', $data);
        View::render('panden/whise', $data);
        View::renderTemplate('footer', $data);
    }
	
	// public function test()
    // {
		// $data['title'] = $this->language->get('welcome_text');
        // $data['welcome_message'] = $this->language->get('welcome_message');
		// $view['show'] = getData('1','10');
        // View::renderTemplate('header', $data);
        // View::render('panden/whise',$view);
        // View::renderTemplate('footer', $data);
	// }
	
	public function getData($page,$RowsPerPage)
	{	
		$OfficeIDList = '3415';
		$clientId = '1525666249';
		$request = '{"OfficeIDList":[' . $OfficeIDList . '],"ClientId":"' . $clientId . '","Page":"' . $page . '","RowsPerPage":"' . $RowsPerPage . '","Language":"nlBE","ShowDetails":"1"}';
		$url = 'http://webservices.whoman2.be/websiteservices/EstateService.svc/GetEstateListXml?EstateServiceGetEstateListRequest=' . $request;
		return $url;
	}


}
