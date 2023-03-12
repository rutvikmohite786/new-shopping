<?php 
return [ 
    'client_id' => 'sb-xvpy825244165@business.example.com',
	'secret' => 'access_token$sandbox$7p3b8wtcqs5qsq9w$748bd443ff046f3bbd2b89b71eb237eb',
    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];