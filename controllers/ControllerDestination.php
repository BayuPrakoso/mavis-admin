    <?php
 
class ControllerDestination
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
 
    public function updateDestination($itm) 
    {
        $stmt = $this->pdo->prepare('UPDATE tbl_mavis_destination

                                        SET name = :name, 
                                            address = :address, 
                                            lat = :lat, 
                                            lon = :lon, 
                                            desc1 = :desc1, 
                                            email = :email, 
                                            website = :website, 
                                            transport = :transport, 
                                            destination_rating = :destination_rating, 
                                            price_rating = :price_rating, 
                                            featured = :featured, 
                                            phone = :phone, 
                                            hours = :hours, 
                                            created_at = :created_at, 
                                            category_id = :category_id 
                                        WHERE destination_id = :destination_id');

        $result = $stmt->execute(
                            array('name' => $itm->name,
                                    'address' => $itm->address,  
                                    'lat' => $itm->lat,
                                    'lon' => $itm->lon,
                                    'desc1' => $itm->desc1,
                                    'email' => $itm->email,
                                    'website' => $itm->website,
                                    'transport' => $itm->transport,
                                    'destination_rating' => $itm->destination_rating,
                                    'price_rating' => $itm->price_rating,
                                    'featured' => $itm->featured,
                                    'phone' => $itm->phone,
                                    'hours' => $itm->hours,
                                    'created_at' => $itm->created_at,
                                    'category_id' => $itm->category_id,
                                    'destination_id' => $itm->destination_id ) );
        
        return $result ? true : false;

    }


    public function deleteDestination($destination_id, $is_deleted) 
    {
        $stmt = $this->pdo->prepare('UPDATE tbl_mavis_destination
                                        SET is_deleted = :is_deleted 
                                        WHERE destination_id = :destination_id ');
        
        $result = $stmt->execute(
                            array('destination_id' => $destination_id, 
                                    'is_deleted' => $is_deleted) );

        return $result ? true : false;
    }

    public function updateDestinationsFeatured($itm) 
    {
        $stmt = $this->pdo->prepare('UPDATE tbl_mavis_destination
                                        SET featured = :featured 
                                        WHERE destination_id = :destination_id ');
        
        $result = $stmt->execute(
                            array('destination_id' => $itm->destination_id, 
                                    'featured' => $itm->featured) );
        
        return $result ? true : false;
    }


    public function insertDestination($itm) 
    {
        $stmt = $this->pdo->prepare('INSERT INTO tbl_mavis_destination( 
                                    name, 
                                    address, 
                                    lat, 
                                    lon, 
                                    desc1, 
                                    email, 
                                    website, 
                                    transport, 
                                    destination_rating, 
                                    price_rating, 
                                    featured, 
                                    phone, 
                                    hours, 
                                    created_at, 
                                    category_id ) 

                                VALUES(
                                    :name, 
                                    :address, 
                                    :lat, 
                                    :lon, 
                                    :desc1, 
                                    :email, 
                                    :website, 
                                    :transport, 
                                    :destination_rating, 
                                    :price_rating, 
                                    :featured, 
                                    :phone, 
                                    :hours, 
                                    :created_at, 
                                    :category_id )');
        
        $result = $stmt->execute(
                            array('name' => $itm->name,
                                    'address' => $itm->address,  
                                    'lat' => $itm->lat,
                                    'lon' => $itm->lon,
                                    'desc1' => $itm->desc1,
                                    'email' => $itm->email,
                                    'website' => $itm->website,
                                    'transport' => $itm->transport,
                                    'destination_rating' => $itm->destination_rating,
                                    'price_rating' => $itm->price_rating,
                                    'featured' => $itm->featured,
                                    'phone' => $itm->phone,
                                    'hours' => $itm->hours,
                                    'created_at' => $itm->created_at,
                                    'category_id' => $itm->category_id ) );
        
        return $result ? true : false;
    }
 

    public function getDestinations() 
    {
        $stmt = $this->pdo->prepare('SELECT * 
                                        FROM tbl_mavis_destination 
                                        WHERE is_deleted = 0 ORDER BY name ASC');
        
        $stmt->execute();

        $array = array();
        $ind = 0;
        foreach ($stmt as $row) 
        {
            $itm = new Destination();
            $itm->destination_id = $row['destination_id'];
            $itm->name = $row['name'];
            $itm->address = $row['address'];
            $itm->lat = $row['lat'];
            $itm->lon = $row['lon'];
            $itm->desc1 = $row['desc1'];
            $itm->email = $row['email'];
            $itm->website = $row['website'];
            $itm->transport = $row['transport'];
            $itm->destination_rating = $row['destination_rating'];
            $itm->price_rating = $row['price_rating'];
            $itm->featured = $row['featured'];
            $itm->phone = $row['phone'];
            $itm->hours = $row['hours'];
            $itm->created_at = $row['created_at'];
            $itm->category_id = $row['category_id'];
            $itm->is_deleted = $row['is_deleted'];

            $array[$ind] = $itm;
            $ind++;
        } 
        
        return $array;
    }

    public function getDestinationsBySearching($search) 
    {
        $stmt = $this->pdo->prepare('SELECT * 
                                FROM tbl_mavis_destination
                                WHERE is_deleted = 0 AND name LIKE :search ORDER BY name ASC');
        
        $stmt->execute( array('search' => '%'.$search.'%'));

        $array = array();
        $ind = 0;
        foreach ($stmt as $row) 
        {
            $itm = new Destination();
            $itm->destination_id = $row['destination_id'];
            $itm->name = $row['name'];
            $itm->address = $row['address'];
            $itm->lat = $row['lat'];
            $itm->lon = $row['lon'];
            $itm->desc1 = $row['desc1'];
            $itm->email = $row['email'];
            $itm->website = $row['website'];
            $itm->transport = $row['transport'];
            $itm->destination_rating = $row['destination_rating'];
            $itm->price_rating = $row['price_rating'];
            $itm->featured = $row['featured'];
            $itm->phone = $row['phone'];
            $itm->hours = $row['hours'];
            $itm->created_at = $row['created_at'];
            $itm->category_id = $row['category_id'];
            $itm->is_deleted = $row['is_deleted'];

            $array[$ind] = $itm;
            $ind++;
        } 
        
        return $array;
    }


    public function getDestinationByDestinationId($destination_id) 
    {
        
        $stmt = $this->pdo->prepare('SELECT * 
                                FROM tbl_mavis_destination
                                WHERE destination_id = :destination_id');
        
        $stmt->execute( array('destination_id' => $destination_id));

        foreach ($stmt as $row) 
        {
            $itm = new Destination();
            $itm->destination_id = $row['destination_id'];
            $itm->name = $row['name'];
            $itm->address = $row['address'];
            $itm->lat = $row['lat'];
            $itm->lon = $row['lon'];
            $itm->desc1 = $row['desc1'];
            $itm->email = $row['email'];
            $itm->website = $row['website'];
            $itm->transport = $row['transport'];
            $itm->destination_rating = $row['destination_rating'];
            $itm->price_rating = $row['price_rating'];
            $itm->featured = $row['featured'];
            $itm->phone = $row['phone'];
            $itm->hours = $row['hours'];
            $itm->created_at = $row['created_at'];
            $itm->category_id = $row['category_id'];
            $itm->is_deleted = $row['is_deleted'];

            return $itm;
        } 
        
        return null;
    }


    public function getDestinationsFeatured() 
    {
        $stmt = $this->pdo->prepare('SELECT * 
                                FROM tbl_mavis_destination 
                                WHERE featured = 1 AND is_deleted = 0');
        
        $stmt->execute();

        $array = array();
        $ind = 0;
        foreach ($stmt as $row) 
        {
            $itm = new Destination();
            $itm->destination_id = $row['destination_id'];
            $itm->name = $row['name'];
            $itm->address = $row['address'];
            $itm->lat = $row['lat'];
            $itm->lon = $row['lon'];
            $itm->desc1 = $row['desc1'];
            $itm->email = $row['email'];
            $itm->website = $row['website'];
            $itm->transport = $row['transport'];
            $itm->destination_rating = $row['destination_rating'];
            $itm->price_rating = $row['price_rating'];
            $itm->featured = $row['featured'];
            $itm->phone = $row['phone'];
            $itm->hours = $row['hours'];
            $itm->created_at = $row['created_at'];
            $itm->category_id = $row['category_id'];
            $itm->is_deleted = $row['is_deleted'];

            $array[$ind] = $itm;
            $ind++;
        } 
        return $array;
    }

}
 
?>