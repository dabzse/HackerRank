using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'misereNim' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts INTEGER_ARRAY s as parameter.
     */

    public static string misereNim(List<int> s)
    {
        int nim_sum = 0;
        foreach (int pile in s)
        {
            nim_sum ^= pile;
        }

        if (s.All(pile => pile == 1))
        {
            return s.Count % 2 == 0 ? "First" : "Second";
        }

        return nim_sum == 0 ? "Second" : "First";
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int t = Convert.ToInt32(Console.ReadLine().Trim());

        for (int tItr = 0; tItr < t; tItr++)
        {
            int n = Convert.ToInt32(Console.ReadLine().Trim());

            List<int> s = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(sTemp => Convert.ToInt32(sTemp)).ToList();

            string result = Result.misereNim(s);

            textWriter.WriteLine(result);
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
