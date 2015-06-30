<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  function cnv($cnv)
  {
    $roman = array(
                    "I"   => 1,
                    "II"  => 2,
                    "III" => 3,
                    "IV"  => 4
                  );
    $alphabet = array(
                    "a" => 1,
                    "b" => 2,
                    "c" => 3,
                    "d" => 4,
                    "e" => 5,
                  );
    $pecah = explode("/",$cnv);
    $nmb1=$roman[$pecah[0]];
    $nmb2=$alphabet[$pecah[1]];
    $nmb3=$nmb1.$nmb2;
    return $nmb3;
  }

  function cnvdateindo($date){
    if(isset($date)){
    $array_bulan = array("01"=>"Januari","02"=>"Febuari","03"=>"Maret","04"=>"April","05"=>"Mei","06"=>"Juni","07"=>"Juli",
                    "08"=>"Agustus","09"=>"September","10"=>"Oktober","11"=>"November","12"=>"Desember");
    $datesplit = explode("-",$date);
    $tanggal = $datesplit[2];
    $bulan = $array_bulan[$datesplit[1]];
    $tahun = $datesplit[0];

    $dateindo = $tanggal." ".$bulan." ".$tahun;
    return $dateindo;
    }
    else 
    {
      return "-";
    }
  }

  function npersen($n,$prsn){
    $x = $n*$prsn/100;
    return $x;
  }
