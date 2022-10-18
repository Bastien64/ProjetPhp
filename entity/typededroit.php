<?php
 class typededroit {
    private $id ;
    private $type;
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
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     */
    public function setType($type): self
    {
        $this->type = $type;

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

 