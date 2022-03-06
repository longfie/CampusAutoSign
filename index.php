 <?php
    //author 龙辉
   // qq:1790716272
    header("Content-type: text/html; charset=utf-8");
    date_default_timezone_set("PRC");
    $token = '这里替换你的token';//这里填写token=后面的值
    $postdata='{
        "healthStatus":"健康",
        "suspectedDate":null,
        "patientDate":null,
        "isHot":false,
        "temperature":37,
        "isInHospital":"否",
        "hospital":null,
        "isolated":false,
        "isolatedMode":null,
        "isolatedAddress":null,
        "isolatedReason":null,
        "isolatedStartDate":null,
        "isolatedEndDate":null,
        "locationLatitude":"26.38743",
        "locationLongitude":"106.63461",
        "isOut":false,
        "locationCountry":"国内",
        "locationProvince":"贵州省",
        "locationCity":"贵阳市",
        "locationArea":"花溪区",
        "locationDetail":"二号路",
        "hasTravel":false,
        "travelReason":null,
        "travelFromDate":null,
        "travelFromPlace":null,
        "travelArrivalDate":null,
        "travelArrivalPlace":null,
        "travelMode":null,
        "travelComment":null,
        "hasTouchPatient":false,
        "hasOutHistory":false,
        "hasChumHot":false,
        "hasGoHighRiskArea":false,
        "hasTouchPersonFromHighRiskArea":false,
        "notes":"",
        "locationDescription":"贵州省贵阳市花溪区二号路"
    }';
    $result = xCurl('http://daka.wecampus.gznu.edu.cn:80/server/api/baseRecord/add?jwtToken='.$token,'',$postdata);
    if(json_decode($result,true)['success']==true)
    {
        echo '今日健康打卡成功'."\n".'当前时间:'.date('Y-m-d H:i:s', time());
        
    }
    else {
      echo '今日打卡失败,请检查';
    }
    
    function xCurl($url,$cookie=null,$postdata=null,$header=array()){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            if (!is_null($postdata)) curl_setopt($ch, CURLOPT_POSTFIELDS,$postdata);
            if (!is_null($cookie)) curl_setopt($ch, CURLOPT_COOKIE,$cookie);
     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Content-Length:'.strlen($postdata)
            )
     );
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_ENCODING, "gzip");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 2);
            $re = curl_exec($ch);
            curl_close($ch);
            return $re;
        }
    ?>