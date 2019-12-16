<?php
require_once 'config.inc.php';
require_once 'githubRepo.php';

class apiHandler {
    
    function githubRepos()
    {     
        $repos = array();
        
        $curlInfo = $this->curlRequest();
        $temp = str_replace("{\"data\":{\"viewer\":{\"repositories\":{\"nodes\":", "", $curlInfo);
        
        //String Clean up
        $leng = strlen($temp) - 1;        
        while($temp[$leng] != "}")
        {
            substr_replace($temp, "", -1);
            $leng--;
        }
        $temp = substr($temp, 0, -4); 

        $decode = json_decode($temp, true);        
        $keys = array_keys($decode);
        for($i = 0; $i < count($decode); $i++) 
        {
            $repo = new githubRepo();
            
            foreach($decode[$keys[$i]] as $key => $value) 
            {
                switch($key)
                {
                    case "name":
                        $repo->setName($value);
                        break;
                    case "description":
                        $repo->setDescription($value);
                        break;
                    case "isFork":
                        if($value == true){
                            $repo->setIsForked (true);
                        }
                        else {
                            $repo->setIsForked (false);
                        }
                        break;
                    case "updatedAt":
                        $repo->setUpdatedAt($value);
                        break;
                    case "url":
                        $repo->setURL($value);
                        break;
                }
            }
            $repos[] = $repo;
            unset($repo);            
        }

        return $repos;
    }
    
    function curlRequest()
    {
        $service_url = 'https://api.github.com/graphql';
        $curl = curl_init($service_url);

        $curl_post_data = array("query" => '{viewer { repositories(last: 100) { nodes { name description isFork updatedAt url }}}}');
        $data_string =  json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'User-Agent: Awesome-Octocat-App',
            'Authorization: bearer ' . gitToken,
            'Content-Length: ' . strlen($data_string))
        );

            $curl_response = curl_exec($curl);
        if ($curl_response === false) {
            $info = curl_getinfo($curl);
            curl_close($curl);
            die('error occured during curl exec. Additioanl info: ' . var_export($info));
        }
        curl_close($curl);
        
        return $curl_response;
    }
}


                /*echo $key . " : ";
                if(is_bool($value) == true)
                {
                    if($value == true)
                        echo "true" . "<br>";
                    else
                        echo "false" . "<br>";
                }
                else 
                {
                    echo $value . "<br>";
                }*/