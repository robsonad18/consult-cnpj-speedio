<?php 

namespace App\WebService;

/**
 * Speedio
 * @package App\WebService
 */
class Speedio
{
   /**
    * URL base da Speedio API
    */
   const URL_BASE = "https://api-publica.speedio.com.br";

   /**
    * Metodo responsavel por consultas um CNPJ nas APIs do Speedio
    * @param string $cnpj 
    * @return void 
    */
   public function consultCnpj(string $cnpj):array
   {
      $cnpj = preg_replace("/\D/","",$cnpj);
      return $this->get("/buscarcnpj?cnpj=".$cnpj);
   }


   /**
    * Metodo responsavel por executar as consultas nas APIs do Speedio
    * @return array 
    */
   public function get(string $resource):array
   {
      $endpoint = self::URL_BASE.$resource;

      $curl = curl_init();

      curl_setopt_array($curl, [
         CURLOPT_URL             => $endpoint,
         CURLOPT_RETURNTRANSFER  => true,
         CURLOPT_CUSTOMREQUEST   => "GET"
      ]);

      $response = curl_exec($curl);

      curl_close($curl);

      return json_decode($response, true);
   }

}