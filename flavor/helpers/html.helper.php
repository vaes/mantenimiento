<?php 
/* 	===========================
	FlavorPHP 2.0
	git repository: https://github.com/FlavorPHP/FlavorPHP-2.0

	FlavorPHP 2.0 is a free software licensed under the MIT license	
	============================ */
?>
<?php

class html extends singleton {

	protected $registry;
	protected $validateErrors;
	protected $path;
	public $type = "views";

	public function __construct() {
		$this->registry = registry::getInstance();
		$this->path = $this->registry["path"];
	}

	public function useTheme($name) {
		$this->type = $name;
		$this->type= "themes/".$this->type;
	}

	public static function getInstance($class = null) {
		return parent::getInstance(get_class());
	}

	public function includeCanonical($url = "") {
		$canonical = "<link rel=\"canonical\" href=\"".$this->path.$url."\" />";
		return $canonical;
	}

	public function charsetTag($charSet) {		
		$charSet = "<meta charset=\"".$charSet."\">"; // updated for HTML5
		return $charSet;
	}

	public function includeCss($css) {
		$css = "<link rel=\"stylesheet\" href=\"".$this->path.APPDIR."/".$this->type."/css/".$css.".css\" type=\"text/css\" />\n";
		return $css;
	}

	public function includeCssAbsolute($css) {
		$css = "<link rel=\"stylesheet\" href=\"".$this->path.APPDIR."/libs/".$css.".css\" type=\"text/css\" />\n";
		return $css;
	}

	public function includeJs($js) {
		if($this->type == "views"){
			$js = "<script type=\"text/javascript\" src=\"" . $this->path . APPDIR."/libs/js/" . $js . ".js\"></script>\n";
		}else{
			$js = "<script type=\"text/javascript\" src=\"" . $this->path . APPDIR."/" . $this->type . "/js/" . $js . ".js\"></script>\n";
		}
		return $js;
	}

	public function includeJsAbsolute($js) {
		$js = "<script type=\"text/javascript\" src=\"".$js."\"></script>\n";
		return $js;
	}
	
	public function includeFavicon($icon="favicon.ico") {
		$favicon = "<link rel=\"shortcut icon\" href=\"".$this->path.APPDIR.'/'.$this->type."/images/".$icon."\" />\n";
		return $favicon;
	}

	public function includeRSS($rssUrl="feed/rss/") {
		$rss = "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"RSS 2.0\" href=\"".$this->path.$rssUrl."\" />\n";
		return $rss;
	}

	public function includeATOM($atomUrl="feed/atom/") {
		$atom = "<link rel=\"alternate\" type=\"application/atom+xml\" title=\"Atom 1.0\" href=\"".$this->path.$atomUrl."\" />\n";
		return $atom;
	}

	public function validateError($field) {		
		$html = "";
		$this->validateErrors = $this->registry->validateErrors;
		if (!is_null($this->validateErrors)) {
			if ($val = $this->findInArray($this->validateErrors, $field) ) {
				$html = "<div class=\"error\">".$val."</div>";
				$this->unsetError($field);
			}
		}		
		return $html;
	}

	/* Esta función es para ser utilizada por validateError($field){...} */
	private function unsetError($field){
		if(is_array($this->registry->validateErrors)){
			foreach($this->registry->validateErrors as $k => $v){
				if(is_array($v)){
					foreach($v as $kk => $vv){
						if($kk == $field){
							$this->registry->offsetUnset("validateErrors[$k][$kk]");
						}
					}
				}
			}
		}
		return false;
	}
	
	private function findInArray($arr, $str) {
		$response = "";
		foreach ($arr as $key=>$element){
			foreach ($element as $name=>$value){
				if ($name == $str) {
					$response = $value['message'];
				}
			}    
		}
		return $response;
	}

	public function form($url, $method="POST" , $html_attributes = ""){
		$url = (substr($url,-1,1)!="/")?$url."/":$url;
		return "<form action=\"".$this->path.$url."\" method=\"" . $method. "\" " . $html_attributes .">";
	}
	
	public function formAbsolute($url, $method="POST" , $html_attributes = ""){
		$url = (substr($url,-1,1)!="/")?$url."/":$url;
		return "<form action=\"".$url."\" method=\"" . $method. "\" " . $html_attributes .">";
	}

	public function formFiles($url){
		$url = (substr($url,-1,1)!="/")?$url."/":$url;
		return "<form action=\"".$this->path.$url."\" method=\"post\" enctype=\"multipart/form-data\">";
	}

	public function linkTo($text, $url="", $html_attributes="", $absolute = false) {
		if (!is_file($url)) {		
			$url = (substr($url,-1,1)!="/")?$url."/":$url;
		}
		$html = "<a href=\"".(!$absolute?$this->path:'').$url;
		$html .= "\"";
		$html .= " $html_attributes ";
		$html .= ">".$text."</a>";
		return $html;
	}
	public function linkToSpan($text, $url="", $html_attributes="", $absolute = false) {
		if (!is_file($url)) {		
			$url = (substr($url,-1,1)!="/")?$url."/":$url;
		}
		$html = "<a href=\"".(!$absolute?$this->path:'').$url;
		$html .= "\"";
		$html .= " $html_attributes ";
		$html .= "><span>".$text."</span></a>";
		return $html;
	}

	public function linkToConfirm($text, $url="", $html_attributes=""){
		$url = (substr($url,-1,1)!="/")?$url."/":$url;
		$html = $this->linkTo($text, $url, " onclick=\"return confirm('\u00BFConfirma eliminar?');\" $html_attributes ");
		return $html;
	}

	public function image($name, $alt="", $html_attributes=""){
		return "<img src=\"".$this->path.APPDIR.'/'.$this->type."/images/".$name."\" alt=\"".$alt."\" title=\"".$alt."\"".$html_attributes."\" />";
	}

	public function imagePars($name, $extra=""){
		return "<img src=\"".$this->path.APPDIR.'/'.$this->type."/images/".$name."\" ".$extra." />";
	}
	
	public function acceptCancelButtons($text, $url="#", $wrapper="div") {
		$html = "<".$wrapper." class=\"buttons\">";		
		$html .= $this->cancelButton($text[1], $url);
		$html .= $this->acceptButton($text[0]);
		$html .= "</".$wrapper.">";
		return $html;
	}
	
	public function acceptButton($text) {		
		$html = "<button type=\"submit\" class=\"positive\">";
		$html .= $this->image("tick.png");
		$html .= $text;
		$html .= "</button>";
		return $html;		
	}
	
	public function cancelButton($text, $url="#") {
		$url = (substr($url,-1,1)!="/")?$url."/":$url;
		$html = $this->imageLink($text, $url, "class=\"negative\"", "cross.png");
		return $html;
	}
	
	public function editRemoveButtons($text, $urls, $id, $wrapper="div") {
		$html = "<".$wrapper." class=\"buttons\">";
		$html .=  $this->createImageButton($text[0], "page_edit.png", $urls[0]);
		$html .= $this->createImageButtonConfirm($text[1], "delete.png", $urls[1]);
		$html .= "</".$wrapper.">";
		return $html;
	}

	public function createImageButton($text, $image, $url="#", $wrapper=NULL, $html_attributes="") {
		$html = "";
		if (isset($wrapper)) {
			$html .= "<".$wrapper." class=\"buttons\">";
		}
		$html .= $this->imageLink($text, $url, $html_attributes, $image);
		if (isset($wrapper)) {
			$html .= "</".$wrapper.">";
		}
		return $html;
	}
	
	public function createImageButtonConfirm($text, $image, $url="#", $wrapper=NULL) {
		$html = "";
		if (isset($wrapper)) {
			$html .= "<".$wrapper." class=\"buttons\">";
		}
		$html .= $this->imageLinkConfirm($text, $url, $image);
		if (isset($wrapper)) {
			$html .= "</".$wrapper.">";
		}
		return $html;
	}	

	public function imageLink($text, $url="#", $html_attributes="", $name, $alt=""){
		if (!is_file($url)) {
			$url = (substr($url,-1,1)!="/")?$url."/":$url;
		}
		$html = "<a href=\"".$this->path.$url;
		$html .= "\"";
		$html .= " $html_attributes ";
		$html .= ">";
		$html .= "<img src=\"".$this->path.APPDIR.'/'.$this->type."/images/".$name."\" alt=\"".$alt."\" title=\"".$alt."\" />".$text;
		$html .= "</a>";
		return $html;
	}

	public function imageLinkConfirm($text, $url="", $name, $alt=""){
		$html = $this->imageLink($text,$url,"onclick=\"return confirm('\u00BFConfirma eliminar?');\"",$name,$alt);
		return $html;
	}

	public function checkBox($name, $html_attributes="") {		
		$html = "<input type='checkbox' name='".$name."'";
		$html .= $html_attributes;
		$html .= " />\n";		
		return $html;
	}
		
	public function radioButton($name, $value, $html_attributes=""){		
		$html = "<input type='radio' value='".$value."' name='".$name."' ";
		$html .= $html_attributes;
		$html .= " />";		
		return $html;
	}

	/**
	 * @deprecated deprecated since version 2.0
	 */
	public function textField($name, $html_attributes="") {
		trigger_error('Deprecated function, use textInput instead', E_USER_NOTICE);		
		$html = "<input type='text' name='".$name."' id='".$name."' ";
		$html .= $html_attributes;
		$html .= " />";		
		return $html;
	}
	
	public function textInput($name, $value, $html_attributes="") {
		$html = "<input type='text' value='".$value."' name='".$name."' id='".$name."'";
		$html .= $html_attributes;
		$html .= " />";		
		return $html;
	}	
	
	public function textArea($name, $value="", $html_attributes="") {		
		$html = "<textarea id='".$name."' name='".$name."' ";
		$html .= $html_attributes;
		$html .= ">";
		$html .= $value;
		$html .= "</textarea>";		
		return $html;
	}
	
	public function hiddenField($name, $value, $html_attributes="") {
		$html = "<input type='hidden' name='".$name."' value='".$value."'";
		$html .= $html_attributes;
		$html .= " />";
		return $html;
	}
	
	public function passwordField($name, $html_attributes=""){
		$html = "<input type=\"password\" name=\"".$name."\" ";
		$html .= $html_attributes;
		$html .= " />";
		return $html;
	}
	
	public function select($name, $values, $selected="", $numericKey=false, $html_attributes="") {		
		$html = "<select name='".$name."' ".$html_attributes.">\n";
		foreach ($values as $key=>$value){
			$html .= "\t<option ";
			if (!$numericKey) {
				if (is_numeric($key)){
					$key = $value;
				}
			}
			$html .= " value=\"$key\"";
			if($selected==$key){
				$html .= " selected=\"selected\"";
			}
			$html .= ">$value</option>\n";
		}		
		$html .= "</select>\n";		
		return $html;
	}
	
	public function tag($name, $html_attributes="") {
		$html = "<".$name."' ";
		$html .= $html_attributes;
		$html .= " /".$name.">";
	}
}
?>