<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use mysqli;

class participant extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'participant:everyMinute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stores participant details in the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $conn= new mysqli('localhost','root','','myanka');
        
       if(file_exists("participant.txt")){
        $part_details=file_get_contents("participant.txt");
       }else {
        die("File doesnot exist");
       }
       $part_array=explode(";",$part_details);
       
       $sql ="INSERT INTO participants (`name`,`password`,`product`,`date_of_birth`) VALUES ('{$part_array[0]}','{$part_array[1]}','{$part_array[2]}','{$part_array[3]}')";
       gc_collect_cycles();
       unlink("participant.txt");

       if($conn->query($sql)===TRUE) {
        echo "New record created successfully";
       } else {
        echo "Error".$sql. "<br>". $conn->error;
       }

       $sql2 ="SELECT `participant_id` FROM participants WHERE `name`='{$part_array[0]}'";
       $result = $conn->query($sql2);

       if ($result->num_rows > 0) {
        // output data of each row
        $myfile = fopen("participantId.txt", "a") or die("Unable to open file");
        while($row = $result->fetch_assoc()) {
          fwrite($myfile,$row["participant_id"]);
          echo  $row["participant_id"];
        }
      } else {
        echo "0 results";
      }

       $conn->close();

    }
}
