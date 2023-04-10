<?php

use ActiveRecord\Model;
use Geral\Utilidades;

class AlunosModel extends Model
{

    private static $id;
    private static $nome;
    private static $ra;
    private static $email;
    private static $nome_responsavel;
    private static $email_responsavel;
    private static $telefone;
    private static $rua;
    private static $numero;
    private static $bairro;
    private static $complemento;
    private static $estado;
    private static $cidade;
    private static $cep;

    public static function getId()
    {
        return self::$id;
    }

    public static function setId($id)
    {
        self::$id = $id;
    }

    public static function getNome()
    {
        return self::$nome;
    }

    public static function setNome($nome)
    {
        self::$nome = $nome;
    }

    public static function getRa()
    {
        return self::$ra;
    }

    public static function setRa($ra)
    {
        self::$ra = !empty($ra) ? Utilidades::removeCaracteres(['.', '-', '/'], $ra) : '';
    }

    public static function getEmail()
    {
        return self::$email;
    }

    public static function setEmail($email)
    {
        self::$email = $email;
    }

    public static function getNomeResponsavel()
    {
        return self::$nome_responsavel;
    }

    public static function setNomeResponsavel($nome_responsavel)
    {
        self::$nome_responsavel = $nome_responsavel;
    }

    public static function getEmailResponsavel()
    {
        return self::$email_responsavel;
    }

    public static function setEmailResponsavel($email_responsavel)
    {
        self::$email_responsavel = $email_responsavel;
    }


    public static function getTelefone()
    {
        return self::$telefone;
    }

    public static function setTelefone($telefone)
    {
        self::$telefone = !empty($telefone) ? Utilidades::removeCaracteres(['(', ')', '-', '.'], $telefone) : '';
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

    public static function getBairro()
    {
        return self::$bairro;
    }

    public static function setBairro($bairro)
    {
        self::$bairro = $bairro;
    }

    public static function getComplemento()
    {
        return self::$complemento;
    }

    public static function setComplemento($complemento)
    {
        self::$complemento = $complemento;
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

    public static $table_name = 'alunos';

    public static function salvar()
    {

        self::find_by_id(self::getId())
            ? $registro = self::find_by_id(self::getId())
            : $registro = new self();

        $registro->nome = self::getNome();
        $registro->ra = self::getRa();
        $registro->email = self::getEmail();
        $registro->nome_responsavel = self::getNomeResponsavel();
        $registro->email_responsavel = self::getEmailResponsavel();
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
                @unlink('../assets/imagens/alunos/'.$registro->imagem);
            endif;

            $imagem = Utilidades::UploadImagem($_FILES, '../assets/imagens/alunos/', '\\AlunosModel', 'imagem', $id_registro);
            Utilidades::RedimensionarImagem('../assets/imagens/alunos/'.$imagem,'../assets/imagens/alunos/'.$imagem, 400, 400, 'crop');

        endif;

        return 'ok';

    }

    public static function excluir()
    {

        $registro = self::find_by_id(self::getId());

        if(TurmasAlunosModel::find_by_id_aluno($registro->id)):
            return 'erro';
        endif;

        if(!empty($registro->imagem)):
            @unlink('../assets/imagens/alunos/'.$registro->imagem);
        endif;

        $registro->delete();

    }

}
