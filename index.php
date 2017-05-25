<?php 
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
	/*Exemplo de utilização da biblioteca*/
	
	//Codificação da Página
	ini_set('default_charset','UTF-8');
	
	//Inclusão da biblioteca User Data Collector WEB 1.0.0
	include_once('UserInformation.php'); // Nome da Classe igual ao nome do arquivo!
	use UserDataCollector\UserInformation as InfosUser; // Posso nomear como bem entender ao usar namespace
    
	//Definição da zona para poder pegar o horário do usuário.
	date_default_timezone_set('America/Sao_Paulo');

	//Instancia da Classe UserInformation
	$user_informations = new InfosUser();
	
	//Coletando o horário
	echo 'Horário de Acesso (Brasília): '.$user_informations->get_Data_Horario();
	echo("<br>");
	//Coletando o IP (Internet Protocol) do usuário
	echo 'IP do Usuário: '.$user_informations->get_IP();
	echo("<br>");
	//Coletando o Sistema Operacional do usuário
	echo 'Sistema Operacional: '.$user_informations->get_SO();
	echo("<br>");
	//Coletando
	echo 'Navegador(Browser): '.$user_informations->get_Browser_User();
	echo("<br>");
	//Coletando detalhes sobre o navegador e Sistema Operacional do usuário
	echo 'Mais detalhes sobre o navegador e SO: '.$user_informations->getMaisDetalhesUserAndBrowser();
	echo("<br>");
	//Coletando o disposivo do usuário
	echo 'Dispositivo de Acesso: '.$user_informations->get_Device_User();
	echo("<br>");
	
	/**Coletando a geolocalizacao**/
	$geo_localizacao  = $user_informations->getLocalizacao();
	//Coletando a latitude do usuário
	echo 'Latitude: '.$geo_localizacao['latitude'];
	echo("<br>");
	//Coletando a longitude do usuário
	echo 'Longitude: '.$geo_localizacao['longitude'];
	echo("<br>");
	
	/**Agora basta você popular uma tabela com os dados do usuário ou armazenar em arquivo.
	/**Nesse exemplo vamos popular um arquivo de texto.txt que se encontra em "logs/log.txt"
	***/
	
	//Definimos uma constante que conterá a localização final do nosso arquivo no servido!
	define("ARQUIVO_DE_LOG","logs/log.txt");

	if(file_exists(ARQUIVO_DE_LOG) == true){//Se o arquivo existir nos abrimos
		$log = fopen(ARQUIVO_DE_LOG,"a");
	}else{//Senão nós criamos
		$log = fopen(ARQUIVO_DE_LOG,"x+");
		fwrite($log, "Nome da biblioteca: UserDataCollectorWEB "."\r\n");
		fwrite($log, "Versão: 1.0.0"."\r\n");
		fwrite($log, "Autor: Mário de Araújo Carvalho"."\r\n");
		fwrite($log, "Descrição: Biblioteca para coleta de dados WEB"."\r\n");
		fwrite($log, "Exemplo dos dados coletados abaixo"."\r\n");
		fwrite($log, "------------------------------------------------"."\r\n");
		fwrite($log, "------------------------------------------------"."\r\n");
		fwrite($log, "IP:"."        "."HORARIO:"."             "."SO:"."      "."BROWSER:"." "."\r\n");
	}
	//Agora é só inserir os dados desejados no arquivo.
	fwrite($log, $user_informations->get_IP()." ".$user_informations->get_Data_Horario()." ".$user_informations->get_SO()." ".$user_informations->get_Browser_User()."\r\n");
	
	
	/**THE END - :) */
	
?>