<?php

use ActiveRecord\Model;

class RegistrosDiarioClasseModel extends Model
{

    private static $id;
    private static $id_diario;
    private static $id_turma;
    private static $id_aluno;
    private static $presente_chamada1;
    private static $presente_chamada2;

    public static function getId()
    {
        return self::$id;
    }

    public static function setId($id)
    {
        self::$id = $id;
    }

    public static function getIdDiario()
    {
        return self::$id_diario;
    }

    public static function setIdDiario($id_diario)
    {
        self::$id_diario = $id_diario;
    }

    public static function getIdTurma()
    {
        return self::$id_turma;
    }

    public static function setIdTurma($id_turma)
    {
        self::$id_turma = $id_turma;
    }

    public static function getIdAluno()
    {
        return self::$id_aluno;
    }

    public static function setIdAluno($id_aluno)
    {
        self::$id_aluno = $id_aluno;
    }

    public static function getPresenteChamada1()
    {
        return self::$presente_chamada1;
    }

    public static function setPresenteChamada1($presente_chamada1)
    {
        self::$presente_chamada1 = $presente_chamada1;
    }

    public static function getPresenteChamada2()
    {
        return self::$presente_chamada2;
    }

    public static function setPresenteChamada2($presente_chamada2)
    {
        self::$presente_chamada2 = $presente_chamada2;
    }

    public static $table_name = 'registros_diaro_classe';

    public static function verificarItens()
    {

        if(!self::find_by_id_diario(self::getIdDiario())):

            $diario = DiariosModel::find_by_id(self::getIdDiario());
            $alunos = TurmasAlunosModel::all(['conditions' => ['id_turma = ?', $diario->id_turma]]);

            if(!empty($alunos)):
                foreach ($alunos as $aluno):

                    $registro = new self();
                    $registro->id_diario = self::getIdDiario();
                    $registro->id_turma = $aluno->id_turma;
                    $registro->id_aluno = $aluno->id_aluno;
                    $registro->presente_chamada1 = 'n';
                    $registro->presente_chamada2 = 'n';
                    $registro->save();

                endforeach;
            endif;

        endif;

        $registros = VRegistrosDiarioModel::all(['conditions' => ['id_diario = ?', self::getIdDiario()], 'order' => 'ordem asc']);
        return $registros;

    }

    public static function salvar($dados)
    {

        $presenca_antes_interalo = $dados['presenca_antes_interalo'];
        $presenca_apos_interalo = $dados['presenca_apos_interalo'];

        self::find_by_sql("update registros_diaro_classe set presente_chamada1 = 'n', presente_chamada2 = 'n' where id_diario = '{$dados['id_diario']}' ");

        if(!empty($presenca_antes_interalo)):
            foreach ($presenca_antes_interalo as $id => $valor):

                $registro = self::find_by_id($id);
                $registro->presente_chamada1 = 's';
                $registro->save();

            endforeach;
        endif;

        if(!empty($presenca_apos_interalo)):
            foreach ($presenca_apos_interalo as $id => $valor):

                $registro = self::find_by_id($id);
                $registro->presente_chamada2 = 's';
                $registro->save();

            endforeach;
        endif;

    }

}