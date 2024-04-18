<?php
	class reclamation{
		private $IDR=null;
		private $typer=null;
		private $dater;
		private $sujet=null;
		private $dess=null;
		
		private $password=null;
		function __construct($IDR, $typer, $dater, $sujet, $dess){
			$this->IDR=$IDR;
			$this->typer=$typer;
			$this->dater=$dater;
			$this->sujet=$sujet;
			$this->dess=$dess;

		}
		function getIDR(){
			return $this->IDR;
		}
		function gettyper(){
			return $this->typer;
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
		function settyper(string $typer){
			$this->typer=$typer;
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