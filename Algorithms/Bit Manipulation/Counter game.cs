using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'counterGame' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts LONG_INTEGER n as parameter.
     */

    public static string counterGame(long n)
    {
        int turnCount = 0;

        while (n > 1)
        {
            if ((n & (n - 1)) == 0)
            {
                n /= 2;
            }
            else
            {
                long largestPowerOfTwo = 1L << (int)Math.Floor(Math.Log(n) / Math.Log(2));
                n -= largestPowerOfTwo;
            }
            turnCount++;
        }

        return turnCount % 2 == 0 ? "Richard" : "Louise";
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int t = Convert.ToInt32(Console.ReadLine().Trim());

        for (int tItr = 0; tItr < t; tItr++)
        {
            long n = Convert.ToInt64(Console.ReadLine().Trim());

            string result = Result.counterGame(n);

            textWriter.WriteLine(result);
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
