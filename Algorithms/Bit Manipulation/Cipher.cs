using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'cipher' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts following parameters:
     *  1. INTEGER k
     *  2. STRING s
     */

    public static string cipher(int k, string s)
    {
        int n = s.Length;
        StringBuilder result = new StringBuilder();
        int xorAccumulated = 0;

        for (int i = 0; i < n - k + 1; i++)
        {
            int currentBit = (s[i] - '0') ^ xorAccumulated;
            result.Append(currentBit);

            xorAccumulated ^= currentBit;

            if (i >= k - 1)
            {
                xorAccumulated ^= (result[i - k + 1] - '0');
            }
        }

        return result.ToString();
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        string[] firstMultipleInput = Console.ReadLine().TrimEnd().Split(' ');

        int n = Convert.ToInt32(firstMultipleInput[0]);
        int k = Convert.ToInt32(firstMultipleInput[1]);

        string s = Console.ReadLine();
        string result = Result.cipher(k, s);

        textWriter.WriteLine(result);
        textWriter.Flush();
        textWriter.Close();
    }
}
