<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use mysqli;

class verification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'verification:everyMinute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verifies login details';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $conn= new mysqli('localhost','root','','myanka');
        
        if(file_exists("verify.txt")){
         $loginN=file_get_contents("verify.txt");
        } else {
            die("File doesnot exist");
        }
        $log=explode(";",$loginN);
       
        
        
        
        $sql ="SELECT `password` FROM participants WHERE `name`='{$log[0]}'";
        
        echo $loginN;
        
        $result = $conn->query($sql);
        

        if ($result->num_rows > 0) {
          // output data of each row
          $myfile = fopen("verify2.txt", "w") or die("Unable to open file");
          while($row = $result->fetch_assoc()) {
            fwrite($myfile,$row["password"].";");
            echo  $row["password"];
          }
        } else {
          echo "0 results";
        }
        gc_collect_cycles();
        unlink("verify.txt");
        
       
        $conn->close();
    }
}
