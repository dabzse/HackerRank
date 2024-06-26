using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'fairRations' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts INTEGER_ARRAY B as parameter.
     */

    public static string fairRations(List<int> B)
    {
        int count = 0;
        for (int i = 0; i < B.Count - 1; i++)
        {
            if (B[i] % 2 == 1)
            {
                count += 2;
                B[i + 1] += 1;
            }
        }
        if (B[B.Count - 1] % 2 == 1)
        {
            return "NO";
        }
        else
        {
            return count.ToString();
        }
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int N = Convert.ToInt32(Console.ReadLine().Trim());

        List<int> B = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(BTemp => Convert.ToInt32(BTemp)).ToList();

        string result = Result.fairRations(B);

        textWriter.WriteLine(result);

        textWriter.Flush();
        textWriter.Close();
    }
}
