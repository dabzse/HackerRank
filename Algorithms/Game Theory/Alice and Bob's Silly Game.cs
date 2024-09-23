using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'sillyGame' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts INTEGER n as parameter.
     */

    public static string sillyGame(int n)
    {
        int primeCount = SieveOfEratosthenes(n);

        if (primeCount % 2 == 1)
        {
            return "Alice";
        }
        else
        {
            return "Bob";
        }
    }

    public static int SieveOfEratosthenes(int n)
    {
        if (n < 2) return 0;

        bool[] primes = new bool[n + 1];
        for (int i = 2; i <= n; i++)
        {
            primes[i] = true;
        }

        for (int p = 2; p * p <= n; p++)
        {
            if (primes[p])
            {
                for (int i = p * p; i <= n; i += p)
                {
                    primes[i] = false;
                }
            }
        }

        int primeCount = 0;
        for (int p = 2; p <= n; p++)
        {
            if (primes[p])
            {
                primeCount++;
            }
        }

        return primeCount;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int g = Convert.ToInt32(Console.ReadLine().Trim());

        for (int gItr = 0; gItr < g; gItr++)
        {
            int n = Convert.ToInt32(Console.ReadLine().Trim());

            string result = Result.sillyGame(n);

            textWriter.WriteLine(result);
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
