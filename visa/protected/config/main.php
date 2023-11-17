<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'Visa Fast Track',

    // preloading 'log' component
    'preload'=>array('log'),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
        'ext.YiiMailer.YiiMailer'
    ),

    //'defaultController'=>'post',

    // uncomment the following to enable the Gii tool
    'modules' => array(
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'123',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
        ),
    ),

    // application components
    'components'=>array(
        'user' => array(
            'class' => 'WebUser',            
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        /*
        'mail' => array(
            'class' => 'ext.yii-mail.YiiMail',
            'transportType' => 'smtp',
            'transportOptions' => array(
                'host' => 'postmaster.1govuc.gov.my',
                'username' => '',
                'password' => '',
                'port' => '25',
                //'encryption' => 'ssl',
             
            ),
            'viewPath' => 'application.views.mail',
            'logging' => true,
            'dryRun' => false
        ),
        */
        'ePdf' => array(
            'class' => 'ext.yii-pdf.EYiiPdf',
            'params' => array(
                'mpdf' => array(
                    //'librarySourcePath' => 'application.vendors.MPDF54.*',
					'librarySourcePath' => 'application.vendors.MPDF57.*',
                    'constants' => array(
                        '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                    ),
                    'class' => 'mpdf', // the literal class filename to be loaded from the vendors folder
                    'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
                        'mode'              => '', //  This parameter specifies the mode of the new document.
                        'format'            => 'A4', // format A4, A5, ...
                        'default_font_size' => '9', // Sets the default document font size in points (pt)
                        'default_font'      => '', // Sets the default font-family for the new document.
                        'mgl'               => 10, // margin_left. Sets the page margins for the new document.
                        'mgr'               => 10, // margin_right
                        'mgt'               => 25, // margin_top
                        'mgb'               => 1, // margin_bottom
                        'mgh'               => 2, // margin_header
                        'mgf'               => 9, // margin_footer
                        'orientation'       => 'L', // landscape or portrait orientation
                  ) 
                ),
                'HTML2PDF' => array(
                    'librarySourcePath' => 'application.vendors.html2pdf.*',
                    'classFile' => 'html2pdf.class.php', // For adding to Yii::$classMap
                    'defaultParams' => array(// More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                        'orientation' => 'P', // landscape or portrait orientation
                        'format' => 'A4', // format A4, A5, ...
                        'language' => 'en', // language: fr, en, it ...
                        'unicode' => true, // TRUE means clustering the input text IS unicode (default = true)
                        'encoding' => 'UTF-8', // charset encoding; Default is UTF-8
                        'marges' => array(20, 10, 20, 10), // margins by default, in order (left, top, right, bottom)
                    )
                ),
            ),
        ),
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=fresh_visa',
            'emulatePrepare' => true,
            'username' => 'root',
            //'password' => 'pr0d@S1mp4t1@R00t5l4v3@MySql',
            'password' => 'password',
            'charset' => 'utf8',
        ),
        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        /*
        'urlManager'=>array(
            'urlFormat'=>'path',
            'rules'=>array(
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),
        */
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ),
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
		//'qrlink' => 'https://e-bfbms.com/demo/qr',
        'qrlink' => 'http://localhost:81/fresh/qr',
    ),
);