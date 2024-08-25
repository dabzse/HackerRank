using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'toys' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts INTEGER_ARRAY w as parameter.
     */

    public static int toys(List<int> w)
    {
        w.Sort();
        int count = 0;
        int i = 0;
        while (i < w.Count())
        {
            int j = i;
            while (j < w.Count() && w[j] - w[i] <= 4)
            {
                j++;
            }
            count++;
            i = j;
        }
        return count;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int n = Convert.ToInt32(Console.ReadLine().Trim());

        List<int> w = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(wTemp => Convert.ToInt32(wTemp)).ToList();

        int result = Result.toys(w);

        textWriter.WriteLine(result);
        textWriter.Flush();
        textWriter.Close();
    }
}
