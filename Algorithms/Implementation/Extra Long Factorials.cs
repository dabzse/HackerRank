using System;
using System.Numerics;

class Result
{

    /*
     * Complete the 'extraLongFactorials' function below.
     *
     * The function accepts INTEGER n as parameter.
     */

    public static string extraLongFactorials(int n)
    {
        BigInteger result = 1;
        for (int i = 1; i <= n; i++) result *= i;
        return result.ToString();
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        int n = Convert.ToInt32(Console.ReadLine().Trim());

        Console.WriteLine(Result.extraLongFactorials(n));
    }
}
