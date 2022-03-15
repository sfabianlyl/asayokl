<?php

namespace App\Helpers;

use Google\Client;
use Google\Service\Drive;
use Google\Service\Drive\DriveFile;

class GoogleDriveConnection{
    private $client;
    private $sheets;
    private $id;
    private $drive;
    private $range;
    
    public function __construct(){
        $this->client= new Client();
        $this->client->setApplicationName('My PHP App');
        $this->client->setScopes([ 
            'https://www.googleapis.com/auth/drive.file',
            'https://www.googleapis.com/auth/drive'
        ]);
        $this->client->setAccessType('offline');
        $this->client->setAuthConfig(storage_path('cdac4de75d4e/asayokldb-cdac4de75d4e.json'));
        $this->client->setApprovalPrompt("force");
        $this->drive = new Drive($this->client);    
    }
    
    public function upload($parent,$name="file",$path){
        $file = new DriveFile(array(
            'name' => $name,
            'parents' => array($parent)
        ));
        $result = $this->drive->files->create($file, array(
            'data' => file_get_contents(storage_path($path)),
            'mimeType' => 'application/octet-stream',
            'uploadType' => 'resumable'
        ));
    }
}