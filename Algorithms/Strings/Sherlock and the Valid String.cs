using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'isValid' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts STRING s as parameter.
     */

    public static string isValid(string s)
    {
        Dictionary<char, int> charCount = new Dictionary<char, int>();
        foreach (char c in s)
        {
            if (charCount.ContainsKey(c))
            {
                charCount[c]++;
            }
            else
            {
                charCount[c] = 1;
            }
        }

        Dictionary<int, int> freqCount = new Dictionary<int, int>();
        foreach (int count in charCount.Values)
        {
            if (freqCount.ContainsKey(count))
            {
                freqCount[count]++;
            }
            else
            {
                freqCount[count] = 1;
            }
        }

        if (freqCount.Count == 1)
        {
            return "YES";
        }
        else if (freqCount.Count == 2)
        {
            List<int> freqKeys = new List<int>(freqCount.Keys);
            if (freqKeys.Contains(1) && freqCount[1] == 1)
            {
                return "YES";
            }
            else if (Math.Abs(freqKeys[0] - freqKeys[1]) == 1 && (freqCount[freqKeys[0]] == 1 || freqCount[freqKeys[1]] == 1))
            {
                return "YES";
            }
        }
        return "NO";
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        string s = Console.ReadLine();

        string result = Result.isValid(s);

        textWriter.WriteLine(result);

        textWriter.Flush();
        textWriter.Close();
    }
}
