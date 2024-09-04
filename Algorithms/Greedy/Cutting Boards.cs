using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'boardCutting' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts following parameters:
     *  1. INTEGER_ARRAY cost_y
     *  2. INTEGER_ARRAY cost_x
     */

    public static int boardCutting(List<int> cost_y, List<int> cost_x)
    {
        cost_y.Sort((a, b) => b.CompareTo(a));
        cost_x.Sort((a, b) => b.CompareTo(a));

        int horizontal_pieces = 1;
        int vertical_pieces = 1;

        long total_cost = 0;
        int i = 0, j = 0;

        while (i < cost_y.Count && j < cost_x.Count)
        {
            if (cost_y[i] > cost_x[j] || (cost_y[i] == cost_x[j] && horizontal_pieces <= vertical_pieces))
            {
                total_cost += (long)cost_y[i] * vertical_pieces;
                horizontal_pieces++;
                i++;
            }
            else
            {
                total_cost += (long)cost_x[j] * horizontal_pieces;
                vertical_pieces++;
                j++;
            }
        }

        while (i < cost_y.Count)
        {
            total_cost += (long)cost_y[i] * vertical_pieces;
            i++;
        }

        while (j < cost_x.Count)
        {
            total_cost += (long)cost_x[j] * horizontal_pieces;
            j++;
        }

        return (int)(total_cost % 1000000007);
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
            string[] firstMultipleInput = Console.ReadLine().TrimEnd().Split(' ');

            int m = Convert.ToInt32(firstMultipleInput[0]);
            int n = Convert.ToInt32(firstMultipleInput[1]);

            List<int> cost_y = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(cost_yTemp => Convert.ToInt32(cost_yTemp)).ToList();
            List<int> cost_x = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(cost_xTemp => Convert.ToInt32(cost_xTemp)).ToList();

            int result = Result.boardCutting(cost_y, cost_x);

            textWriter.WriteLine(result);
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
