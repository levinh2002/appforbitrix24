<?php

function sendData($method, $params) {
    $_REQUEST['DOMAIN'] = "b24-z0cc1x.bitrix24.vn";
    $_REQUEST['AUTH_ID'] = "375f7665006952570068f6fb00000006403807b58311cf7d2841bđcadedfaef88847";
    $queryUrl = 'http://'.$_REQUEST['DOMAIN'].'/rest/'.$method.'.json';
    $queryData = http_build_query(array_merge($params, array("auth" => $_REQUEST['AUTH_ID'])));
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1, 
        CURLOPT_URL => $queryUrl,
        CURLOPT_POSTFIELDS=> $queryData,
      ));
       
        $result = json_decode(curl_exec($curl), true);
        curl_close($curl); 
        return $result;
    }

function contactList(){
  $contactList = sendData('crm.contact.list', 
  [
    'select' => ['ID','NAME','LAST_NAME','BIRTHDATE','PHONE', 'EMAIL']
  ]
  );
  return $contactList;
};


function deleteContact($id) {
    $deleteContact = sendData('crm.contact.delete', 
    [
      'ID' => $id
    ]
    );
    return $deleteContact;
  };

  function updateContact($id, $data) {
    $updateContact = sendData('crm.contact.update', 
    [
      'ID' => $id,
      'FIELDS' => $data
    ] 
    );
    return $updateContact;
  }

function getContact($id){
  $getContact = sendData('crm.contact.get', 
  [
    'ID' => $id
  ]
  );
  return $getContact;
};

function ProductList(){
    $productList = sendData('crm.product.list', 
    [
    ]
    );
    return $productList;
}

checkOutput(ProductList());


// Kiểm tra dữ liệu được xuất ra
function checkOutput($var, $var_name= ''){
    echo  '<pre style="padding:5px;margin:10px;color:white;background:black;">';
    if (! empty($var_name)) {
    echo '<h3>' . $var_name . '</h3>';
    }
    if(is_string($var)){
        $var = htmlspecialchars($var);
    } 
    print_r($var);
    echo '</pre>';
  }
  ?>
