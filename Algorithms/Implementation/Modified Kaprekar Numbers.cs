using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'kaprekarNumbers' function below.
     *
     * The function accepts following parameters:
     *  1. INTEGER p
     *  2. INTEGER q
     */

    public static void kaprekarNumbers(int p, int q)
    {
        List<int> kaprekar_nums = new List<int>();
        for (int i = p; i <= q; i++)
        {
            long square = (long)i * i;
            string sq = square.ToString();
            int d = sq.Length - i.ToString().Length;
            int l = d > 0 ? int.Parse(sq.Substring(0, d)) : 0;
            int r = int.Parse(sq.Substring(d));

            if (l + r == i)
            {
                kaprekar_nums.Add(i);
            }
        }

        if (kaprekar_nums.Count > 0)
        {
            Console.WriteLine(string.Join(" ", kaprekar_nums));
        }
        else
        {
            Console.WriteLine("INVALID RANGE");
        }
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        int p = Convert.ToInt32(Console.ReadLine().Trim());
        int q = Convert.ToInt32(Console.ReadLine().Trim());

        Result.kaprekarNumbers(p, q);
    }
}
