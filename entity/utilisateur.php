<?php
 class utilisateur {
    private $id ;
    private $nom_utilisateur;
    private $mot_de_passe;
    private $histoire;
    private $droit;
    private $email;
 
      
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
    * Get the value of nom_utilisateur
    */
   public function getNom_utilisateur()
   {
      return $this->nom_utilisateur;
   }

   /**
    * Set the value of nom_utilisateur
    */
   public function setNom_utilisateur($nom_utilisateur): self
   {
      $this->nom_utilisateur = $nom_utilisateur;

      return $this;
   }

   /**
    * Get the value of mot_de_passe
    */
   public function getMot_de_passe()
   {
      return $this->mot_de_passe;
   }

   /**
    * Set the value of mot_de_passe
    */
   public function setMot_de_passe($mot_de_passe): self
   {
      $this->mot_de_passe = $mot_de_passe;

      return $this;
   }

   /**
    * Get the value of histoire
    */
   public function getHistoire()
   {
      return $this->histoire;
   }

   /**
    * Set the value of histoire
    */
   public function setHistoire($histoire): self
   {
      $this->histoire = $histoire;

      return $this;
   }

   /**
    * Get the value of droit
    */
   public function getDroit()
   {
      return $this->droit;
   }

   /**
    * Set the value of droit
    */
   public function setDroit($droit): self
   {
      $this->droit = $droit;

      return $this;
   }

   /**
    * Get the value of email
    */
   public function getEmail()
   {
      return $this->email;
   }

   /**
    * Set the value of email
    */
   public function setEmail($email): self
   {
      $this->email = $email;

      return $this;
   }
 }