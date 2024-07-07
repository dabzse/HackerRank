using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'caesarCipher' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts following parameters:
     *  1. STRING s
     *  2. INTEGER k
     */

    public static string caesarCipher(string s, int k)
    {
        string result = "";
        for (int i = 0; i < s.Length; i++)
        {
            if (s[i] >= 'a' && s[i] <= 'z')
            {
                result += (char)((s[i] - 'a' + k) % 26 + 'a');
            }
            else if (s[i] >= 'A' && s[i] <= 'Z')
            {
                result += (char)((s[i] - 'A' + k) % 26 + 'A');
            }
            else
            {
                result += s[i];
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

        int n = Convert.ToInt32(Console.ReadLine().Trim());
        string s = Console.ReadLine();
        int k = Convert.ToInt32(Console.ReadLine().Trim());

        string result = Result.caesarCipher(s, k);

        textWriter.WriteLine(result);

        textWriter.Flush();
        textWriter.Close();
    }
}
