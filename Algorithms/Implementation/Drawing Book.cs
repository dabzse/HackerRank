using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'pageCount' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts following parameters:
     *  1. INTEGER n
     *  2. INTEGER p
     */

    public static int pageCount(int n, int p)
    {
        int totalPages = n / 2;
        int frontPages = p / 2;
        int backPages = totalPages - frontPages;
        return Math.Min(frontPages, backPages);
    }

}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int n = Convert.ToInt32(Console.ReadLine().Trim());
        int p = Convert.ToInt32(Console.ReadLine().Trim());
        int result = Result.pageCount(n, p);

        textWriter.WriteLine(result);

        textWriter.Flush();
        textWriter.Close();
    }
}
