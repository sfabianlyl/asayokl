<?php

namespace App\Helpers;

use Google_Client;
use Google_Service_Sheets;
use Google_Service_Sheets_ValueRange;

class GoogleSheetConnection{
    private $client;
    private $sheets;
    private $id;
    private $sheet;
    private $range;
    
    public function __construct(){
        $this->client= new Google_Client();
        $this->client->setApplicationName('My PHP App');
        $this->client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $this->client->setAccessType('offline');
        $this->client->setAuthConfig('../cdac4de75d4e/asayokldb-cdac4de75d4e.json');
        $this->sheets = new \Google_Service_Sheets($client);    
    }
    public function connect($id, $sheet, $range="A1:Z"){
        $this->id=$id;
        $this->range="$sheet!$range";
    }
    
    public function count_rows(){
        $rows = $this->sheets->spreadsheets_values->get($this->id, $this->range, ['majorDimension' => 'ROWS']);
        return count($rows['values']);
    }
    
    public function add($data, $timestamp=true, $count=true){
        if($count) array_unshift($data, $this->count_rows() );
        if($timestamp) $data[]=date("jS F Y, g:i a");
        
        $values=array($data);
        $body = new Google_Service_Sheets_ValueRange([
            'values' => $values
        ]);
        $result = $this->sheets->spreadsheets_values->append($this->id, $this->range, $body,['valueInputOption' => 'RAW']);
    }
}