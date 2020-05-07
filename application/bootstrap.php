<?php

	// включаем сессии
	session_start();

	// подключаем файл конфигурации
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');

	// подключаем файлы ядра
	require_once(CORE_DIR.'model.php');
	require_once(CORE_DIR.'view.php');
	require_once(CORE_DIR.'controller.php');
	require_once(CORE_DIR.'route.php');

	Route::start(); // запускаем маршрутизатор