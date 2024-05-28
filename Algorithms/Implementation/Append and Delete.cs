using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'appendAndDelete' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts following parameters:
     *  1. STRING s
     *  2. STRING t
     *  3. INTEGER k
     */

    public static string appendAndDelete(string s, string t, int k)
    {
        int length = 0;
        int minLen = Math.Min(s.Length, t.Length);
        for (int i = 0; i < minLen; i++)
        {
            if (s[i] == t[i]) length++;
            else break;
        }

        int ops = s.Length + t.Length - 2 * length;

        return (ops <= k && (k - ops) % 2 == 0) || k >= s.Length + t.Length ? "Yes" : "No";
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        string s = Console.ReadLine();
        string t = Console.ReadLine();
        int k = Convert.ToInt32(Console.ReadLine().Trim());
        string result = Result.appendAndDelete(s, t, k);

        textWriter.WriteLine(result);
        textWriter.Flush();
        textWriter.Close();
    }
}
