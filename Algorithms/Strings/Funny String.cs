using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'funnyString' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts STRING s as parameter.
     */

    public static string funnyString(string s)
    {
        string reverse = new string(s.Reverse().ToArray());
        for (int i = 0; i < s.Length - 1; i++)
        {
            if (Math.Abs((s[i] - 'a') - (s[i + 1] - 'a')) != Math.Abs((reverse[i] - 'a') - (reverse[i + 1] - 'a')))
            {
                return "Not Funny";
            }
        }
        return "Funny";
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int q = Convert.ToInt32(Console.ReadLine().Trim());

        for (int qItr = 0; qItr < q; qItr++)
        {
            string s = Console.ReadLine();
            string result = Result.funnyString(s);

            textWriter.WriteLine(result);
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
