<?php
/*
/*****************************************************************************/
/*	@Licença para Uso:														 */
/*        Copyright 2017 Mário de Araújo Carvalho							 */
/* 																			 */
/*  Licensed under the Apache License, Version 2.0 (the "License");			 */
/*  you may not use this file except in compliance with the License.		 */
/*  You may obtain a copy of the License at									 */
/* 																			 */
/*      http://www.apache.org/licenses/LICENSE-2.0							 */
/* 																		   	 */
/*  Unless required by applicable law or agreed to in writing, software		 */
/*  distributed under the License is distributed on an "AS IS" BASIS,	     */
/*  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. */
/*  See the License for the specific language governing permissions and		 */
/*  limitations under the License.											 */
/*****************************************************************************/
/*
	@Nome: User Data Collector WEB - Biblioteca para coletação de dados.
	@Versão: 1.0.0
	
	@Autor: Mario de Araújo Carvalho 
	@E-mail: mariodearaujocarvalho@gmail.com
	
	@Descrição: 
		Classe utilitária para coletar dados so usuário para fins de seguraça. O mal 
		uso desta biblioteca fica a responsabilidade do usuário. A idéia é criar uma interface para
		coletar dados do usuário para fins de seguranção da informação. Não nós responsabilizamos
		pelos seus atos, o conhecimento não é crime, o seu mal uso é. 
		Lembre-se: "Você é o culpado de suas acções" - Jean Paul Sarte. Tenha essa frase tatuado no seu coração.
	@Funções da Biblioteca:
		01: COLETA O IP DO USUÁRIO.
		02: COLETA A DATA E HORÁRIO DE BRASÍLA QUE O USUÁRIO ACESSO O SITE.
		03: COLETA O SISTEMA OPERACIONAL DO USUARIO.
		04: COLETA O NAVEGADOR DO USUARIO.
		05. COLETA O DISPOSITIVO DO USUÁRIO.
		06. COLETA A LATITUDE E LONGITUDE DO USUÁRIO COM BASE NO IP.
		07. COLETA ALGUNS DETALHES ÚTEIS DO USUÁRIO E DO SEU NAVEGADOR
	
	@Funções Futuras:
	 I - COLETAR O ENDEREÇÕ MAC DO USUÁRIO LINUX E WINDOWS.
	
	OBS: Use com responsabilidade.
	
*/

ini_set('default_charset','UTF-8');
date_default_timezone_set('America/Sao_Paulo');

class User_Information{
	function __construct(){
		$this->dados_de_acesso = $_SERVER['HTTP_USER_AGENT'];
	}

	//01: COLETA O IP DO USUÁRIO.
	public function get_IP() {
	    $mainIp = '';
	    if (getenv('HTTP_CLIENT_IP'))
	        $mainIp = getenv('HTTP_CLIENT_IP');
	    else if(getenv('HTTP_X_FORWARDED_FOR'))
	        $mainIp = getenv('HTTP_X_FORWARDED_FOR');
	    else if(getenv('HTTP_X_FORWARDED'))
	        $mainIp = getenv('HTTP_X_FORWARDED');
	    else if(getenv('HTTP_FORWARDED_FOR'))
	        $mainIp = getenv('HTTP_FORWARDED_FOR');
	    else if(getenv('HTTP_FORWARDED'))
	       $mainIp = getenv('HTTP_FORWARDED');
	    else if(getenv('REMOTE_ADDR'))
	        $mainIp = getenv('REMOTE_ADDR');
	    else
	        $mainIp = 'UNKNOWN';
	    return $mainIp;
	}
	
	//02: COLETA A DATA E HORÁRIO DE BRASÍLA QUE O USUÁRIO ACESSO O SITE.
	public function get_Data_Horario(){
		$date_and_time = date('d/m/Y H:i:s', time());
		return $date_and_time;
	}
	
	//03: COLETA O SISTEMA OPERACIONAL DO USUARIO.
	public function get_SO() {

	    $dados_de_acesso = $this->dados_de_acesso;

	    $plataformas_de_sos    =   "Unknown OS Platform";
	    $lista_de_os       =   array(
	                            '/windows nt 10/i'     	=>  'Windows 10',
	                            '/windows nt 6.3/i'     =>  'Windows 8.1',
	                            '/windows nt 6.2/i'     =>  'Windows 8',
	                            '/windows nt 6.1/i'     =>  'Windows 7',
	                            '/windows nt 6.0/i'     =>  'Windows Vista',
	                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
	                            '/windows nt 5.1/i'     =>  'Windows XP',
	                            '/windows xp/i'         =>  'Windows XP',
	                            '/windows nt 5.0/i'     =>  'Windows 2000',
	                            '/windows me/i'         =>  'Windows ME',
	                            '/win98/i'              =>  'Windows 98',
	                            '/win95/i'              =>  'Windows 95',
	                            '/win16/i'              =>  'Windows 3.11',
	                            '/macintosh|mac os x/i' =>  'Mac OS X',
	                            '/mac_powerpc/i'        =>  'Mac OS 9',
	                            '/linux/i'              =>  'Linux',
	                            '/ubuntu/i'             =>  'Ubuntu',
	                            '/iphone/i'             =>  'iPhone',
	                            '/ipod/i'               =>  'iPod',
	                            '/ipad/i'               =>  'iPad',
	                            '/android/i'            =>  'Android',
	                            '/blackberry/i'         =>  'BlackBerry',
	                            '/webos/i'              =>  'Mobile'
	                        );

	    foreach ($lista_de_os as $repositorio => $sistema) {
	        if (preg_match($repositorio, $dados_de_acesso)) {
	            $plataformas_de_sos    =   $sistema;
	        }
	    }   
	    return $plataformas_de_sos;
	}
	
	//04: COLETA O NAVEGADOR DO USUARIO.
	function get_Browser_User() {

	    $dados_de_acesso=$this->dados_de_acesso;

	    $browser        =   "Unknown Browser";

	    $lista_de_navegadores  =   array(
	                            '/msie/i'       =>  'Internet Explorer',
	                            '/Trident/i'    =>  'Internet Explorer',
	                            '/firefox/i'    =>  'Firefox',
	                            '/safari/i'     =>  'Safari',
	                            '/chrome/i'     =>  'Chrome',
	                            '/edge/i'       =>  'Edge',
	                            '/opera/i'      =>  'Opera',
	                            '/netscape/i'   =>  'Netscape',
	                            '/maxthon/i'    =>  'Maxthon',
	                            '/konqueror/i'  =>  'Konqueror',
	                            '/ubrowser/i'   =>  'UC Browser',
	                            '/mobile/i'     =>  'Handheld Browser'
	                        );

	    foreach ($lista_de_navegadores as $repositorio => $sistema) {

	        if (preg_match($repositorio, $dados_de_acesso)) {
	            $browser    =   $sistema;
	        }

	    }

	    return $browser;

	}

	//05. COLETA O DISPOSITIVO DO USUÁRIO.
	function get_Device_User(){

	        $tablet_browser = 0;
	        $mobile_browser = 0;
	         
	        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
	            $tablet_browser++;
	        }
	         
	        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
	            $mobile_browser++;
	        }
	         
	        if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
	            $mobile_browser++;
	        }
	         
	        $mobile_ua = strtolower(substr($this->dados_de_acesso, 0, 4));
	        $mobile_agents = array(
	            'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
	            'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
	            'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
	            'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
	            'newt','noki','palm','pana','pant','phil','play','port','prox',
	            'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
	            'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
	            'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
	            'wapr','webc','winw','winw','xda ','xda-');
	         
	        if (in_array($mobile_ua,$mobile_agents)) {
	            $mobile_browser++;
	        }
	         
	        if (strpos(strtolower($this->dados_de_acesso),'opera mini') > 0) {
	            $mobile_browser++;
	            //Check for tablets on opera mini alternative headers
	            $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
	            if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
	              $tablet_browser++;
	            }
	        }
	         
	        if ($tablet_browser > 0) {
	           // Caso seja um Tablet
	           return 'Tablet';
	        }
	        else if ($mobile_browser > 0) {
	            // Caso seja um dispositivo móvel
	           return 'Mobile';
	        }
	        else {
	           // Caso seja um computador
	           return 'Computador';
	        }   
	}
	
	//06. COLETA A LATITUDE E LONGITUDE DO USUÁRIO COM BASE NO IP.
	public function getLocalizacao(){
		$ip_do_usuario = $this->get_IP();
		$geo_localizacao  = json_decode(file_get_contents("http://freegeoip.net/json/$ip_do_usuario"), true);
		
		return $geo_localizacao;
	}
	//07. COLETA ALGUNS DETALHES ÚTEIS DO USUÁRIO E DO SEU NAVEGADOR
	public function getMaisDetalhesUserAndBrowser(){
		$more_details = ($_SERVER['HTTP_USER_AGENT']);
		
		return $more_details;
	}

}