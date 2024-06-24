using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'happyLadybugs' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts STRING b as parameter.
     */

    public static string happyLadybugs(string b)
    {
        var freq = b.GroupBy(c => c).ToDictionary(g => g.Key, g => g.Count());

        foreach (var kvp in freq)
        {
            if (kvp.Key != '_' && kvp.Value == 1)
            {
                return "NO";
            }
        }

        if (freq.ContainsKey('_'))
        {
            return "YES";
        }

        for (int i = 1; i < b.Length - 1; i++)
        {
            if (b[i] != b[i - 1] && b[i] != b[i + 1])
            {
                return "NO";
            }
        }

        return "YES";
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

            string b = Console.ReadLine();

            string result = Result.happyLadybugs(b);

            textWriter.WriteLine(result);
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
