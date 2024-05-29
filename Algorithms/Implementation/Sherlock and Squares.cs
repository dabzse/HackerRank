using System;
using System.IO;
using System.Collections.Generic;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'squares' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts following parameters:
     *  1. INTEGER a
     *  2. INTEGER b
     */

    public static int squares(int a, int b)
    {
        int count = 0;
        int start = (int)(Math.Pow(a, 0.5));
        if (Math.Pow(start, 2) < a) start += 1;
        for (int i = start; i*i <= b; i++) count += 1;
        return count;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int q = Convert.ToInt32(Console.ReadLine().Trim());

        for (int qItr = 0; qItr < q; qItr++)
        {
            string[] firstMultipleInput = Console.ReadLine().TrimEnd().Split(' ');

            int a = Convert.ToInt32(firstMultipleInput[0]);
            int b = Convert.ToInt32(firstMultipleInput[1]);
            int result = Result.squares(a, b);

            textWriter.WriteLine(result);
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
