using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'beautifulDays' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts following parameters:
     *  1. INTEGER i
     *  2. INTEGER j
     *  3. INTEGER k
     */

    public static int beautifulDays(int i, int j, int k)
    {
        int count = 0;
        for (int a = i; a <= j; a++)
        {
            int rev = 0, temp = a;
            while (temp > 0)
            {
                rev = rev * 10 + temp % 10;
                temp /= 10;
            }
            if (Math.Abs(a - rev) % k == 0)
                count++;
        }
        return count;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        string[] firstMultipleInput = Console.ReadLine().TrimEnd().Split(' ');

        int i = Convert.ToInt32(firstMultipleInput[0]);
        int j = Convert.ToInt32(firstMultipleInput[1]);
        int k = Convert.ToInt32(firstMultipleInput[2]);
        int result = Result.beautifulDays(i, j, k);

        textWriter.WriteLine(result);

        textWriter.Flush();
        textWriter.Close();
    }
}
