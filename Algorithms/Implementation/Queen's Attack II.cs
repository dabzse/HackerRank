using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'queensAttack' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts following parameters:
     *  1. INTEGER n
     *  2. INTEGER k
     *  3. INTEGER r_q
     *  4. INTEGER c_q
     *  5. 2D_INTEGER_ARRAY obstacles
     */

    public static int queensAttack(int n, int k, int r_q, int c_q, List<List<int>> obstacles)
    {
Dictionary<string, int> directions = new Dictionary<string, int>()
        {
            { "N", n - r_q },
            { "S", r_q - 1 },
            { "E", n - c_q },
            { "W", c_q - 1 },
            { "NE", Math.Min(n - r_q, n - c_q) },
            { "NW", Math.Min(n - r_q, c_q - 1) },
            { "SE", Math.Min(r_q - 1, n - c_q) },
            { "SW", Math.Min(r_q - 1, c_q - 1) }
        };

        foreach (var obstacle in obstacles)
        {
            int r_o = obstacle[0];
            int c_o = obstacle[1];

            if (c_o == c_q && r_o > r_q)
            {
                directions["N"] = Math.Min(directions["N"], r_o - r_q - 1);
            }

            if (c_o == c_q && r_o < r_q)
            {
                directions["S"] = Math.Min(directions["S"], r_q - r_o - 1);
            }

            if (r_o == r_q && c_o > c_q)
            {
                directions["E"] = Math.Min(directions["E"], c_o - c_q - 1);
            }

            if (r_o == r_q && c_o < c_q)
            {
                directions["W"] = Math.Min(directions["W"], c_q - c_o - 1);
            }

            if (r_o > r_q && c_o > c_q && (r_o - r_q) == (c_o - c_q))
            {
                directions["NE"] = Math.Min(directions["NE"], r_o - r_q - 1);
            }

            if (r_o > r_q && c_o < c_q && (r_o - r_q) == (c_q - c_o))
            {
                directions["NW"] = Math.Min(directions["NW"], r_o - r_q - 1);
            }

            if (r_o < r_q && c_o > c_q && (r_q - r_o) == (c_o - c_q))
            {
                directions["SE"] = Math.Min(directions["SE"], r_q - r_o - 1);
            }

            if (r_o < r_q && c_o < c_q && (r_q - r_o) == (c_q - c_o))
            {
                directions["SW"] = Math.Min(directions["SW"], r_q - r_o - 1);
            }
        }

        int totalMoves = directions.Values.Sum();

        return totalMoves;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        string[] firstMultipleInput = Console.ReadLine().TrimEnd().Split(' ');
        int n = Convert.ToInt32(firstMultipleInput[0]);
        int k = Convert.ToInt32(firstMultipleInput[1]);

        string[] secondMultipleInput = Console.ReadLine().TrimEnd().Split(' ');
        int r_q = Convert.ToInt32(secondMultipleInput[0]);
        int c_q = Convert.ToInt32(secondMultipleInput[1]);

        List<List<int>> obstacles = new List<List<int>>();

        for (int i = 0; i < k; i++)
        {
            obstacles.Add(Console.ReadLine().TrimEnd().Split(' ').ToList().Select(obstaclesTemp => Convert.ToInt32(obstaclesTemp)).ToList());
        }

        int result = Result.queensAttack(n, k, r_q, c_q, obstacles);

        textWriter.WriteLine(result);

        textWriter.Flush();
        textWriter.Close();
    }
}
