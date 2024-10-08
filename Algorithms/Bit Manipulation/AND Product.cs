using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'andProduct' function below.
     *
     * The function is expected to return a LONG_INTEGER.
     * The function accepts following parameters:
     *  1. LONG_INTEGER a
     *  2. LONG_INTEGER b
     */

    public static long andProduct(long a, long b)
    {
        int shiftCount = 0;

        while (a != b)
        {
            a >>= 1;
            b >>= 1;
            shiftCount++;
        }

        return a << shiftCount;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int n = Convert.ToInt32(Console.ReadLine().Trim());

        for (int nItr = 0; nItr < n; nItr++)
        {
            string[] firstMultipleInput = Console.ReadLine().TrimEnd().Split(' ');

            long a = Convert.ToInt64(firstMultipleInput[0]);
            long b = Convert.ToInt64(firstMultipleInput[1]);

            long result = Result.andProduct(a, b);

            textWriter.WriteLine(result);
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
