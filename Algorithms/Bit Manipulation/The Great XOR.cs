using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'theGreatXor' function below.
     *
     * The function is expected to return a LONG_INTEGER.
     * The function accepts LONG_INTEGER x as parameter.
     */

    public static long theGreatXor(long x)
    {
        long result = 0;
        long bitPosition = 0;

        while (x > 0)
        {
            if ((x & 1) == 0)
            {
                result += (1L << (int)bitPosition);
            }

            bitPosition++;
            x >>= 1;
        }

        return result;
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
            long x = Convert.ToInt64(Console.ReadLine().Trim());

            long result = Result.theGreatXor(x);

            textWriter.WriteLine(result);
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
