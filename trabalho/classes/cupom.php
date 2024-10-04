<?php
class Cupom{
    private $cupom;
    private $desconto;
    private $tipoDesconto;
    private $conn;
    public function __construct($cupom, $desconto, $tipoDesconto, $conn){
        $this->cupom = $cupom;
        $this->desconto = $desconto;
        if (is_string($tipoDesconto) && strlen($tipoDesconto) === 1) {
            $this->tipoDesconto = $tipoDesconto;
        }
        $this->conn = $conn;
    }
    public function insert(){
        $sql = "insert into cupom (cupom, desconto, tipoDesconto) values (:cupom, :desconto, :tipoDesconto)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':cupom', $this->cupom);
        $stmt->bindParam(':desconto', $this->desconto);
        $stmt->bindParam(':tipoDesconto', $this->tipoDesconto);
        $stmt->execute();
    }
    public function setCupom(string $cupom){
        $this->cupom = $cupom;
    }
    public function setDesconto(float $desconto){
        $this->desconto = $desconto;
    }
    public function setTipoDesconto(string $tipoDesconto){
        if (is_string($tipoDesconto) && strlen($tipoDesconto) === 1) {
            $this->tipoDesconto = $tipoDesconto;
        }
    }
    public function getCupom(): string{
        return $this->cupom = $cupom;
    }
    public function getDesconto(): float{
        return $this->desconto = $desconto;
    }
    public function getTipoDesconto(): string{
        return $this->tipoDesconto = $tipoDesconto;
    }
}
?>