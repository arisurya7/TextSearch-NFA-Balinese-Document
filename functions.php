<?php

//KONEKSI DATABASE
$conn=mysqli_connect('localhost','root','','tbo');

//FUNGSI TRANSITION
function Transition($input,$nState,$sig,$f,$finalState){
    $string=str_split(implode(" ",$f));
    $string[]=" ";
    $headstate=0;
    $curentState="";
    $front=0;
    $sameHead=0;
    $iter=1;
    $delta=array();

    //TRANSITION
    for($i=0; $i<$nState; $i++){
        //ASCII
        $state=chr(65+$i);
        foreach ($sig as $q){
            // KETIKA START STATE
            if($i==0){
                if(strcmp($q," ")==0){
                    $delta["$state"]["$q"]=["A","B"];
                } else{
                    $delta["$state"]["$q"]=["A"];
                }
            } 
            //PERCABANGAN STATE BERDASARKAN HURUF DEPAN SETIAP KATA
            else if($i==1){
                if(strcmp($q,"Σ")==0){
                    $delta["$state"]["$q"]=["A"];
                }
                else if($headstate<count($f)){
                    for ($y=0; $y<count($f); $y++){
                        if($q==substr($f[$y],0,1)){
                            $headstate++;
                            $sameHead++;
                            if($front==0){
                                $front=1;
                                $curentState=chr(ord($state)+1);
                                $delta["$state"]["$q"][]="$curentState";
                                $curentState=chr(ord($curentState)+strlen($f[$y])+1);
                            }else{
                                $delta["$state"]["$q"][]="$curentState";
                                $curentState=chr(ord($curentState)+strlen($f[$y]));
                            }
                        }
                    }
        
                    if($sameHead==0){
                        $delta["$state"]["$q"]=[];
                    }
                    $sameHead=0;
                }else{
                    $delta["$state"]["$q"]=[];
                }
            }
            //KETIKA BERTEMU SIMBOL FINAL STATE
            else if ($i==strlen($f[0])+2) {
                $delta["$state"]["$q"]=["$finalState"];
            } 
            else{
                if(isset($string[$iter])){
                    if($q==$string[$iter]){
                        $curentState=chr(ord($state)+1);
                        if($q==" "){
                             $delta["$state"]["$q"]=["$finalState"];
                        }else{
                            $delta["$state"]["$q"]=["$curentState"];
                        }            
                    }
                    else{
                        if(strcmp($q,"Σ")==0){
                            $delta["$state"]["$q"]=["A"];
                        }else{
                            $delta["$state"]["$q"]=[];
                        }
                        
                    }
                }
            }
        }
        
        // SET VARIABEL iter 
        if(($i>1)&&($i!=strlen($f[0])+2)){
            if($string[$iter]==" "){
                $iter=$iter+2;
            }else{
                $iter++;
            }
        }

    }

    return $delta;
}

//FUNGSI NFA DELTA TOPI
function NFA($limit,$sig,$deltaN,$finalState){
    global $conn;
    $validDoc=array();
    //QUERY
    $query=mysqli_query($conn,"select * from docbali");

    //MENGCEK DATA KE DATABASE BERSADARKAN QUERY DAN LIMIT DOC SESUAI SKENARIO TESTING
    while (($data=mysqli_fetch_assoc($query)) && ($limit>0)){
        
        $limit--;
        //MENAGKAP NILAI QUERY 
        $file=$data;
        $id=$file["id"];
        $judul=$file["judul"];
        $isi=$file["isi"];
        //Menggabungkan judul dengn isi. Lalu dipecah menjadi array kalimat berdasarkan tanda titik
        $sentences =preg_replace('/[^A-Za-z0-9\  ]/','', explode('.',strtolower("$judul"."$isi")));
        
        //DEKLARASI ARRAY
        $deltaTopi=array();
        $hm=array();
    
          //CEK SETIAP KALIMAT
          $valid=False;
          foreach($sentences as $sentence){
            //NFA
            $strings=str_split((" "."$sentence"));
            $strings[]=" ";
            $i=0;
            $indeks=0;
           
            //PROSES DELTA TOPI NFA
                foreach($strings as $str){
                    
                    //SET NILAI AWAL
                    if($i==0){
                        $deltaTopi[0]="A";  
                    }
                    
                    //BREAK KETIKA KOSONG
                    if(!$deltaTopi[$i]){
                      break;
                    }

                    //CEK APAKAH STRING SIMBOL ATAU TIDAK
                    if(!in_array("$str",$sig)){
                        $deltaTopi[$i+1]="A";
                    }else{
                        $indeks=count(explode(",",$deltaTopi[$i]));
                        if($indeks<2){
                            $deltaTopi[$i+1]=join(",",$deltaN[$deltaTopi[$i]][$str]);
                            if(!$deltaTopi[$i+1]){
                                break;
                            }
                        }
                        else{
                            $w=explode(",",$deltaTopi[$i]);
                            for($j=0; $j<count($w); $j++){
                                $hm=array_unique(array_merge($hm, $deltaN[$w[$j]][$str]));  
                            }  
                            $deltaTopi[$i+1]=join(",",$hm);
                            $hm=[];
                        } 
                    }

                    //BREAK SAAT MENEMUKAN FINAL STATE
                    if( in_array("$finalState", explode(",",$deltaTopi[$i])) || in_array("$finalState", explode(",",$deltaTopi[$i+1])) ){
                        $valid=True;
                        $validDoc[]=["$id","$judul","$sentence"];
                        break;
                    }
                    $i++;  
                }
            //BREAK MENUJU FILE DOC BERIKUTNYA
            if($valid==True){
                break;
            }

          }
    }

    return $validDoc;
}

?>