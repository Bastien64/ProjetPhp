<?php
 class franchise {
   private $id ;
   private $ville;
   private $statut;
   private $utilisateur;

   
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
    public function setId($id)
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
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }


    /**
     * Get the value of statut
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

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
    