<?php

const HTTP_OK = 200;
const HTTP_BAD_REQUEST = 400;
const HTTP_METHOD_NOT_ALLOWED = 405;

    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) == 'XMLHTTPREQUEST')
    {

        $response_code = HTTP_BAD_REQUEST;
        $message = 'Il manque le paramètre ACTION';
        $number = null;

        if($_POST['action'] == "showData" && isset ($_POST['number'])){
            $response_code = HTTP_OK;
            $number = $_POST['number'];
            $message = "Bon score !";

            if($number < 5){
                $message = "Mauvais score !";

            }
        }
        
        reponse($response_code, $message, $number);
    }
    else
    {
        $response_code = HTTP_METHOD_NOT_ALLOWED;
        $message = 'Method not allowed!';
        
        reponse($response_code, $message);
    }




function reponse($response_code, $message, $number = null){
    header('Content-Type: application/json');
    http_response_code($response_code);

    $response = [
        'response_code' => $response_code,
        'message' => $message,
        'number' => $number
    ];

    echo json_encode($response);
}
?>