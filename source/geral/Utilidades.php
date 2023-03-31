<?php
namespace Geral;
include_once ('canvas.php');

class Utilidades{

    public static $url;

    public static function getUrl(){
        $url = explode('/', filter_input(INPUT_GET, 'url', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
        return self::$url = $url;
    }

    /*
    public static function DadosCriacao($registro)
    {
        $registro->data_criacao = date('Y-m-d H:i:s');
        $registro->data_alteracao = date('Y-m-d H:i:s');
        return $registro;
    }
    */

    /*Criação de pastas*/
    public static function CriaPasta($local)
    {
        if(!file_exists($local)):
            mkdir($local, 0777, true);
        endif;
    }


    /*Verifica tamanho do arquivo e retorna em MB*/
    public static function TamanhoArquivo($local_arquivo)
    {
        $tamanhoarquivo = filesize($local_arquivo);

        /* Se for menor que 1KB arredonda para 1KB */
        if($tamanhoarquivo < 999){
            $tamanhoarquivo = 1000;
        }

        for ($i = 0; $i <= 1; $i++):
            $tamanhoarquivo /= 1024;
        endfor;

        return round($tamanhoarquivo);
    }

    /*Redimensionamento e otimização de imagem*/
    public static function OtimizaImagemProduto($local_imagem)
    {

        list($largura_original, $altura_original) = getimagesize($local_imagem);

        $trataImagem = new \canvas();
        if($altura_original > 768):
            if($altura_original > $largura_original):
                $trataImagem->carrega($local_imagem)->redimensiona('', '768')->grava($local_imagem, 60);
            else:
                $trataImagem->carrega($local_imagem)->redimensiona('', '768')->grava($local_imagem, 60);
            endif;
        else:
            $trataImagem->carrega($local_imagem)->grava($local_imagem, 60);
        endif;

    }


    /*Upload Imagem*/
    public static function UploadImagem($dados_imagem, $local_upload, $model, $campo_tabela, $id_registro)
    {

        /*
        print_r($dados_imagem);
        echo $local_upload;
        */

        if(!file_exists($local_upload)):
            mkdir($local_upload, 0777, true);
        endif;

        $imagem = $dados_imagem['imagem']['name'];
        $imagem_tmp = $dados_imagem['imagem']['tmp_name'];
        $extensao = pathinfo($imagem, PATHINFO_EXTENSION);

        $nome_imagem = $id_registro.'-'.md5(date('dmYHis').$id_registro).'.'.$extensao;

        $destino = $local_upload.'/'.$nome_imagem;
        move_uploaded_file($imagem_tmp, $destino);

        $registro = $model::find($id_registro);
        $registro->$campo_tabela = $nome_imagem;
        $registro->save();

        return $registro->$campo_tabela;

    }

    public static function UploadArquivo2($dados_imagem, $campo_arquivo, $local_upload, $model, $campo_tabela, $id_registro)
    {

        /*
        print_r($dados_imagem);
        echo $local_upload;
        */

        if(!file_exists($local_upload)):
            mkdir($local_upload, 0777, true);
        endif;

        $imagem = $dados_imagem[$campo_arquivo]['name'];
        $imagem_tmp = $dados_imagem[$campo_arquivo]['tmp_name'];
        $extensao = pathinfo($imagem, PATHINFO_EXTENSION);

        $nome_imagem = $id_registro.'-'.md5(date('dmYHis').$id_registro).'.'.$extensao;

        $destino = $local_upload.'/'.$nome_imagem;
        move_uploaded_file($imagem_tmp, $destino);

        $registro = $model::find($id_registro);
        $registro->$campo_tabela = $nome_imagem;
        $registro->save();

        return $registro->$campo_tabela;

    }

    public static function UploadImagemFundo($dados_imagem, $local_upload, $model, $id_registro)
    {

        print_r($dados_imagem);
        echo $local_upload;

        if(!file_exists($local_upload)):
            mkdir($local_upload, 0777, true);
        endif;

        $imagem = $dados_imagem['imagem-fundo']['name'];
        $imagem_tmp = $dados_imagem['imagem-fundo']['tmp_name'];
        $extensao = pathinfo($imagem, PATHINFO_EXTENSION);

        $nome_imagem = $id_registro.'.'.$extensao;

        $destino = $local_upload.'/'.$nome_imagem;
        move_uploaded_file($imagem_tmp, $destino);

        $registro = $model::find($id_registro);
        $registro->imagem_topo = $nome_imagem;
        $registro->save();

        return $registro->imagem;

    }

    /*Upload Arquivo*/
    /**
     * Função para upload de arquivos
     * @example  Utilidades::UploadArquivo($dados_arquivo, $nome_input, $local_upload);
     * @param $dados_arquivo informar o $_FILE
     * @param $nome_input nome do input que está dentro do $_FILE
     * @param $nome_arquivo nome que o arquivo receberá
     * @param $local_upload local onde o arquivo será armazenado
     * @return string $nome_arquivo
     */
    public static function UploadArquivo($dados_arquivo, $nome_input, $local_upload)
    {
        if(!file_exists($local_upload)):
            mkdir($local_upload, 0777, true);
        endif;

        $arquivo = $dados_arquivo[$nome_input]['name'];
        $arquivo_tmp = $dados_arquivo[$nome_input]['tmp_name'];
        $extensao = pathinfo($arquivo, PATHINFO_EXTENSION);

        $nome_arquivo = md5(date('d/m/Y H:i:s').$dados_arquivo[$nome_input]['name']).'.'.$extensao;

        $destino = $local_upload.'/'.$nome_arquivo;
        move_uploaded_file($arquivo_tmp, $destino);

        return $nome_arquivo;

    }

    /*Redimensiona Imagem*/
    public static function RedimensionarImagem($origem, $destino, $largura, $altura, $modo)
    {
        $trataImagem = new \canvas();
        $trataImagem->carrega($origem)->redimensiona($largura, $altura, $modo)->grava($destino);
    }

    /*Registra imagem*/
    public static function RegistraImagem($model, $id_registro, $campo, $nome_imagem)
    {
        $registro = $model::find($id_registro);
        $registro->$campo = $nome_imagem;
        $registro->save();
    }


    /*Preços de Produtos*/
    public static function VerificaTabelasPrecos($id_representada, $id_produto)
    {

        $tabelas = \TabelasPrecosModel::find_all_by_id_representada($id_representada);
        if(!empty($tabelas)):
            foreach ($tabelas as $tabela):
                $tipo_tabela = $tabela->tipo;
                $preco = \PrecosProdutosModel::find_by_id_tabela_and_id_produto($tabela->id, $id_produto);
                if(empty($preco)):

                    switch ($tipo_tabela):
                        case 'preco-livre':
                            $novo_preco = new \PrecosProdutosModel();
                            $novo_preco->id_tabela = $tabela->id;
                            $novo_preco->id_produto = $id_produto;
                            dadosCriacao($novo_preco);
                            $novo_preco->save();
                            break;

                        case 'acrescimo':
                            $tabela_padrao = \TabelasPrecosModel::find(['conditions' => ['id_representada = ? and padrao = ?', $id_representada, 's']]);
                            $preco_padrao = \PrecosProdutosModel::find_by_id_tabela_and_id_produto($tabela_padrao->id, $id_produto);

                            $novo_preco = new \PrecosProdutosModel();
                            $novo_preco->id_tabela = $tabela->id;
                            $novo_preco->id_produto = $id_produto;
                            !empty($preco_padrao->valor) ? $novo_preco->valor = $preco_padrao->valor+(($preco_padrao->valor*$tabela->porcentagem)/100) : $novo_preco->valor = null;
                            dadosCriacao($novo_preco);
                            $novo_preco->save();
                            break;

                        case 'desconto':
                            $tabela_padrao = \TabelasPrecosModel::find(['conditions' => ['id_representada = ? and padrao = ?', $id_representada, 's']]);
                            $preco_padrao = \PrecosProdutosModel::find_by_id_tabela_and_id_produto($tabela_padrao->id, $id_produto);

                            $novo_preco = new \PrecosProdutosModel();
                            $novo_preco->id_tabela = $tabela->id;
                            $novo_preco->id_produto = $id_produto;
                            !empty($preco_padrao->valor) ? $novo_preco->valor = $preco_padrao->valor-(($preco_padrao->valor*$tabela->porcentagem)/100) : $novo_preco->valor = null;
                            dadosCriacao($novo_preco);
                            $novo_preco->save();
                            break;
                    endswitch;

                endif;
            endforeach;
        endif;

    }

    public static function formataDataFormatoAmericano($data)
    {
        return implode('-', array_reverse(explode('/', $data)));
    }

    public static function formataDataExcelParaBrasileiro($data)
    {
        $pedacos = explode('/', $data);
        return $pedacos[1].'/'.$pedacos[0].'/'.$pedacos[2];
    }

    public static function formataDataHoraFormatoAmericano($data_hora)
    {
        $pedacos = explode(' ', $data_hora);
        $data = implode('-', array_reverse(explode('/', $pedacos[0])));
        $hora = $pedacos[1];
        return $data.' '.$hora;
    }

    public static function removeCaracteres(array $caracteres, string $valor)
    {

        if(!empty($caracteres)):
            foreach ($caracteres as $caractere):
                $valor = str_replace($caractere, '', $valor);
            endforeach;
        endif;

        return $valor;

    }


    public static function mudaStatus($registro)
    {

        switch ($registro->status):
            case 'a':
                return 'i';
                break;

            case 'i':
                return 'a';
                break;

            default:
                return 'i';
        endswitch;

    }

    public static function ultimoDiaMes($mes, $ano)
    {
        $ultimo_dia = date("t", mktime(0,0,0,$mes,'01',$ano));
        return $ultimo_dia;
    }

    public static function trataValor($valor)
    {
        if(!empty($valor)):
            $valor = str_replace('.', '', $valor);
            $valor = str_replace(',', '.', $valor);
            return $valor;
        else:
            return 0;
        endif;
    }

    public static function removerLetras($string)
    {
        return preg_replace("/[^0-9]/", "", $string);
    }

}
