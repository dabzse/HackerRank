using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'alternate' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts STRING s as parameter.
     */

    public static int alternate(string s)
    {
        var uniqueChars = s.Distinct().ToArray();
        int maxLength = 0;

        for (int i = 0; i < uniqueChars.Length; i++)
        {
            for (int j = i + 1; j < uniqueChars.Length; j++)
            {
                char char1 = uniqueChars[i];
                char char2 = uniqueChars[j];

                var filtered = new List<char>();
                foreach (var ch in s)
                {
                    if (ch == char1 || ch == char2)
                    {
                        filtered.Add(ch);
                    }
                }

                bool isValid = true;
                for (int k = 1; k < filtered.Count; k++)
                {
                    if (filtered[k] == filtered[k - 1])
                    {
                        isValid = false;
                        break;
                    }
                }

                if (isValid)
                {
                    maxLength = Math.Max(maxLength, filtered.Count);
                }
            }
        }

        return maxLength;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int l = Convert.ToInt32(Console.ReadLine().Trim());
        string s = Console.ReadLine();
        int result = Result.alternate(s);

        textWriter.WriteLine(result);
        textWriter.Flush();
        textWriter.Close();
    }
}
