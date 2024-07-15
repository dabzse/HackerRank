using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'weightedUniformStrings' function below.
     *
     * The function is expected to return a STRING_ARRAY.
     * The function accepts following parameters:
     *  1. STRING s
     *  2. INTEGER_ARRAY queries
     */

    public static List<string> weightedUniformStrings(string s, List<int> queries)
    {
        HashSet<int> weights = new HashSet<int>();
        char prevChar = '0';
        int currentWeight = 0;

        foreach (char c in s)
        {
            if (c != prevChar)
            {
                currentWeight = c - 'a' + 1;
            }
            else
            {
                currentWeight += c - 'a' + 1;
            }
            weights.Add(currentWeight);
            prevChar = c;
        }

        List<string> result = new List<string>();
        foreach (int q in queries)
        {
            if (weights.Contains(q))
            {
                result.Add("Yes");
            }
            else
            {
                result.Add("No");
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

        string s = Console.ReadLine();

        int queriesCount = Convert.ToInt32(Console.ReadLine().Trim());

        List<int> queries = new List<int>();

        for (int i = 0; i < queriesCount; i++)
        {
            int queriesItem = Convert.ToInt32(Console.ReadLine().Trim());
            queries.Add(queriesItem);
        }

        List<string> result = Result.weightedUniformStrings(s, queries);

        textWriter.WriteLine(String.Join("\n", result));

        textWriter.Flush();
        textWriter.Close();
    }
}
