<?php
header('Content-Type: application/json');

require_once("connection.inc.php");
if(isset($_GET['tgl1']) and ($_GET['tgl2'])){
    $tglAwal=$_GET['tgl1'];
    $tglAkhir=$_GET['tgl2'];
    $sql = "SELECT * FROM tb_markers WHERE tanggal BETWEEN '$tglAwal' AND '$tglAkhir'";
    $data=$mysqli->query($sql) or die ("query gagal dijalankan: ".$mysqli->error);
    $json   = array();
    if (!empty($data)) {
        $json = '{"data": {';
        $json .= '"marker":[ ';
        while($x = $data->fetch_object()){
            $json .= '{';
            $json .= '"id":"'.$x->id.'",
                    "nik":"'.$x->nik.'",
                    "nama":"'.$x->nama.'",
                    "alamat":"'.$x->alamat.'",
                    "banjar":"'.$x->banjar.'",
                    "desa":"'.$x->desa.'",
                    "tanggal":"'.$x->tanggal.'",
                    "lat":"'.$x->lat.'",
                    "lng":"'.$x->lng.'",
                    "tpa_dalam":"'.$x->tpa_dalam.'",
                    "tpa_luar":"'.$x->tpa_luar.'",
                    "id_user":"'.$x->id_user.'",
                    "category":"'.$x->category.'"
                    },';
        }
        $json = substr($json,0,strlen($json)-1);
        $json .= ']';
        $json .= '}}';
        
        echo $json;
    }
}
else{
    $sql = "SELECT * FROM tb_markers";
    $data=$mysqli->query($sql) or die ("query gagal dijalankan: ".$mysqli->error);
    $json   = array();
    if (!empty($data)) {
        $json = '{"data": {';
        $json .= '"marker":[ ';
        while($x = $data->fetch_object()){
            $json .= '{';
            $json .= '"id":"'.$x->id.'",
                    "nik":"'.$x->nik.'",
                    "nama":"'.$x->nama.'",
                    "alamat":"'.$x->alamat.'",
                    "banjar":"'.$x->banjar.'",
                    "desa":"'.$x->desa.'",
                    "tanggal":"'.$x->tanggal.'",
                    "lat":"'.$x->lat.'",
                    "lng":"'.$x->lng.'",
                    "tpa_dalam":"'.$x->tpa_dalam.'",
                    "tpa_luar":"'.$x->tpa_luar.'",
                    "id_user":"'.$x->id_user.'",
                    "category":"'.$x->category.'"
                    },';
        }
        $json = substr($json,0,strlen($json)-1);
        $json .= ']';
        $json .= '}}';
        
        echo $json;
    }
}