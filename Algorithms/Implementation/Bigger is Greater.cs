using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'biggerIsGreater' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts STRING w as parameter.
     */

    public static string biggerIsGreater(string w)
    {
        char[] chars = w.ToCharArray();
        int n = chars.Length;

        int i = n - 2;
        while (i >= 0 && chars[i] >= chars[i + 1])
        {
            i--;
        }

        if (i == -1)
        {
            return "no answer";
        }

        int j = n - 1;
        while (chars[j] <= chars[i])
        {
            j--;
        }

        Swap(chars, i, j);
        Reverse(chars, i + 1, n - 1);

        return new string(chars);
    }

    private static void Swap(char[] chars, int i, int j)
    {
        char temp = chars[i];
        chars[i] = chars[j];
        chars[j] = temp;
    }

    private static void Reverse(char[] chars, int start, int end)
    {
        while (start < end)
        {
            Swap(chars, start, end);
            start++;
            end--;
        }
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int T = Convert.ToInt32(Console.ReadLine().Trim());

        for (int TItr = 0; TItr < T; TItr++)
        {
            string w = Console.ReadLine();

            string result = Result.biggerIsGreater(w);

            textWriter.WriteLine(result);
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
