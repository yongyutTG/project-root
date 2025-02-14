<?php



// $routes->get('/', 'Home::index');
// $routes->get('news', 'News::index');   

$routes->post('/create-token', 'JwtController::createToken');
$routes->post('/verify-token', 'JwtController::verifyToken');

// //หน้าHOme
$routes->resource('ApiEkycController'); //รองรับ RESTful API
// $routes->group('api', ['filter' => 'apikey'], function ($routes) {
//     $routes->resource('ApiEkycController'); // ใช้ API Key กับทุกเมธอดของ EkycApi
// });




// $routes->resource('api'); //รองรับ RESTful API
// $routes->get('api', 'ApiController::index'); //เส้นทางเรียก API
$routes->group('api', function ($routes) {
   
    $routes->post('create-api-key', 'ApiKeyController::createApiKey');
    $routes->get('validate-api-key', 'ApiKeyController::validateApiKey');

 


    $routes->get('/', 'Api::index', ['filter' => 'apiKeyAuth']);
    $routes->get('(:num)', 'Api::show/$1', ['filter' => 'apiKeyAuth']);
    $routes->post('create', 'Api::create', ['filter' => 'apiKeyAuth']);
    $routes->put('update/(:num)', 'Api::update/$1', ['filter' => 'apiKeyAuth']);
    $routes->delete('delete/(:num)', 'Api::delete/$1', ['filter' => 'apiKeyAuth']);
});






$routes->get('/get-member', 'ApiController::get_member');




$routes->get('pdfcontroller/generatepdf', 'PdfController::generatePDF');

$routes->get('news/(:segment)', 'News::view/$1');  
$routes->get('(:any)','Pages::view/$1');



