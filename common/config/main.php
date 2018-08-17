<?php
$config = parse_ini_file(dirname(dirname(__DIR__)).'/common/secure/api.ini', true);
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager'=>[         
            'class' => 'yii\rbac\DbManager',            
        ],
   
        'view' => [
              'theme' => [
                  'pathMap' => [
                      '@dektrium/user/views' => '@app/views/user'
                  ],
              ],
          ],  
          'authClientCollection' => [
              'class' => 'yii\authclient\Collection',
              'clients' => [
                  'google' => [
                      'class'        => 'dektrium\user\clients\Google',
                      'clientId'     => $config['oauth_google_clientId'],
                      'clientSecret' => $config['oauth_google_clientSecret'],
                  ],
                  'twitter' => [
                      'class'        => 'dektrium\user\clients\Twitter',
                      
                  ],
                  'facebook' => [
                      'class'        => 'dektrium\user\clients\Facebook',                      
                  ]
                ],
        ], 
        'urlManager'=>[
            //'enablePrettyUrl' => true,
            //'showScriptName' => false,
            //'rules' => [
            //    'logout'=>'site/logout'                
            ///]
        ]
    ],

    'modules' => [          
          'user' => [
                'class' => 'dektrium\user\Module',
                'enableUnconfirmedLogin' => TRUE,
                'confirmWithin' => 21600,
                'cost' => 12,
                'admins' => ['admin']
              ],              
      ],
];
