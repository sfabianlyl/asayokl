<?php

namespace App\Helpers;

use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;

class GoogleSheetConnection{
    private $client;
    private $sheets;
    private $id;
    private $sheet;
    private $range;
    
    public function __construct(){
        $this->client= new Client();
        $this->client->setApplicationName('My PHP App');
        $this->client->setScopes([Sheets::SPREADSHEETS]);
        $this->client->setAccessType('offline');
        $this->client->setAuthConfig(storage_path('cdac4de75d4e/asayokldb-cdac4de75d4e.json'));
        $this->sheets = new Sheets($this->client);    
    }
    public function connect($id, $sheet="Sheet1", $range="A1:Z"){
        $this->id=$id;
        if($sheet=="Sheet1") $this->range=$range;
        else $this->range="$sheet!$range";
    }
    
    public function count_rows(){
        $rows = $this->sheets->spreadsheets_values->get($this->id, $this->range, ['majorDimension' => 'ROWS']);
        return count($rows['values']??[]);
    }
    
    public function add($data, $timestamp=true, $count=true){
        if($count) array_unshift($data, $this->count_rows() );
        if($timestamp) $data[]=date("jS F Y, g:i a");
        
        foreach($data as $key=>$value){
            if(!$data[$key]) $data[$key]="";
        }
        
        $values=array(array_values($data));
        $body = new ValueRange([
            'values' => $values
        ]);
        $result = $this->sheets->spreadsheets_values->append($this->id, $this->range, $body,['valueInputOption' => 'RAW']);
    }
}