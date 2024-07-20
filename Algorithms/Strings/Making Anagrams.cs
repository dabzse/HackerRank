using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'makingAnagrams' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts following parameters:
     *  1. STRING s1
     *  2. STRING s2
     */

    public static int makingAnagrams(string s1, string s2)
    {
        char[] arr1 = s1.ToCharArray();
        char[] arr2 = s2.ToCharArray();

        Dictionary<char, int> freqMap = new Dictionary<char, int>();

        foreach (char c in arr1)
        {
            if (freqMap.ContainsKey(c))
            {
                freqMap[c]++;
            }
            else
            {
                freqMap[c] = 1;
            }
        }

        foreach (char c in arr2)
        {
            if (freqMap.ContainsKey(c))
            {
                freqMap[c]--;
            }
            else
            {
                freqMap[c] = -1;
            }
        }

        int deletions = freqMap.Sum(pair => Math.Abs(pair.Value));

        return deletions;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        string s1 = Console.ReadLine();
        string s2 = Console.ReadLine();

        int result = Result.makingAnagrams(s1, s2);

        textWriter.WriteLine(result);

        textWriter.Flush();
        textWriter.Close();
    }
}
