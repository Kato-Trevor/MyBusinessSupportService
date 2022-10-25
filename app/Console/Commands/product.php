<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use mysqli;

class product extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:everyMinute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'inserts product details into the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $conn= new mysqli('localhost','root','','myanka');
        
        if(file_exists("products.txt")){
         $product_details=file_get_contents("products.txt");
        } else {
            die("File doesnot exist");
        }
        $product_array=explode(";",$product_details);
        
        $sql ="INSERT INTO products (`name`,`stock_quantity`,`quantity_published`,`price`,`description`,`participant_id`) VALUES ('{$product_array[0]}','{$product_array[1]}','{$product_array[1]}','{$product_array[2]}','{$product_array[3]}','{$product_array[4]}')";
        gc_collect_cycles();
        unlink("products.txt");
 
        if($conn->query($sql)===TRUE) {
         echo "New record created successfully";
        } else {
         echo "Error".$sql. "<br>". $conn->error;
        }
        $conn->close();
    }
}
