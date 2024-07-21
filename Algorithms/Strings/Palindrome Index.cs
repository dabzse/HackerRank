using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'palindromeIndex' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts STRING s as parameter.
     */

    public static int palindromeIndex(string s)
    {
        for (int i = 0; i < s.Length / 2; i++)
        {
            if (s[i] != s[s.Length - 1 - i])
            {
                if (s[i] == s[s.Length - 1 - i - 1] && s[i + 1] == s[s.Length - 1 - i - 2])
                {
                    return s.Length - 1 - i;
                }
                else
                {
                    return i;
                }
            }
        }

        return -1;
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

            int result = Result.palindromeIndex(s);

            textWriter.WriteLine(result);
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
