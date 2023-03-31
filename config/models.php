<?php
/*
 *
 * Configurações do Active Record
 *
 */
define('PHP_ACTIVE_RECORD', __DIR__.'/../source/geral/activeRecord/ActiveRecord.php');
define('MODELS', __DIR__.'/../source/models');

include_once(PHP_ACTIVE_RECORD);
$cfg = ActiveRecord\Config::instance();
$cfg->set_model_directory(MODELS);
