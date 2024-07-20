using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'anagram' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts STRING s as parameter.
     */

    public static int anagram(string s)
    {
        int length = s.Length;

        if (length % 2 != 0)
        {
            return -1;
        }

        string firstHalf = s.Substring(0, length / 2);
        string secondHalf = s.Substring(length / 2);

        Dictionary<char, int> firstFreq = new Dictionary<char, int>();
        Dictionary<char, int> secondFreq = new Dictionary<char, int>();

        foreach (char c in firstHalf)
        {
            if (firstFreq.ContainsKey(c))
            {
                firstFreq[c]++;
            }
            else
            {
                firstFreq[c] = 1;
            }
        }

        foreach (char c in secondHalf)
        {
            if (secondFreq.ContainsKey(c))
            {
                secondFreq[c]++;
            }
            else
            {
                secondFreq[c] = 1;
            }
        }

        int changes = 0;
        foreach (var pair in firstFreq)
        {
            char charKey = pair.Key;
            int charCount = pair.Value;

            if (secondFreq.ContainsKey(charKey))
            {
                changes += Math.Max(0, charCount - secondFreq[charKey]);
            }
            else
            {
                changes += charCount;
            }
        }

        return changes;
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

            int result = Result.anagram(s);

            textWriter.WriteLine(result);
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
