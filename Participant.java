import java.util.*;
import java.io.*;
// import java.sql.*;
import java.lang.Thread;


public class Participant {
        static String name=null;
        static String password=null;
        static String product=null;
        static String date_of_birth=null;
        static String product_name=null;
        static String loginName=null;
        static String loginPassword=null;
        static String product_description=null;
        static int quantities=0;
        static int rate_per_item=0;
        static String command=null;
        static String command2=null;
        static int stock_added=0;
        static String performance=null;
        static String pass=null;
        static String part_id=null;
        static int pId=0;
        static int loginID=0;
        
        static Scanner sc=new Scanner(System.in);
        
        
    
    public static void main(String[] args) throws FileNotFoundException,IOException {
        
        File del1 = new File("verify2.txt");
        File del2 = new File("participantPerfomance.txt");
        File del3 =new File("participantId.txt");

do{
        // Participant obj=new Participant();
        String pDetails="participant.txt";
        String products="products.txt";
        String perform="performance.txt";
        String addProduct="addproduct.txt";
        String verify="verify.txt";
        
        PrintWriter p=new PrintWriter(new FileWriter(pDetails,true),true);
        PrintWriter p2=new PrintWriter(new FileWriter(products,true),true);
        PrintWriter p3=new PrintWriter(new FileWriter(perform,true),true);
        PrintWriter p4=new PrintWriter(new FileWriter(addProduct,true),true);
        PrintWriter p5=new PrintWriter(verify);


        System.out.println("****** Welcome to PMSM ******");
        System.out.println("******Are you registered?(Y/N)******");
        String userOption=sc.nextLine();
       
        if(userOption.equalsIgnoreCase("N")){
            register_participant();

            // Writes participant details to the file
            p.print(name +";"+ password  +";"+ product +";"+ date_of_birth);
            p.println();
            p.close();

            
            System.out.println("Please wait as we retrieve your participant_Id");
            try{
                Thread.sleep(63000);
            }catch(Exception e){
                System.out.println(e);
            }
            BufferedReader b3=new BufferedReader (new InputStreamReader(new FileInputStream("participantId.txt")));
            part_id=b3.readLine();
            b3.close();
            
            System.out.println(part_id);
            del3.delete();
            
            Post_product();
            
            // writes product details to file
            p2.print(product_name +";"+ quantities +";"+ rate_per_item +";"+ product_description+";"+pId);
            p2.println();
            p2.close();

        }

        else {
           String[] log;
        do{ System.out.println("Login \nname password Participant_id");

            // gets login details
            loginName=sc.next();
            loginPassword=sc.next();
            loginID=sc.nextInt();
            sc.nextLine();
            // login();
            p5.print(loginName+";");
            p5.println();
            p5.close();
        
            System.out.println("========  verifying information, it will take about a minute  =========");
            System.out.println("========    PLEASE WAIT!    =========");
            
                try{
                    Thread.sleep(63000);
                }catch(Exception e){
                    System.out.println(e);
                }
                
            BufferedReader b2=new BufferedReader (new InputStreamReader(new FileInputStream("verify2.txt")));
            pass=b2.readLine();
            b2.close();
            del1.delete();
            log=pass.split(";");
            System.out.println(log[0]);
            if(log[0].matches(loginPassword)){
                System.out.println("Login successful");
                System.out.println("****** Which service do you require? ******");
                System.out.println("Performance");
                System.out.println("Add_product_quantity");
                
                command2=sc.nextLine();
                if(command2.equalsIgnoreCase("Performance")){
                System.out.println("Your results will be ready in atleast 1 minute please wait");
                p3.print(loginName+";"+loginID);
                p3.println();
                p3.close();
                
                try{
                    Thread.sleep(63000);
                }catch(Exception e){
                    System.out.println(e);
                }

                BufferedReader b=new BufferedReader (new InputStreamReader(new FileInputStream("participantPerformance.txt")));
               performance=b.readLine();
                b.close();
                del2.delete();

                String[] pfd=performance.split(" "); 
                System.out.println(pfd[0]);
                System.out.println(pfd[1]);
                
            }
            else {
                System.out.println("====Enter quantity of stock added====");
                stock_added=sc.nextInt();
                p4.print(stock_added+";"+loginID);
                p4.println();
                p4.close();
            }
                break;
            } else {
                System.out.println("Wrong details");
            }
                
            

           } while (!(log[0].matches(loginPassword)));

            
            
            

        }
        System.out.println("Type Exit to stop or press Enter to continue");
        command=sc.nextLine();
    }while(!command.equalsIgnoreCase("Exit"));

    
    }
    public static void register_participant() {
        System.out.println("Register name(firstName_lastName) password product date_of_birth(YYYY-MM-DD) ");
            name=sc.next();
            password=sc.next();
            product=sc.next();
            date_of_birth=sc.next();
            
            // return

    }
    public static void Post_product(){
        System.out.println("Post_product \nparticipant_id product_name quantities rate_per_item description");
            pId=sc.nextInt();
            product_name=sc.next();
            quantities=sc.nextInt();
            rate_per_item=sc.nextInt();
            product_description=sc.nextLine();
    }

    public static void performance(){
        System.out.println("Enter Perfomance to view your prgress");
    }


    
}
