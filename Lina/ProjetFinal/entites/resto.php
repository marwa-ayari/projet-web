<?php

    class Resto{
        private $nom_resto;
        private $pdp;
        private	$detail;
        private	$image1;
        private	$image2;
        private	$image3;
        private	$menu; 
        private $specialite; 

        function __construct($nom_resto,$pdp,$detail,$image1,$image2,$image3,$menu,$specialite){
            $this->nom_resto = $nom_resto;
            $this->pdp = $pdp;
            $this->detail = $detail;
            $this->image1 = $image1; 
            $this->image2 = $image2;
            $this->image3 = $image3; 
            $this->menu = $menu; 
            $this->specialite = $specialite;



        }   
      
        
        public function getNom_resto()
        {
                return $this->nom_resto;
        }
        public function setNom_resto($nom_resto)
        {
                $this->nom_resto = $nom_resto;

               
        }

        public function getPdp()
        {
                return $this->pdp;
        }

       
        public function setPdp($pdp)
        {
                $this->pdp = $pdp;

        }

        
        public function getDetail()
        {
                return $this->detail;
        }

        
        public function setDetail($detail)
        {
                $this->detail = $detail;

        }

        
        public function getImage1()
        {
                return $this->image1;
        }

        public function setImage1($image1)
        {
                $this->image1 = $image1;

        }
 
        public function getImage2()
        {
                return $this->image2;
        }

        
        public function setImage2($image2)
        {
                $this->image2 = $image2;

        }

        
        public function getImage3()
        {
                return $this->image3;
        }

        public function setImage3($image3)
        {
                $this->image3 = $image3;

        }

        public function getMenu()
        {
                return $this->menu;
        }

        
        public function setMenu($menu)
        {
                $this->menu = $menu;

        }

        
        public function getSpecialite()
        {
                return $this->specialite;
        }

       
        public function setSpecialite($specialite)
        {
                $this->specialite = $specialite;

        }
    }
?>