using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'stringConstruction' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts STRING s as parameter.
     */

    public static int stringConstruction(string s)
    {
        int count = 0;
        var chars = new HashSet<char>();

        foreach (char c in s)
        {
            if (!chars.Contains(c))
            {
                count++;
                chars.Add(c);
            }
        }
        return count;
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

            int result = Result.stringConstruction(s);

            textWriter.WriteLine(result);
        }

        textWriter.Flush();
        textWriter.Close();
    }
}

