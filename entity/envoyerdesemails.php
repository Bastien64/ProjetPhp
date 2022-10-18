<?php
 class envoyerdesemails {
   private $id ;
   private $typededroit;
   private $description;


   
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
    * Get the value of typededroit
    */
   public function getTypededroit()
   {
      return $this->typededroit;
   }

   /**
    * Set the value of typededroit
    */
   public function setTypededroit($typededroit): self
   {
      $this->typededroit = $typededroit;

      return $this;
   }

   /**
    * Get the value of description
    */
   public function getDescription()
   {
      return $this->description;
   }

   /**
    * Set the value of description
    */
   public function setDescription($description): self
   {
      $this->description = $description;

      return $this;
   }
        }
