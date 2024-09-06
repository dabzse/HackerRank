using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'reverseShuffleMerge' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts STRING s as parameter.
     */

    public static string reverseShuffleMerge(string s)
    {
        var charCount = new Dictionary<char, int>();
        var usedChars = new Dictionary<char, int>();
        var remainingChars = new Dictionary<char, int>();
        var result = new Stack<char>();

        foreach (var c in s)
        {
            if (charCount.ContainsKey(c))
                charCount[c]++;
            else
                charCount[c] = 1;

            remainingChars[c] = charCount[c];
        }

        bool CanUse(char c)
        {
            return !usedChars.ContainsKey(c) || usedChars[c] < charCount[c] / 2;
        }

        bool CanPop(char c)
        {
            var neededChars = charCount[c] / 2 - (usedChars.ContainsKey(c) ? usedChars[c] : 0);
            return remainingChars[c] > neededChars;
        }

        for (int i = s.Length - 1; i >= 0; i--)
        {
            var c = s[i];

            if (CanUse(c))
            {
                while (result.Count > 0 && result.Peek() > c && CanPop(result.Peek()))
                {
                    var removedChar = result.Pop();
                    usedChars[removedChar]--;
                }

                result.Push(c);
                if (usedChars.ContainsKey(c))
                    usedChars[c]++;
                else
                    usedChars[c] = 1;
            }

            remainingChars[c]--;
        }

        var resultString = new StringBuilder();
        while (result.Count > 0)
        {
            resultString.Insert(0, result.Pop());
        }

        return resultString.ToString();
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        string s = Console.ReadLine();

        string result = Result.reverseShuffleMerge(s);

        textWriter.WriteLine(result);
        textWriter.Flush();
        textWriter.Close();
    }
}
