using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System;

class Result
{

    /*
     * Complete the 'steadyGene' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts STRING gene as parameter.
     */

    public static int steadyGene(string gene)
    {
        int n = gene.Length;
        int idealCount = n / 4;
        Dictionary<char, int> count = new Dictionary<char, int>
        {
            {'A', 0}, {'C', 0}, {'G', 0}, {'T', 0}
        };

        foreach (char c in gene)
        {
            count[c]++;
        }

        Dictionary<char, int> excess = new Dictionary<char, int>
        {
            {'A', 0}, {'C', 0}, {'G', 0}, {'T', 0}
        };

        foreach (var kvp in count)
        {
            if (kvp.Value > idealCount)
            {
                excess[kvp.Key] = kvp.Value - idealCount;
            }
        }

        if (excess.Values.Sum() == 0)
        {
            return 0;
        }

        int minLength = n;
        int left = 0;

        for (int right = 0; right < n; right++)
        {
            count[gene[right]]--;

            while (AllBelowOrEqual(count, idealCount))
            {
                minLength = Math.Min(minLength, right - left + 1);
                count[gene[left]]++;
                left++;
            }
        }

        return minLength;
    }

    private static bool AllBelowOrEqual(Dictionary<char, int> count, int limit)
    {
        foreach (char c in new char[] { 'A', 'C', 'G', 'T' })
        {
            if (count[c] > limit)
            {
                return false;
            }
        }
        return true;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int n = Convert.ToInt32(Console.ReadLine().Trim());

        string gene = Console.ReadLine();

        int result = Result.steadyGene(gene);

        textWriter.WriteLine(result);

        textWriter.Flush();
        textWriter.Close();
    }
}
