<?php
 class boutique {
   private $id ;
   private $ville;
   private $adresseboutique;
   private $mailresponsable;
   private $envoyeremail;
   private $fleurspeciale;


   
   public function __construct(array $data) {
      $this->hydrate($data);
  }
      
      public function hydrate (array $data) : void {
         foreach ($data as $key => $value) {
            $method = "set" . ucfirst($key); 
            if (method_exists ($this, $method)) {
               $this->$method ($value);
            }
         }
        }
   /**
    * Get the value of id
    */
   public function getId()
   {
      return $this->id;
   }

   /**
    * Set the value of id
    */
   public function setId($id): self
   {
      $this->id = $id;

      return $this;
   }

   /**
    * Get the value of ville
    */
   public function getVille()
   {
      return $this->ville;
   }

   /**
    * Set the value of ville
    */
   public function setVille($ville): self
   {
      $this->ville = $ville;

      return $this;
   }

   /**
    * Get the value of adresseboutique
    */
   public function getAdresseboutique()
   {
      return $this->adresseboutique;
   }

   /**
    * Set the value of adresseboutique
    */
   public function setAdresseboutique($adresseboutique): self
   {
      $this->adresseboutique = $adresseboutique;

      return $this;
   }

   /**
    * Get the value of mailresponsable
    */
   public function getMailresponsable()
   {
      return $this->mailresponsable;
   }

   /**
    * Set the value of mailresponsable
    */
   public function setMailresponsable($mailresponsable): self
   {
      $this->mailresponsable = $mailresponsable;

      return $this;
   }

   /**
    * Get the value of envoyeremail
    */
   public function getEnvoyeremail()
   {
      return $this->envoyeremail;
   }

   /**
    * Set the value of envoyeremail
    */
   public function setEnvoyeremail($envoyeremail): self
   {
      $this->envoyeremail = $envoyeremail;

      return $this;
   }

   /**
    * Get the value of fleurspeciale
    */
   public function getFleurspeciale()
   {
      return $this->fleurspeciale;
   }

   /**
    * Set the value of fleurspeciale
    */
   public function setFleurspeciale($fleurspeciale): self
   {
      $this->fleurspeciale = $fleurspeciale;

      return $this;
   }

   /**
    * Get the value of utilisateur
    */
   public function getUtilisateur()
   {
      return $this->utilisateur;
   }

   /**
    * Set the value of utilisateur
    */
   public function setUtilisateur($utilisateur): self
   {
      $this->utilisateur = $utilisateur;

      return $this;
   }
      }

