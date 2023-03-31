<?php

use Geral\Rotas;

$rotas = new Rotas();

/*===================================================================================================================*/
/*===================================================================================================================*/
/*Painel*/
$rotas->add('login', 'painel', 'login.login', 'PainelController@login');
$rotas->add('sair', 'painel', 'login.login', 'PainelController@sair');

    /*Ativação da Conta*/
    $rotas->add('ativar-conta', 'painel', 'login.ativar-conta', 'PainelController@ativarConta');

    /*Recuperação de senhas*/
    $rotas->add('esqueci-senha','painel','esqueci-senha.esqueci-senha','EsqueciSenhaController@index');
    $rotas->add('recuperar-senha','painel','esqueci-senha.recuperar-senha','RecuperarSenhaController@index');

/*Dashboard*/
$rotas->add('inicio','painel','inicio.inicio','PainelController@inicio');

/*usuarios*/
$rotas->add('usuarios','painel','usuarios.usuarios','UsuariosController@index');
$rotas->add('novo-usuario','painel','usuarios.alterar','UsuariosController@novo');
$rotas->add('alterar-usuario','painel','usuarios.alterar','UsuariosController@alterar');
$rotas->add('alterar-senha-usuario','painel','usuarios.alterar','UsuariosController@alterarSenha');
$rotas->add('status-usuario','painel','usuarios.alterar','UsuariosController@status');
$rotas->add('excluir-usuario','painel','usuarios.alterar','UsuariosController@excluir');

/*Séries*/
$rotas->add('series', 'painel', 'series.index', 'SeriesController@index');
$rotas->add('buscar-serie', 'painel', 'series.index', 'SeriesController@buscar');
$rotas->add('nova-serie', 'painel', 'series.index', 'SeriesController@novo');
$rotas->add('alterar-serie', 'painel', 'series.index', 'SeriesController@alterar');
$rotas->add('excluir-serie', 'painel', 'series.index', 'SeriesController@excluir');

/*Turmas*/
$rotas->add('turmas', 'painel', 'turmas.index', 'TurmasController@index');
$rotas->add('buscar-turma', 'painel', 'turmas.materias', 'TurmasController@buscar');
$rotas->add('nova-turma', 'painel', 'turmas.index', 'TurmasController@novo');
$rotas->add('alterar-turma', 'painel', 'turmas.index', 'TurmasController@alterar');
$rotas->add('excluir-turma', 'painel', 'turmas.index', 'TurmasController@excluir');
$rotas->add('buscar-professores-turma', 'painel', 'turmas.index', 'TurmasController@professoresTurma');
$rotas->add('buscar-materias-professor', 'painel', 'turmas.index', 'TurmasController@materiasProfessor');

$rotas->add('gerar-relatorio', 'painel', 'turmas.index', 'RelatorioController@gerar');

/*Matérias Turmas*/
$rotas->add('materias-turma', 'painel', 'turmas.materias', 'MateriasTurmasController@index');
$rotas->add('nova-materia-turma', 'painel', 'turmas.materias', 'MateriasTurmasController@novo');
$rotas->add('alterar-materia-turma', 'painel', 'turmas.materias', 'MateriasTurmasController@alterar');
$rotas->add('buscar-materia-turma', 'painel', 'turmas.materias', 'MateriasTurmasController@buscar');
$rotas->add('excluir-materia-turma', 'painel', 'turmas.materias', 'MateriasTurmasController@excluir');

/*Alunos Turmas*/
$rotas->add('alunos-turma', 'painel', 'turmas.alunos', 'AlunosTurmasController@index');
$rotas->add('salvar-numero-alunos-turma', 'painel', 'turmas.alunos', 'AlunosTurmasController@salvarNumero');
$rotas->add('buscar-aluno-turma', 'painel', 'turmas.alunos', 'AlunosTurmasController@buscar');
$rotas->add('novo-aluno-turma', 'painel', 'turmas.alunos', 'AlunosTurmasController@novo');
$rotas->add('excluir-aluno-turma', 'painel', 'turmas.alunos', 'AlunosTurmasController@excluir');

/*Matérias*/
$rotas->add('materias', 'painel', 'materias.index', 'MateriasController@index');
$rotas->add('buscar-materia', 'painel', 'materias.index', 'MateriasController@buscar');
$rotas->add('nova-materia', 'painel', 'materias.index', 'MateriasController@novo');
$rotas->add('alterar-materia', 'painel', 'materias.index', 'MateriasController@alterar');
$rotas->add('excluir-materia', 'painel', 'materias.index', 'MateriasController@excluir');

/*Alunos*/
$rotas->add('alunos', 'painel', 'alunos.index', 'AlunosController@index');
$rotas->add('novo-aluno', 'painel', 'alunos.alterar', 'AlunosController@novo');
$rotas->add('alterar-aluno', 'painel', 'alunos.alterar', 'AlunosController@alterar');
$rotas->add('excluir-aluno', 'painel', 'alunos.index', 'AlunosController@excluir');

/*Diários*/
$rotas->add('diarios-turma', 'painel', 'diarios.index', 'DiariosController@index');
$rotas->add('listar-diarios-turma', 'painel', 'diarios.listar', 'DiariosController@listar');
$rotas->add('salvar-diario-turma', 'painel', 'diarios.index', 'DiariosController@salvar');
$rotas->add('novo-diario-turma', 'painel', 'diarios.index', 'DiariosController@novo');
$rotas->add('alterar-diario-turma', 'painel', 'diarios.alterar', 'DiariosController@alterar');
$rotas->add('excluir-diario-turma', 'painel', 'diarios.index', 'DiariosController@excluir');

/*Perfil do Usuário*/
$rotas->add('perfil-usuario','painel','perfil.index','PerfilController@index');
$rotas->add('salvar-perfil','painel','perfil.perfil','PerfilController@salvar');
$rotas->add('alterar-senha-perfil','painel','perfil.perfil','PerfilController@alterarSenha');
