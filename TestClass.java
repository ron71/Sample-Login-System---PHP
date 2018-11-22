/* IMPORTANT: Multiple classes and nested static classes are supported */

/*
 * uncomment this if you want to read input.
//imports for BufferedReader
import java.io.BufferedReader;
import java.io.InputStreamReader;*/

//import for Scanner and other utility classes
import java.util.*;


// Warning: Printing unwanted or ill-formatted data to output will cause the test cases to fail

class TestClass {
    int count;
    int k;
    int a[];
    
    int countFunction(){
        
        for(int i=0;i<a.length;i++){
            while(a[i]<k){
                count++;
                for(int j=0; j<a.length;j++){
                    ++a[j];
                }
            }
        }
        return count;
    }
    
    public static void main(String args[] ) throws Exception {
        /* Sample code to perform I/O:
         * Use either of these methods for input

        //BufferedReader
        BufferedReader br = new BufferedReader(new InputStreamReader(System.in));
        String name = br.readLine();                // Reading input from STDIN
        System.out.println("Hi, " + name + ".");    // Writing output to STDOUT
*/
        //Scanner
        Scanner sc = new Scanner(System.in);
        int testCase = sc.nextInt();                 // Reading input from STDIN
        //System.out.println("Hi, " + name + ".");    // Writing output to STDOUT
        TestClass ob[] = new TestClass[testCase];
        for(int i=0;i<ob.length;i++){
            ob[i] = new TestClass();
            int N = sc.nextInt();
            ob[i].k = sc.nextInt();
            ob[i].a = new int[N];
            for(int j=0; j<ob[i].a.length;j++){
                ob[i].a[j] = sc.nextInt();
            }
        }
        //now calling countfunction
        for(int i=0;i<ob.length;i++){
            System.out.println(ob[i].countFunction());
            
        }
        
        

        // Write your code here

    }
}
