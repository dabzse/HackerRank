using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'encryption' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts STRING s as parameter.
     */

    public static string encryption(string s)
    {
        s = s.Replace(" ", "");
        double sqrt = Math.Sqrt(s.Length);
        int rows = (int)Math.Floor(sqrt);
        int cols = (int)Math.Ceiling(sqrt);
        if (rows * cols < s.Length) rows++;

        StringBuilder sb = new StringBuilder();
        for (int i = 0; i < cols; i++)
        {
            if (i > 0) sb.Append(' ');
            for (int j = 0; j < rows; j++)
            {
                int index = j * cols + i;
                if (index < s.Length)
                {
                    sb.Append(s[index]);
                }
            }
        }
        return sb.ToString();
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        string s = Console.ReadLine();

        string result = Result.encryption(s);

        textWriter.WriteLine(result);

        textWriter.Flush();
        textWriter.Close();
    }
}
