# UserDataCollectorWEB
<strong>UserDataCollectorWEB 1.0.0 - Is Utility library for client data collection on PHP pages.</strong>

<pre>
@Nome: User Data Collector WEB - Biblioteca para coletação de dados.
@Mini-Descrição: É uma biblioteca utilitária para coletar dados do cliente em páginas online PHP.
@Versão: 1.0.0

@Autor: Mario de Araújo Carvalho 
@E-mail: mariodearaujocarvalho@gmail.com

@Descrição: 
Classe utilitária para coletar dados do usuário para <b>fins de segurança</b>. O mal 
uso desta biblioteca fica a responsabilidade do usuário. A ideia é criar uma interface para
coletar dados do usuário para fins de seguranção da informação. <i>Não nós responsabilizamos
pelos seus atos, o conhecimento não é crime, o seu mal uso é</i>. 
Lembre-se: <strong>"Você é o culpado de suas ações"</strong><i>- Jean Paul Sarte.</i> Tenha essa frase tatuada em seu coração :).

@Funções da Biblioteca:
01: COLETA O IP DO USUÁRIO.
02: COLETA A DATA E HORÁRIO (HORÁRIO DE BRASÍLA) QUE O USUÁRIO ACESSOU O SITE.
03: COLETA O SISTEMA OPERACIONAL DO USUÁRIO.
04: COLETA O NAVEGADOR DO USUARIO.
05. COLETA O DISPOSITIVO DO USUÁRIO.
06. COLETA A LATITUDE E LONGITUDE DO USUÁRIO COM BASE NO IP.
07. COLETA ALGUNS DETALHES ÚTEIS DO USUÁRIO E DO SEU NAVEGADOR.

@Funções Futuras:
I - COLETAR O ENDEREÇO MAC DO USUÁRIO NO LINUX E WINDOWS.

OBS: <i>Use com responsabilidade, o mal uso desta biblioteca pode </br>lhe trazer sérios problemas com as leis vigentes em seu país.</>

</pre>

<b>ABAIXO segue uma breve DOCUMENTAÇÃO sobre a utilização da biblioteca.</b>

 ```php
		/*Exemplo de utilização da biblioteca*/

		//Codificação da Página
		ini_set('default_charset','UTF-8');

		//Inclusão da biblioteca User Data Collector WEB 1.0.0
		include_once('UserDataCollectorWEB.php');	

		//Definição da zona para poder pegar o horário do usuário.
		date_default_timezone_set('America/Sao_Paulo');

		//Instancia da Classe UserDataCollector
		$user_informations = new User_Information();

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
		echo 'Horário de Acesso (Brasília): '.$user_informations->get_Device_User();
		echo("<br>");

		/**Coletando a geolocalizacao**/
		$geo_localizacao  = $user_informations->getLocalizacao();
		//Coletando a latitude do usuário
		echo 'Latitude: '.$geo_localizacao['latitude'];
		echo("<br>");
		//Coletando a longitude do usuário
		echo 'Longitude: '.$geo_localizacao['longitude'];
		echo("<br>");
  ```
  
  </br>
  <b>Seja livre para contribuir com o projeto, usando-o e melhorando.</b>
  </br>
  </br>

<b>Seu site usa essa biblioteca? Você pode promovê-lo aqui! Basta enviar o seu pedido que serei feliz em divulgar.</b>

#Desenvolvido por<br>
Nome: Mário de Araújo Carvalho<br> 
E-mail: mariodearaujocarvalho@gmail.com<br>
GitHub: https://github.com/MarioDeAraujoCarvalho<br>
Título: UserDataCollectorWEB
<br>

#Licença
``` 
        Copyright 2017 Mário de Araújo Carvalho
 
  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at
 
      http://www.apache.org/licenses/LICENSE-2.0
 
  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License.

````

<a href="https://github.com/MarioDeAraujoCarvalho/User-Data-Collector-WEB/blob/master/LICENSE" target="_blank">Mais detalhes sobre a licença</a>
