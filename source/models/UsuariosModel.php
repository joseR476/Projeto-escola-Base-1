<?php

use Geral\Utilidades;
use Helpers\BcryptHelper;

class UsuariosModel extends ActiveRecord\Model {

    private static $id;
    private static $tipo;
    private static $nome;
    private static $email;
    private static $telefone;
    private static $rua;
    private static $numero;
    private static $complemento;
    private static $bairro;
    private static $estado;
    private static $cidade;
    private static $cep;
    private static $login;
    private static $senha;

    public static function getId()
    {
        return self::$id;
    }

    public static function setId($id)
    {
        self::$id = $id;
    }

    public static function getTipo()
    {
        return self::$tipo;
    }

    public static function setTipo($tipo)
    {
        self::$tipo = $tipo;
    }

    public static function getNome()
    {
        return self::$nome;
    }

    public static function setNome($nome)
    {
        self::$nome = $nome;
    }

    public static function getEmail()
    {
        return self::$email;
    }

    public static function setEmail($email)
    {
        self::$email = $email;
    }

    public static function getTelefone()
    {
        return self::$telefone;
    }

    public static function setTelefone($telefone)
    {
        self::$telefone = !empty($telefone) ? Utilidades::removeCaracteres(['(', ')', '-'], $telefone) : '';
    }

    public static function getRua()
    {
        return self::$rua;
    }

    public static function setRua($rua)
    {
        self::$rua = $rua;
    }

    public static function getNumero()
    {
        return self::$numero;
    }

    public static function setNumero($numero)
    {
        self::$numero = $numero;
    }

    public static function getComplemento()
    {
        return self::$complemento;
    }

    public static function setComplemento($complemento)
    {
        self::$complemento = $complemento;
    }

    public static function getBairro()
    {
        return self::$bairro;
    }

    public static function setBairro($bairro)
    {
        self::$bairro = $bairro;
    }

    public static function getEstado()
    {
        return self::$estado;
    }

    public static function setEstado($estado)
    {
        self::$estado = $estado;
    }

    public static function getCidade()
    {
        return self::$cidade;
    }

    public static function setCidade($cidade)
    {
        self::$cidade = $cidade;
    }

    public static function getCep()
    {
        return self::$cep;
    }

    public static function setCep($cep)
    {
        self::$cep = !empty($cep) ? Utilidades::removeCaracteres(['.', '-'], $cep) : '';
    }

    public static function getLogin()
    {
        return self::$login;
    }

    public static function setLogin($login)
    {
        self::$login = $login;
    }

    public static function getSenha()
    {
        return self::$senha;
    }

    public static function setSenha($senha)
    {
        self::$senha = !empty($senha) ? BcryptHelper::hash($senha) : '';
    }

    static $table_name = 'usuarios';

    public static function salvar()
    {

        if(self::find_by_id(self::getId())):
            $registro = self::find_by_id(self::getId());
        else:
            $registro = new self();

            $registro->login = self::getLogin();
            $registro->senha = self::getSenha();
            $registro->status = 'a';
        endif;

        $registro->tipo = self::getTipo();
        $registro->nome = self::getNome();
        $registro->email = self::getEmail();
        $registro->telefone = self::getTelefone();
        $registro->rua = self::getRua();
        $registro->numero = self::getNumero();
        $registro->bairro = self::getBairro();
        $registro->complemento = self::getComplemento();
        $registro->estado = self::getEstado();
        $registro->cidade = self::getCidade();
        $registro->cep = self::getCep();
        $registro->save();

        $id_registro = $registro->id;

        if(!empty($_FILES['imagem']['name'])):

            if(!empty($registro->imagem)):
                @unlink('../assets/imagens/usuarios/'.$registro->imagem);
            endif;

            $imagem = Utilidades::UploadImagem($_FILES, '../assets/imagens/usuarios/', '\\UsuariosModel', 'imagem', $id_registro);
            Utilidades::RedimensionarImagem('../assets/imagens/usuarios/'.$imagem,'../assets/imagens/usuarios/'.$imagem, 400, 400, 'crop');

        endif;

        return 'ok';

    }

    public static function salvarPerfil()
    {

        $registro = self::find_by_id(self::getId());
        $registro->nome = self::getNome();
        $registro->email = self::getEmail();
        $registro->telefone = self::getTelefone();
        $registro->rua = self::getRua();
        $registro->numero = self::getNumero();
        $registro->bairro = self::getBairro();
        $registro->complemento = self::getComplemento();
        $registro->estado = self::getEstado();
        $registro->cidade = self::getCidade();
        $registro->cep = self::getCep();
        $registro->save();

        $id_registro = $registro->id;

        if(!empty($_FILES['imagem']['name'])):

            if(!empty($registro->imagem)):
                @unlink('../assets/imagens/usuarios/'.$registro->imagem);
            endif;

            $imagem = Utilidades::UploadImagem($_FILES, '../assets/imagens/usuarios/', '\\UsuariosModel', 'imagem', $id_registro);
            Utilidades::RedimensionarImagem('../assets/imagens/usuarios/'.$imagem,'../assets/imagens/usuarios/'.$imagem, 400, 400, 'crop');

        endif;

        return 'ok';

    }

    public static function status()
    {

    }

    public static function alterarSenha()
    {

        $registro = self::find_by_id(self::getId());
        $registro->senha = self::getSenha();
        $registro->save();

        return 'ok';

    }

    public static function excluir()
    {

        $registro = self::find_by_id(self::getId());

        if($registro->tipo == 'professor'):
            if(TurmasMateriasModel::find_by_id_professor($registro->id)):
                return 'erro-professor';
            endif;
        endif;

        if(!empty($registro->imagem)):
            @unlink('../assets/imagens/usuarios/'.$registro->imagem);
        endif;

        $registro->delete();

        return 'ok';

    }

}
