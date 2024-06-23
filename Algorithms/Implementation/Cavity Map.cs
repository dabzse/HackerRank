using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'cavityMap' function below.
     *
     * The function is expected to return a STRING_ARRAY.
     * The function accepts STRING_ARRAY grid as parameter.
     */

    public static List<string> cavityMap(List<string> grid)
    {
        for (int i = 1; i < grid.Count - 1; i++)
        {
            for (int j = 1; j < grid[i].Length - 1; j++)
            {
                if (grid[i][j] > Math.Max(Math.Max(grid[i][j - 1], grid[i][j + 1]), Math.Max(grid[i - 1][j], grid[i + 1][j])))
                {
                    char[] row = grid[i].ToCharArray();
                    row[j] = 'X';
                    grid[i] = new string(row);
                }
            }
        }
        return grid;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int n = Convert.ToInt32(Console.ReadLine().Trim());

        List<string> grid = new List<string>();

        for (int i = 0; i < n; i++)
        {
            string gridItem = Console.ReadLine();
            grid.Add(gridItem);
        }

        List<string> result = Result.cavityMap(grid);

        textWriter.WriteLine(String.Join("\n", result));

        textWriter.Flush();
        textWriter.Close();
    }
}
