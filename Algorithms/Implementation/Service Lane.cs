using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;

class Result
{
    /*
     * Complete the 'serviceLane' function below.
     *
     * The function is expected to return an INTEGER_ARRAY.
     * The function accepts following parameters:
     *  1. INTEGER n
     *  2. 2D_INTEGER_ARRAY cases
     *  3. INTEGER_ARRAY width
     */
    public static List<int> serviceLane(int n, List<List<int>> cases, List<int> width)
    {
        List<int> results = new List<int>();

        foreach (var c in cases)
        {
            int start = c[0];
            int end = c[1];
            int minWidth = int.MaxValue;

            for (int i = start; i <= end; i++)
            {
                if (width[i] < minWidth)
                {
                    minWidth = width[i];
                }
            }

            results.Add(minWidth);
        }

        return results;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        string? outputPath = Environment.GetEnvironmentVariable("OUTPUT_PATH");
        if (outputPath == null)
        {
            Console.WriteLine("OUTPUT_PATH environment variable is not set.");
            return;
        }

        using (TextWriter textWriter = new StreamWriter(outputPath, true))
        {
            string[] firstMultipleInput = Console.ReadLine().TrimEnd().Split(' ');

            int n = Convert.ToInt32(firstMultipleInput[0]);
            int t = Convert.ToInt32(firstMultipleInput[1]);

            List<int> width = Console.ReadLine().TrimEnd().Split(' ').Select(int.Parse).ToList();

            List<List<int>> cases = new List<List<int>>();

            for (int i = 0; i < t; i++)
            {
                cases.Add(Console.ReadLine().TrimEnd().Split(' ').Select(int.Parse).ToList());
            }

            List<int> result = Result.serviceLane(n, cases, width);

            textWriter.WriteLine(String.Join("\n", result));
        }
    }
}