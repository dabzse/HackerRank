using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'decentNumber' function below.
     *
     * The function accepts INTEGER n as parameter.
     */

    public static void decentNumber(int n)
    {
        int numberOfFives = n - (n % 3);

        while (numberOfFives >= 0)
        {
            if ((n - numberOfFives) % 5 == 0)
            {
                Console.WriteLine(new string('5', numberOfFives) + new string('3', n - numberOfFives));
                return;
            }
            numberOfFives -= 3;
        }

        Console.WriteLine("-1");
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        int t = Convert.ToInt32(Console.ReadLine().Trim());

        for (int tItr = 0; tItr < t; tItr++)
        {
            int n = Convert.ToInt32(Console.ReadLine().Trim());

            Result.decentNumber(n);
        }
    }
}
