<?php class _contenido {
    private $id;
    private $frase;
    private $contexto;

    public function __construct(array $data = null) {

        if (!is_null($data)) {
            if (array_key_exists('id', $data)) {
                $this->id = $data['id'];
            }
            $this->frase    = $data['frase'];
            $this->contexto = $data['contexto'];
        }

    }
    public function setid($id) {
        $this->id = $id;
        return $this;
    }
    public function setfrase($frase) {
        $this->frase = $frase;
        return $this;
    }
    public function setcontexto($contexto) {
        $this->contexto = $contexto;
        return $this;
    }
    public function getid() {
        return $this->id;
    }
    public function getfrase() {
        return $this->frase;
    }
    public function getcontexto() {
        return $this->contexto;
    }
}