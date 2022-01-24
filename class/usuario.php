<?php

class Usuario
{
  private $idusuario;
  private $deslogin;
  private $dessenha;
  private $dtcadastro;

  public function getIdusuario(): string
  {
    return $this->idusuario;
  }
  public function setIdusuario($value)
  {
    $this->idusuario = $value;
  }
  public function getDeslogin(): string
  {
    return $this->deslogin;
  }
  public function setDeslogin($value)
  {
    $this->deslogin = $value;
  }

  public function getDessenha(): string
  {
    return $this->dessenha;
  }
  public function setDessenha($value)
  {
    $this->dessenha = $value;
  }

  public function getDtcadastro()
  {
    return $this->dtcadastro;
  }
  public function setDtcadastro($value)
  {
    $this->dtcadastro = $value;
  }

  public function loadById($id)
  {
    $sql = new Sql();

    $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
      ":ID" => $id
    ));

    if (isset($results[0])) {
      $row = $results[0];

      $this->setIdusuario($row['idusuario']);
      $this->setDeslogin($row['deslogin']);
      $this->setDessenha($row['dessenha']);
      $this->setDtcadastro(new DateTime($row['dtcadastro']));
    }
  }

  public function __toString()
  {
    $existAnUser = isset($this->idusuario, $this->deslogin, $this->dessenha, $this->dtcadastro);
    if ($existAnUser) {
      return json_encode(array(
        "idusuario" => $this->getIdusuario(),
        "deslogin" => $this->getDeslogin(),
        "dessenha" => $this->getDessenha(),
        "dtcadastro" => $this->getDtcadastro()->format("d/m/Y H:i:s")
      ));
    } else {
      return "Ainda não foi informado o usuário. Para informá-lo utilize o método 'LoadById($'id'), informando o id do usuário a ser salvo.'";
    }
  }
}
