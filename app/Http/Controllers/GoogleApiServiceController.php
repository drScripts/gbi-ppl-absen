<?php 

namespace App\Http\Controllers;

use App\Models\GoogleApiToken;
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;
use Google\Client;

class GoogleApiServiceController
{
    protected $client;
    protected $service;
    protected $ClientId     = '979082150599-v5udges2nfddnlfjhc87oh3e9udef2k5.apps.googleusercontent.com';
    protected $ClientSecret = 'vF_sz9v5MhsaUuXRCW0ZLFPo'; 
    public function __construct($refresh_token,$access_token)
    {
        $refresh_token = '';
        $this->client = new \Google_Client();
        $this->client->setClientId($this->ClientId);
        $this->client->setClientSecret($this->ClientSecret);
       
        $this->client->refreshToken(strval("$refresh_token"));
        $this->client->setAccessToken(strval("$access_token"));

        $this->service = new \Google_Service_Drive($this->client);
    }

    public function create_folder($name,$parent_id)
    {
        $fileMetadata = new \Google_Service_Drive_DriveFile([
            'name'     => $name,
            'mimeType' => 'application/vnd.google-apps.folder',
            'parents'  => [$parent_id],
        ]);
        
        $folder = $this->service->files->create($fileMetadata);
            
        return $folder;
    }
 

    public function push_file($name,$parent_id,$data,$file)
    {

        $fileMetadata = new \Google_Service_Drive_DriveFile(array(
            //Set the Random Filename
            'name' => $name . '.' . $data['extension'],
            //Set the Parent Folder
            'parents' => array($parent_id) // this is the folder id
        ));
    
        
    
            $newFile = $this->service->files->create(
                $fileMetadata,
                array(
                    'data' => file_get_contents($file), 
                    'uploadType' => 'media'
                )
            );
            
        return $newFile;
    }

    public function remove_duplicated($file)
    {
        $response = $this->service->files->listFiles([
            'q' => "'$this->folder_id' in parents and name contains '$file' and trashed=false",
        ]);

        foreach ($response->files as $found) {
            return $this->service->files->delete($found->id);
        }
    }

    public function upload_files($parent_id)
    {
        $adapter    = new GoogleDriveAdapter($this->service, $parent_id);
        $filesystem = new Filesystem($adapter);

        // here we are uploading files from local storage
        // we first get all the files
        $files = Storage::files();

        // loop over the found files
        foreach ($files as $file) {
            
            // remove file from google drive in case we have something under the same name
            // comment out if its okay to have files under the same name
            $this->remove_duplicated($file);

            // read the file content
            $read = Storage::get($file);
            // save to google drive
            $filesystem->write($file, $read);
            // remove the local file
            Storage::delete($file);
        }
    }

    public function files_count()
    {
        $response = $this->service->files->listFiles([
            'q' => "'$this->folder_id' in parents and trashed=false",
        ]);

        return count($response->files);
    }

    public function get_folder($file){
        $response = $this->service->files->listFiles([
            'q' => "'$this->folder_id' in parents and name contains '$file' and trashed=false",
        ]);

        return $response;
    }

    public function search_parents_date_folder($name,$parent_id){
        $response = $this->service->files->listFiles([
            'q' => "'$parent_id' in parents and name contains '$name'",
        ]); 

        $exist_id ='';
        if($response['files']){
            $exist_id  = $response['files'][0]['id'];
        }else{
            $response = $this->create_folder($name,$parent_id);
            $exist_id = $response->id;
        }
        return $exist_id;
    }
 

}