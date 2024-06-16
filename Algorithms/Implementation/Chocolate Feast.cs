using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'chocolateFeast' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts following parameters:
     *  1. INTEGER n
     *  2. INTEGER c
     *  3. INTEGER m
     */

    public static int chocolateFeast(int n, int c, int m)
    {

        int chocolates = n / c;
        int wrappers = chocolates;
        int count = chocolates;

        while (wrappers >= m)
        {
            int extraChocolates = wrappers / m;
            count += extraChocolates;
            wrappers = extraChocolates + wrappers % m;
        }
        return count;
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
            string[] firstMultipleInput = Console.ReadLine().TrimEnd().Split(' ');

            int n = Convert.ToInt32(firstMultipleInput[0]);
            int c = Convert.ToInt32(firstMultipleInput[1]);
            int m = Convert.ToInt32(firstMultipleInput[2]);
            int result = Result.chocolateFeast(n, c, m);

            textWriter.WriteLine(result);
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
