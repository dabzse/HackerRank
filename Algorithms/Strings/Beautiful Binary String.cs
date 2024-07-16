using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'beautifulBinaryString' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts STRING b as parameter.
     */

    public static int beautifulBinaryString(string b)
    {
        int count = 0;
        for (int i = 0; i < b.Length - 2; i++)
        {
            if (b[i] == '0' && b[i + 1] == '1' && b[i + 2] == '0')
            {
                count++;
                i += 2;
            }
        }
        return count;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int n = Convert.ToInt32(Console.ReadLine().Trim());

        string b = Console.ReadLine();

        int result = Result.beautifulBinaryString(b);

        textWriter.WriteLine(result);

        textWriter.Flush();
        textWriter.Close();
    }
}
