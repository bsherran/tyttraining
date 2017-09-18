<?php
$config = Config::singleton();
$config->set("appname","T&TTtraing");
$config->set("flrapp","tyttraining/");

$config->set("root","{$_SERVER["DOCUMENT_ROOT"]}/{$config->get("flrapp")}");

//lado servidor
$config->set("class","{$config->get("root")}appserver/class_/");
$config->set("controllers","{$config->get("root")}appserver/controllers/");
$config->set("models","{$config->get("root")}appserver/models/");
$config->set("views","{$config->get("root")}appserver/views/");
$config->set("entities","{$config->get("root")}appserver/entities/");
$config->set("libs","{$config->get("root")}appserver/libs/");
$config->set("rassets","{$config->get("root")}appclient/assets/");

$config->set("template","{$config->get("root")}appserver/views/template/");

//lado cliente.
$config->set("http","http://{$_SERVER["HTTP_HOST"]}/{$config->get("flrapp")}");
$config->set("css","{$config->get('http')}appclient/css/");
$config->set("js","{$config->get('http')}appclient/js/");
$config->set("assets","{$config->get('http')}appclient/assets/");
$config->set("icons","{$config->get('http')}appclient/assets/icons/");

//configuraciones para el servidor.
$config->set("dbhost","localhost");
$config->set("dbname","tyttraining");
$config->set("dbuser","root");
$config->set("dbpass","");
