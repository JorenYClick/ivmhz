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
class Aanbod extends Home
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
    // public function index($type, $page = 0,$rpp = 10,$where = '')
    public function index($page = 0,$rpp = 10,$where = '')
    {
		// $OfficeIDList = '3415';
		$OfficeIDList = '3415';
		if($where != ''):
			$_SESSION['where'] = $where;
		endif;
		if($_GET['wr'] = '1'):
			$where = $_SESSION['where'];
		endif;
		
		if($data['searchBlock']){$data['searchBlock'] = $this->SearchForm();}
		
		$previous = $_SERVER['HTTP_REFERER'];
		
		$clientId = '1525666249';
		$request = '{"OfficeIDList":[' . $OfficeIDList . '],"ClientId":"' . $clientId . '","Page":"' . $page . '","RowsPerPage":"' . $rpp . '","Language":"nl-BE","ShowDetails":"1","PurposeIDList":[' . $type . '],"PurposteStatusIDList":[1,2,5,6],"OrderByFields":["EstateID%20DESC"]';
		if($where != ''){
			$request .= $where;
		}
		$request .= '}';
		$url = 'http://webservices.whoman2.be/websiteservices/EstateService.svc/GetEstateList?EstateServiceGetEstateListRequest=' . $request;
		// echo $url;
		// exit();
		$str = stream_get_contents(fopen($url, "rb"));
		// echo $str;
		
		// $input = iconv('UTF-8', 'UTF-8//IGNORE', utf8_encode($str));
		$input = $str;
		$json = json_decode($input, true);
		// print_r($json);
		$base_array = $json['d'];
		$data['EstateList'] = $base_array['EstateList'];
		$QueryInfo = $base_array['QueryInfo'];
		
		$RowCount = $QueryInfo['RowCount'];
		
		$Pages = $RowCount/$rpp;
		$pagination = '<ul class="pagination">';
		for($i=0;$i<=$Pages-1;$i++){
			$pagenum = $i + 1;
			$active = ($pagenum == $page+1 ? 'class = active' : '');
			if($where != ''):
				$pagination .= '<li ' . $active . '><a href="/properties/' . $type . '/' . $i . '/' . $rpp . '?wr=1">' . $pagenum . '</a></li>';
			else:
				$pagination .= '<li ' . $active . '><a href="/properties/' . $type . '/' . $i . '/' . $rpp . ' ">' . $pagenum . '</a></li>';
			endif;
			
		}
		$pagination .= '</ul>';
		$data['pagination'] = $pagination;
		$list = '';
		
		// echo $list;
		$data['list'] = $list;
		$data['previous'] = $previous;
		View::renderTemplate('header', $data);
		if($_SESSION['admin'] == 'true'):
			View::render('panden/panden3', $data);
		else:
			View::render('panden/panden2', $data);
		endif;
        View::renderTemplate('footer', $data);
    }
	
	public function detail($id){
		$OfficeIDList = '3415';
		$previous = $_SERVER['HTTP_REFERER'];
		$clientId = '1525666249';
		$request = '{"ClientId":"' . $clientId . '","EstateID":"' . $id . '","Language":"nl-BE","ShowDetails":"1"}';
		$url = 'http://webservices.whoman2.be/websiteservices/EstateService.svc/GetEstateList?EstateServiceGetEstateListRequest=' . $request;
		$str = stream_get_contents(fopen($url, "rb"));
		
		// http://webservices.whoman2.be/websiteservices/EstateService.svc/GetEstateList?EstateServiceGetEstateListResponseEstate={"ClientId":"1525666249","EstateID":"1363614","Language":"nl-BE","ShowDetails":"1"}
		
		// $input = iconv('UTF-8', 'UTF-8//IGNORE', utf8_encode($str));
		$input = $str;
		$json = json_decode($input, true);
		$base_array = $json['d'];
		// print_r($base_array);
		// exit();
		$EstateList = $base_array['EstateList'];
		$Estate = $EstateList[0];
		
		$data['images'] = $Estate['Pictures'];
		$data['estate'] = $Estate;
		$data['previous'] = $previous;
		$data['showContactForm'] = 'false';
		View::renderTemplate('header', $data);
        View::render('panden/detail', $data);
        View::renderTemplate('footer', $data);
	}	
	public function showdata()
	{
		$json = $_POST['jsonData'];
		echo(json_decode($json, true));
	}
	public function getData($page,$RowsPerPage)
	{	
		$OfficeIDList = '3415';
		$clientId = '1525666249';
		$request = '{"OfficeIDList":[' . $OfficeIDList . '],"ClientId":"' . $clientId . '","Page":"' . $page . '","RowsPerPage":"' . $RowsPerPage . '","Language":"nl-BE","ShowDetails":"1"}';
		$url = 'http://webservices.whoman2.be/websiteservices/EstateService.svc/GetEstateListXml?EstateServiceGetEstateListRequest=' . $request;
		return $url;
	}

	public function search(){
		// print_r($_POST);
		$status = $_POST['status'];
		$_SESSION['status'] = $status;
		
		$zipcodes = $_POST['hidden-zipcodes'];
		$amountFrom = $_POST['hidden-amount-from'];
		$amountTo = $_POST['hidden-amount-to'];
		$category = $_POST['type'];
		$where = '';
		// $where .= ',"PurposeIDList":[' . $type . ']';
		
		$zipcodes = rtrim($zipcodes, ',');
		$pos = strrpos($zipcodes, ',');
		if($category != '0'){
			$_SESSION['category'] = $category;
			$where .= ',"CategoryIDList":[' . $category . ']';
		}
		if($pos === false){
			$where .= ',"ZipList":[' . $zipcodes . ']';
			$_SESSION['zipCodes'] = $zipcodes;
		}elseif($zipcodes != ''){
			$where .= ',"ZipList":[' . $zipcodes . ']';
			$_SESSION['zipcodes'] = $zipcodes;
		}
		if(($amountTo > 50000 && $status == '1') || ($amountTo > 0 && $status == '2')){
			$_SESSION['amountTo'] = $amountTo;
			$_SESSION['amountFrom'] = $amountFrom;
			$where .= ',"PriceRange":[' . $amountFrom . ',' . $amountTo . ']';
		}
		$this->index($status, 0, 10, $where);
	}

}
