using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'saveThePrisoner' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts following parameters:
     *  1. INTEGER n
     *  2. INTEGER m
     *  3. INTEGER s
     */

    public static int saveThePrisoner(int n, int m, int s)
    {

        int result = 0;
        if (m == 1)
        {
            result = s;
        }
        else
        {
            result = (s + m - 1) % n;
            if (result == 0)
            {
                result = n;
            }
        }
        return result;
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
            int m = Convert.ToInt32(firstMultipleInput[1]);
            int s = Convert.ToInt32(firstMultipleInput[2]);

            int result = Result.saveThePrisoner(n, m, s);

            textWriter.WriteLine(result);
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
