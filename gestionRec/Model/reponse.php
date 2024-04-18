<?php
	class reponse{
		private $idrep=null;
		private $IDR=null;
		private $dater;
		private $sujet=null;
		private $dess=null;
		
		private $password=null;
		function __construct($idrep, $IDR, $dater, $sujet, $dess){
			$this->idrep=$idrep;
			$this->IDR=$IDR;
			$this->dater=$dater;
			$this->sujet=$sujet;
			$this->dess=$dess;

		}
		function getidrep(){
			return $this->idrep;
		}
		function getIDR(){
			return $this->IDR;
		}
		function getdater(){
			return $this->dater;
		}
		function getsujet(){
			return $this->sujet;
		}
		function getdess(){
			return $this->dess;
		}
		function setIDR(string $IDR){
			$this->IDR=$IDR;
		}
		function setdater(string $dater){
			$this->dater=$dater;
		}
		function setsujet(string $sujet){
			$this->sujet=$sujet;
		}
		function setdess(string $dess){
			$this->dess=$dess;
		}
	}


?>