<?php

class ControllerPhoto
{ 
    private $db;
    private $pdo;
    function __construct() 
    {
        // connecting to database
        $this->db = new DB_Connect();
        $this->pdo = $this->db->connect();
    }
 
    function __destruct() { }
 
    public function updatePhoto($itm) 
    {
        $stmt = $this->pdo->prepare('UPDATE tbl_mavis_photos 
                                        SET 
                                            photo_url = :photo_url, 
                                            thumb_url = :thumb_url, 
                                            destination_id = :destination_id  

                                            WHERE photo_id = :photo_id');

        $result = $stmt->execute(
                            array('photo_url' => $itm->photo_url,
                                    'thumb_url' => $itm->thumb_url,
                                    'destination_id' => $itm->destination_id, 
                                    'photo_id' => $itm->photo_id) );
        
        return $result ? true : false;
    }


    public function insertPhoto($itm) 
    {
        $stmt = $this->pdo->prepare('INSERT INTO tbl_mavis_photos( 
                                            photo_url, 
                                            thumb_url, 
                                            destination_id ) 

                                        VALUES(
                                            :photo_url, 
                                            :thumb_url, 
                                            :destination_id )');

        $result = $stmt->execute(
                            array('photo_url' => $itm->photo_url,
                                    'thumb_url' => $itm->thumb_url,
                                    'destination_id' => $itm->destination_id ) );
        
        return $result ? true : false;
    }
 
    public function deletePhoto($photo_id, $is_deleted) 
    {
        $stmt = $this->pdo->prepare('UPDATE tbl_mavis_photos 
                                
                                        SET 
                                            is_deleted = :is_deleted 

                                        WHERE photo_id = :photo_id');
        
        $result = $stmt->execute(
                            array('photo_id' => $photo_id,
                                    'is_deleted' => $is_deleted ) );
        
        return $result ? true : false;
    }

    
    public function getPhotos() 
    {
        $stmt = $this->pdo->prepare('SELECT * 

                                        FROM tbl_mavis_photos 
                                        WHERE is_deleted = 0');

        $stmt->execute();

        $array = array();
        $ind = 0;
        foreach ($stmt as $row) 
        {
            // do something with $row
            $itm = new Photo();
            $itm->photo_id = $row['photo_id'];
            $itm->photo_url = $row['photo_url'];
            $itm->thumb_url = $row['thumb_url'];
            $itm->destination_id = $row['destination_id'];

            $array[$ind] = $itm;
            $ind++;
        }
        return $array;
    }

    public function getPhotoDestinationByDestinationId($destination_id) 
    {
        $stmt = $this->pdo->prepare('SELECT * 

                                        FROM tbl_mavis_photos 
                                        WHERE destination_id = :destination_id AND is_deleted = 0');

        $result = $stmt->execute(
                            array('destination_id' => $destination_id) );

        $array = array();
        $ind = 0;
        foreach ($stmt as $row) 
        {
            // do something with $row
            $itm = new Photo();
            $itm->photo_id = $row['photo_id'];
            $itm->photo_url = $row['photo_url'];
            $itm->thumb_url = $row['thumb_url'];
            $itm->destination_id = $row['destination_id'];

            $array[$ind] = $itm;
            $ind++;
        }
        return $array;
    }


    public function getPhotoByPhotoId($photo_id) 
    {
        $stmt = $this->pdo->prepare('SELECT * 

                                        FROM tbl_mavis_photos 
                                        WHERE photo_id = :photo_id');

        $result = $stmt->execute(
                            array('photo_id' => $photo_id) );

        foreach ($stmt as $row) 
        {
            // do something with $row
            $itm = new Photo();
            $itm->photo_id = $row['photo_id'];
            $itm->photo_url = $row['photo_url'];
            $itm->thumb_url = $row['thumb_url'];
            $itm->destination_id = $row['destination_id'];

            return $itm;
        }
        return null;
    }


    public function getNoOfPhotosByDestinationId($destination_id) 
    {
       $stmt = $this->pdo->prepare('SELECT * 

                                        FROM tbl_mavis_photos 
                                        WHERE destination_id = :destination_id AND is_deleted = 0');

        $result = $stmt->execute(
                            array('destination_id' => $destination_id) );

        $no_of_rows = $stmt->rowCount();

       return $no_of_rows;
    }

    public function getPhotoByRestaurantId($destination_id) 
    {
        $stmt = $this->pdo->prepare('SELECT * 

                                        FROM tbl_mavis_photos 
                                        WHERE destination_id = :destination_id');

        $result = $stmt->execute(
                            array('destination_id' => $destination_id) );

        foreach ($stmt as $row) 
        {
            // do something with $row
            $itm = new Photo();
            $itm->photo_id = $row['photo_id'];
            $itm->photo_url = $row['photo_url'];
            $itm->thumb_url = $row['thumb_url'];
            $itm->destination_id = $row['destination_id'];

            return $itm;
        }
        return null;
    }

    

}
 
?>