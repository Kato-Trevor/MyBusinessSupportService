<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use mysqli;

class performance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'performance:everyMinute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'gets performance request from the participants and writes in a file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $conn= new mysqli('localhost','root','','myanka');
        if(file_exists("performance.txt")){
          $perform=file_get_contents("performance.txt");
         }else {
          die("File doesnot exist");
         }
         $array=explode(";",$perform);
        $sql ="SELECT `points` FROM participants WHERE `name`='{$array[0]}'";
        gc_collect_cycles();
       unlink("participantPerformance.txt");
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
         
          $myfile = fopen("participantPerformance.txt", "a") or die("Unable to open file");
            
          while($row = $result->fetch_assoc()) {
          fwrite($myfile,"Points:".$row["points"]." ");
          
          }
          $sql2 ="SELECT `stock_quantity` FROM products WHERE `participant_id`='{$array[1]}'";
        
          $result2 = $conn->query($sql2);
          if ($result2->num_rows > 0) {
           
            $myfile = fopen("participantPerformance.txt", "a") or die("Unable to open file");
              
            while($row = $result2->fetch_assoc()) {
            fwrite($myfile,"Quantity_left:".$row["stock_quantity"]." ");
            
            }
            gc_collect_cycles();
            unlink("performance.txt");
            
          $conn->close();
        }
    }
}
}