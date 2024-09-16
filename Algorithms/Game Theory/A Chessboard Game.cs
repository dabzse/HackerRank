using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'chessboardGame' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts following parameters:
     *  1. INTEGER x
     *  2. INTEGER y
     */

    public static string chessboardGame(int x, int y)
    {
        if ((x % 4 == 0) || (x % 4 == 3) || (y % 4 == 0) || (y % 4 == 3))
        {
            return "First";
        }
        else
        {
            return "Second";
        }
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int t = Convert.ToInt32(Console.ReadLine().Trim());

        for (int tItr = 0; tItr < t; tItr++)
        {
            string[] firstMultipleInput = Console.ReadLine().TrimEnd().Split(' ');

            int x = Convert.ToInt32(firstMultipleInput[0]);
            int y = Convert.ToInt32(firstMultipleInput[1]);

            string result = Result.chessboardGame(x, y);

            textWriter.WriteLine(result);
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
