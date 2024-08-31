using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Solution
{

    // Complete the getMinimumCost function below.
    static int getMinimumCost(int k, int[] c)
    {
        Array.Sort(c);
        int cost = 0;
        for (int i = c.Length - 1, multiplier = 1; i >= 0; i--, multiplier++)
        {
            cost += c[i] * ((multiplier - 1) / k + 1);
        }
        return cost;
    }

    static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        string[] nk = Console.ReadLine().Split(' ');

        int n = Convert.ToInt32(nk[0]);
        int k = Convert.ToInt32(nk[1]);

        int[] c = Array.ConvertAll(Console.ReadLine().Split(' '), cTemp => Convert.ToInt32(cTemp));
        int minimumCost = getMinimumCost(k, c);

        textWriter.WriteLine(minimumCost);

        textWriter.Flush();
        textWriter.Close();
    }
}
